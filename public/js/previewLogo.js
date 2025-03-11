const logoInput = document.getElementById("logo-input");
const logoImg = document.getElementById("logo-img");
logoInput.addEventListener("input", () => {
    logoImg.src = logoInput.value;
});