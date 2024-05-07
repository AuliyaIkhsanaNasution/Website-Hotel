document.addEventListener("DOMContentLoaded", function () {
  let storedItems = localStorage.getItem("keranjang_");
  let itemsCount = 0;
  if (storedItems) {
    itemsCount = JSON.parse(storedItems).length; // Parse dan hitung panjang array
  }
  // Modifikasi HTML untuk menampilkan jumlah item
  document.querySelector("#cart").textContent = ` ${itemsCount}`;
});
