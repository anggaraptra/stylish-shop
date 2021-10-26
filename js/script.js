// fungsi untuk kontak agar bisa berfungsi dan mengirimkan pesan ke google sheets
const scriptURL = "https://script.google.com/macros/s/AKfycbxr2r0JhdwO23S8g1O9NpHBBVBdmPna7jJ30Od7-O5E5PgfmOnNVainM1n-R8qlqqAqQw/exec";
const form = document.forms["stylishshop-kontak"];
const btnKirim = document.querySelector(".btn-kirim");
const btnLoading = document.querySelector(".btn-loading");
const myAlert = document.querySelector(".my-alert");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  // ketika tombol submit di klik
  // tampilkan tombol loading, hilangkan tombol kirim
  btnLoading.classList.toggle("d-none");
  btnKirim.classList.toggle("d-none");
  fetch(scriptURL, { method: "POST", body: new FormData(form) })
    .then((response) => {
      // tampilkan tombol kirim, hilangkan tombol loading
      btnLoading.classList.toggle("d-none");
      btnKirim.classList.toggle("d-none");
      // tampilkan alert
      myAlert.classList.toggle("d-none");
      // reset forms
      form.reset();
      console.log("Success!", response);
    })
    .catch((error) => console.error("Error!", error.message));
});
