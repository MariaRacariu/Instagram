document.querySelectorAll(".img-container img").forEach((image) => {
    image.onclick = () => {
        console.log("click");
        document.querySelector(".popup-image").style.display = "block";
        document.querySelector(".popup-image img").src = image.getAttribute("src");
    };
});
document.querySelector(".popup-image span").onclick = () => {
    document.querySelector(".popup-image").style.display = "none";
};