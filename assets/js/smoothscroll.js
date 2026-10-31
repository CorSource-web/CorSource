import Lenis from '@studio-freight/lenis'

document.addEventListener('DOMContentLoaded', () => {
  // Only load smooth scroll on the front end
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

  // Handle anchors when arriving from another page
  const scrollToInitialHash = () => {
    const hash = window.location.hash

    if (!hash || isModalHash(hash)) {
      return
    }

    const target = document.getElementById(
      decodeURIComponent(hash.substring(1))
    )

    if (!target) {
      return
    }

    // Reset to the top before starting the animation
    lenis.scrollTo(0, {
      immediate: true
    })

    // Allow the browser to render at the top first
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        lenis.scrollTo(target, {
          offset: -100,
          duration: 1.2
        })
      })
    })
  }

  // Wait until the page and its resources have loaded
  if (document.readyState === 'complete') {
    scrollToInitialHash()
  } else {
    window.addEventListener('load', scrollToInitialHash, {
      once: true
    })
  }

  // Smooth scroll for same-page anchor links
  document.querySelectorAll('a[href*="#"]').forEach((link) => {
    link.addEventListener('click', (event) => {
      // Respect new-tab and modified clicks
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

      // Only intercept anchors pointing to the current page
      if (
        url.origin !== window.location.origin ||
        normalizePath(url.pathname) !==
          normalizePath(window.location.pathname) ||
        !url.hash
      ) {
        return
      }

      // Leave contact modal links alone
      if (isModalHash(url.hash)) {
        return
      }

      const target = document.getElementById(
        decodeURIComponent(url.hash.substring(1))
      )

      // Allow normal behavior if the target doesn't exist
      if (!target) {
        return
      }

      // Prevent page navigation or reload
      event.preventDefault()

      // Preserve the destination pathname and hash
      history.pushState(
        null,
        '',
        url.pathname + url.search + url.hash
      )

      // Smoothly scroll to the target
      lenis.scrollTo(target, {
        offset: 100,
        duration: 1.2
      })
    })
  })

  // Lenis animation loop
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