
import Lenis from '@studio-freight/lenis'

document.addEventListener('DOMContentLoaded', () => {
  if (document.body.classList.contains('wp-admin')) {
    return
  }

  const lenis = new Lenis()

  const modalContainer = document.querySelector('.modal-container')
  const lenisModal = modalContainer
    ? new Lenis({ content: modalContainer })
    : null

  const normalizePath = (path) =>
    path.replace(/\/+$/, '') || '/'

  const isModalHash = (hash) =>
    hash === '#contact-navigation-modal' ||
    hash === '#contact-modal'

  const solutionsAnchors = [
    'focus-tech-investments',
    'enable-technology-initiatives',
    'accelerate-data-ai'
  ]

  const getScrollTarget = (target) => {
    if (solutionsAnchors.includes(target.id)) {
      const section = target.nextElementSibling

      if (section?.classList.contains('focus-content-2026')) {
        return (
          section.querySelector('.focus-content-2026-title') ||
          target
        )
      }
    }

    return target
  }

  const scrollToAnchor = (target) => {
    const scrollTarget = getScrollTarget(target)
    const isSolutionsHeading = scrollTarget !== target

    lenis.scrollTo(scrollTarget, {
      offset: isSolutionsHeading ? -30 : -100,
      duration: 1.2
    })
  }

  // Handle a cross-page anchor passed through sessionStorage.
  // The destination page loads without a hash, preventing Chrome
  // from automatically jumping to the anchor.
  const pendingKey = 'corsourcePendingAnchor'
  const pendingRaw = sessionStorage.getItem(pendingKey)

  if (pendingRaw) {
    sessionStorage.removeItem(pendingKey)

    let pending = null

    try {
      pending = JSON.parse(pendingRaw)
    } catch (error) {
      pending = null
    }

    if (
      pending &&
      pending.path === normalizePath(window.location.pathname) &&
      pending.search === window.location.search &&
      pending.hash &&
      !isModalHash(pending.hash)
    ) {
      const target = document.getElementById(
        decodeURIComponent(pending.hash.substring(1))
      )

      if (target) {
        // Add the hash without triggering native anchor navigation.
        history.replaceState(
          history.state,
          '',
          window.location.pathname +
            window.location.search +
            pending.hash
        )

        const startScroll = () => {
          requestAnimationFrame(() => {
            requestAnimationFrame(() => {
              scrollToAnchor(target)
            })
          })
        }

        if (document.readyState === 'complete') {
          startScroll()
        } else {
          window.addEventListener('load', startScroll, {
            once: true
          })
        }
      }
    }
  } else {
    // Preserve normal direct links to pages with hashes.
    // Position immediately rather than animating on initial load.
    const hash = window.location.hash

    if (hash && !isModalHash(hash)) {
      const target = document.getElementById(
        decodeURIComponent(hash.substring(1))
      )

      if (target) {
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            const scrollTarget = getScrollTarget(target)
            const isSolutionsHeading = scrollTarget !== target

            lenis.scrollTo(scrollTarget, {
              offset: isSolutionsHeading ? -30 : -100,
              immediate: true
            })
          })
        })
      }
    }
  }

  // Handle same-page and cross-page anchor navigation.
  document.querySelectorAll('a[href*="#"]').forEach((link) => {
    link.addEventListener('click', (event) => {
      if (
        event.defaultPrevented ||
        event.button !== 0 ||
        event.metaKey ||
        event.ctrlKey ||
        event.shiftKey ||
        event.altKey ||
        link.target === '_blank' ||
        link.hasAttribute('download')
      ) {
        return
      }

      const url = new URL(link.href, window.location.href)

      if (
        url.origin !== window.location.origin ||
        !url.hash ||
        isModalHash(url.hash)
      ) {
        return
      }

      const samePage =
        normalizePath(url.pathname) ===
          normalizePath(window.location.pathname) &&
        url.search === window.location.search

      if (samePage) {
        const target = document.getElementById(
          decodeURIComponent(url.hash.substring(1))
        )

        if (!target) {
          return
        }

        event.preventDefault()

        history.pushState(
          null,
          '',
          url.pathname + url.search + url.hash
        )

        scrollToAnchor(target)
        return
      }

      // Cross-page anchor:
      // Store the destination hash and navigate without it.
      event.preventDefault()

      sessionStorage.setItem(
        pendingKey,
        JSON.stringify({
          path: normalizePath(url.pathname),
          search: url.search,
          hash: url.hash
        })
      )

      window.location.assign(
        url.pathname + url.search
      )
    })
  })

  // Lenis animation loop.
  function raf(time) {
    lenis.raf(time)

    if (lenisModal) {
      lenisModal.raf(time)
    }

    requestAnimationFrame(raf)
  }

  requestAnimationFrame(raf)
})







// import Lenis from '@studio-freight/lenis'

// document.addEventListener('DOMContentLoaded', () => {
//   //only load smooth scroll on front end
//   if (!document.body.classList.contains('wp-admin')) {
//     const lenis = new Lenis()
//     const lenisModal = new Lenis({
//       content: document.querySelector('.modal-container')
//     })

//     lenis.on('scroll', (e) => {
//       // console.log(e)
//     })
//     lenisModal.on('scroll', (e) => {
//       // console.log(e)
//     })

//     function raf(time) {
//       lenis.raf(time)
//       lenisModal.raf(time)
//       requestAnimationFrame(raf)
//     }

//     requestAnimationFrame(raf)
//   }
// })