// Saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
  // Ambil semua formulir
  var forms = document.querySelectorAll("form");

  // Loop melalui setiap formulir
  forms.forEach(function (form) {
    // Saat formulir disubmit
    form.addEventListener("submit", function (event) {
      // Ambil data dari formulir
      var formData = new FormData(form);

      // Data yang akan disimpan dalam local storage
      var data = JSON.parse(localStorage.getItem("keranjang_")) || [];
      var currentData = {};
      formData.forEach(function (value, key) {
        currentData[key] = value;
      });

      // Tambahkan data formulir saat ini ke dalam array data
      data.push(currentData);

      // Simpan data ke dalam local storage
      localStorage.setItem("keranjang_", JSON.stringify(data));

      // Beri tahu pengguna bahwa data telah ditambahkan ke keranjang
      alert("Data berhasil ditambahkan ke keranjang");

      location.reload();

      // Berhenti dari mengirimkan formulir
      event.preventDefault();
    });
  });

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
});
