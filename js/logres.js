const login_btn = document.querySelector("#login_tbl");
const daftar_btn = document.querySelector("#daftar_tbl");
const konten = document.querySelector(".konten");

daftar_btn.addEventListener("click", () => {
    konten.classList.add("daftar_tbl-mode");
});

login_btn.addEventListener("click", () => {
    konten.classList.remove("daftar_tbl-mode");
});

