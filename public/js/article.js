
const closeImage = () => {
    const modal = document.querySelector("#myModal");
    modal.style.display = "none";

}

const viewImage = () => {
    const modal = document.querySelector("#myModal");
    const img = document.querySelector("#myImg");
    const modalImg = document.querySelector("#img01");
    const captionText = document.querySelector("#caption");

    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = `Source: <a href="${img.dataset.source}">${img.dataset.source}</a>`;
};