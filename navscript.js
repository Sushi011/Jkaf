const toggleButton = document.getElementsByClassName("toggle-button")[0];
const toggle_1 = document.getElementsByClassName("toggle1")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];
const navbarLinks_1 = document.getElementsByClassName("navbar-links1")[0];

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active1");
});

toggle_1.addEventListener("click", () => {
  navbarLinks_1.classList.toggle("active2");
});
