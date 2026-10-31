
import Lenis from '@studio-freight/lenis'

document.addEventListener('DOMContentLoaded', () => {
  // Only load smooth scroll on front end
  if (!document.body.classList.contains('wp-admin')) {
    const lenis = new Lenis()

    const modalContainer = document.querySelector('.modal-container')
    const lenisModal = modalContainer
      ? new Lenis({ content: modalContainer })
      : null

    // Smooth scroll for same-page anchor links
    document.querySelectorAll('a[href*="#"]').forEach((link) => {
      link.addEventListener('click', (event) => {
        const url = new URL(link.href, window.location.href)

        // Only handle anchors on the current page
        if (
          url.origin !== window.location.origin ||
          url.pathname !== window.location.pathname ||
          !url.hash
        ) {
          return
        }

        const target = document.getElementById(
          decodeURIComponent(url.hash.substring(1))
        )

        // Leave other hash links, including modal links, alone
        if (!target || url.hash === '#contact-navigation-modal') {
          return
        }

        event.preventDefault()

        history.pushState(null, '', url.hash)

        lenis.scrollTo(target, {
          offset: -100,
          duration: 1.2
        })
      })
    })

    function raf(time) {
      lenis.raf(time)

      if (lenisModal) {
        lenisModal.raf(time)
      }

      requestAnimationFrame(raf)
    }

    requestAnimationFrame(raf)
  }
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