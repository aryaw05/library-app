import AOS from "aos";
import "aos/dist/aos.css";

AOS.init();

window.addEventListener("scroll", function () {
    const header = document.getElementById("navbar");
    const navTextElements = document.querySelectorAll(".nav-text");
    if (window.scrollY > 50) {
        header.classList.add("shadow-lg", "bg-white", "dark:bg-gray-900");
        navTextElements.forEach((el) => {
            el.classList.remove("text-white");
            el.classList.add("text-gray-900", "dark:text-white");
        });
    } else {
        header.classList.remove("shadow-lg", "bg-white", "dark:bg-gray-900");
        navTextElements.forEach((el) => {
            el.classList.remove("text-gray-900", "dark:text-white");
            el.classList.add("text-white");
        });
    }
});
