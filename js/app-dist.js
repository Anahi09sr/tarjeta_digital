! function () {
  const e = document.querySelectorAll(".menu__item-show"),
    t = document.querySelector(".menu__links"),
    i = document.querySelector(".menu__hamburger"),
    n = () => {
      e.forEach((e => {
        e.addEventListener("click", (() => {
          let t = e.children[1],
            i = 0;
          e.classList.toggle("menu__item-active"), 0 === t.clientHeight && (i = t.scrollHeight), t.style.height = `${i}px`
        }))
      }))
    };
  window.addEventListener("resize", (() => {
    window.innerWidth > 800 ? (e.forEach((e => {
      e.children[1].getAttribute("style") && (e.children[1].removeAttribute("style"), e.classList.remove("menu__item-active"))
    })), t.classList.contains("menu__links-show") && t.classList.remove("menu__links-show")) : n()
  })), window.innerWidth <= 800 && n(), i.addEventListener("click", (() => t.classList.toggle("menu__links-show")))
}();