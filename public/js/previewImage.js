document.querySelectorAll("img[previewId]").forEach(img => {
    const input = document.querySelector('input[previewId="' + img.getAttribute("previewId") + '"]') || document.querySelector("input[previewId]");
    if (input) {
        input.addEventListener("input", () => {
            img.src = input.value;
        })
    }
});