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

    const normalizePath = (path) =>
      path.replace(/\/+$/, '') || '/'

    // Only intercept links pointing to this page
    if (
      url.origin !== window.location.origin ||
      normalizePath(url.pathname) !== normalizePath(window.location.pathname) ||
      !url.hash
    ) {
      return
    }

    // Leave modal links alone
    if (url.hash === '#contact-navigation-modal' ||
        url.hash === '#contact-modal') {
      return
    }

    const target = document.getElementById(
      decodeURIComponent(url.hash.substring(1))
    )

    if (!target) return

    event.preventDefault()

    history.pushState(null, '', url.hash)

    lenis.scrollTo(target, {
      offset: -100,
      duration: 1.2
    })
  })
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