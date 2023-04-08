let show = true;

const menuSection = document.querySelector(".menu-section")
const menuToggle = document.querySelector(".menu-toggle")

menuToggle.addEventListener("click", () => {
    document.body.style.overflow = show? "hidden" : "inhtial"
    menuSection.classList.toggle("on", show)
    show = !show;
})
