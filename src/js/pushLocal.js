// Saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
  var forms = document.querySelectorAll("form");

  forms.forEach(function (form) {
    form.addEventListener("submit", function (event) {
      var formData = new FormData(form);

      var data = JSON.parse(localStorage.getItem("keranjang_")) || [];
      var currentData = {};
      formData.forEach(function (value, key) {
        currentData[key] = value;
      });

      // Menghitung total
      if (currentData.checkin && currentData.checkout && currentData.harga) {
        var checkinDate = new Date(currentData.checkin);
        var checkoutDate = new Date(currentData.checkout);
        var timeDiff = checkoutDate - checkinDate;
        var days = timeDiff / (1000 * 3600 * 24); // Mengubah milidetik menjadi hari

        // Memastikan bahwa perhitungan hari tidak negatif dan minimal satu hari
        days = days > 0 ? days : 1;

        // Hitung total harga
        var hargaPerHari = parseFloat(currentData.harga); // Pastikan harga adalah number
        var total = days * hargaPerHari;

        // Menambahkan total ke currentData
        currentData.total = total.toFixed(2); // Format ke dua angka desimal
      }

      data.push(currentData);
      localStorage.setItem("keranjang_", JSON.stringify(data));

      alert("Data berhasil ditambahkan ke keranjang");
      location.reload();
      event.preventDefault();
    });
  });
});
