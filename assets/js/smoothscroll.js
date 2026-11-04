
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

  const getScrollTarget = (target) => {
    const solutionsAnchors = [
      'focus-tech-investments',
      'enable-technology-initiatives',
      'accelerate-data-ai'
    ]

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

  const scrollToAnchor = (target, immediate = false) => {
    const scrollTarget = getScrollTarget(target)
    const isSolutionsHeading = scrollTarget !== target

    lenis.scrollTo(scrollTarget, {
      offset: isSolutionsHeading ? -30 : -100,
      duration: 1.2,
      immediate
    })
  }

  // Handle initial hash navigation after the destination page loads.
  const initialHash = window.location.hash

  if (initialHash && !isModalHash(initialHash)) {
    const target = document.getElementById(
      decodeURIComponent(initialHash.substring(1))
    )

    if (target) {
      // Reset any browser-provided initial anchor position.
      if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual'
      }

      lenis.scrollTo(0, { immediate: true })

      // Wait for the page and its layout to finish loading.
      const startInitialScroll = () => {
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            lenis.scrollTo(0, { immediate: true })

            // Allow the top position to render before animating.
            requestAnimationFrame(() => {
              scrollToAnchor(target)
            })
          })
        })
      }

      if (document.readyState === 'complete') {
        startInitialScroll()
      } else {
        window.addEventListener('load', startInitialScroll, {
          once: true
        })
      }
    }
  }

  // Smooth scrolling for same-page links.
  document.querySelectorAll('a[href*="#"]').forEach((link) => {
    link.addEventListener('click', (event) => {
      if (
        event.defaultPrevented ||
        event.button !== 0 ||
        event.metaKey ||
        event.ctrlKey ||
        event.shiftKey ||
        event.altKey ||
        link.target === '_blank'
      ) {
        return
      }

      const url = new URL(link.href, window.location.href)

      if (
        url.origin !== window.location.origin ||
        normalizePath(url.pathname) !==
          normalizePath(window.location.pathname) ||
        !url.hash
      ) {
        return
      }

      if (isModalHash(url.hash)) {
        return
      }

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