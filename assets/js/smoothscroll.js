import Lenis from '@studio-freight/lenis'

document.addEventListener('DOMContentLoaded', () => {
  //only load smooth scroll on front end
  if (!document.body.classList.contains('wp-admin')) {
    const lenis = new Lenis()
    const lenisModal = new Lenis({
      content: document.querySelector('.modal-container')
    })

    lenis.on('scroll', (e) => {
      // console.log(e)
    })
    lenisModal.on('scroll', (e) => {
      // console.log(e)
    })

    function raf(time) {
      lenis.raf(time)
      lenisModal.raf(time)
      requestAnimationFrame(raf)
    }

    requestAnimationFrame(raf)
  }
})