// pencegah redundan kamar
var keranjang = localStorage.getItem("keranjang_");
var kamarDiKeranjang = [];

if (keranjang) {
  kamarDiKeranjang = JSON.parse(keranjang).map(function (item) {
    return item.kamar; // Menggunakan "kamar" sebagai key untuk mengambil ID kamar
  });
  console.log("Kamar di Keranjang:", kamarDiKeranjang);
} else {
  console.log("Tidak ada data di keranjang");
}

var selectElements = document.querySelectorAll(".kamar-dropdown");
console.log("Jumlah select ditemukan:", selectElements.length);

selectElements.forEach(function (selectElement) {
  for (var i = 0; i < selectElement.options.length; i++) {
    var option = selectElement.options[i];
    if (kamarDiKeranjang.includes(option.value)) {
      console.log("Menyembunyikan:", option.value);
      option.classList.add("hidden"); // Menambahkan class "hidden" untuk menyembunyikan option
    }
  }
});
