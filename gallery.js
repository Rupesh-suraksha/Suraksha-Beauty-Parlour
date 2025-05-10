document.addEventListener("DOMContentLoaded", () => {
  const lightbox = document.getElementById("lightbox");
  const images = document.querySelectorAll(".gallery-grid img");

  images.forEach(img => {
    img.addEventListener("click", () => {
      lightbox.classList.add("active");
      const newImg = document.createElement("img");
      newImg.src = img.src;
      while (lightbox.firstChild) {
        lightbox.removeChild(lightbox.firstChild);
      }
      lightbox.appendChild(newImg);
    });
  });

  lightbox.addEventListener("click", () => {
    lightbox.classList.remove("active");
  });
});
