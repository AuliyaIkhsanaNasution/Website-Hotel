document.addEventListener("DOMContentLoaded", function () {
  const fasilitasSelects = document.querySelectorAll("#fasilitas");

  fasilitasSelects.forEach((select) => {
    const totalInput = select.closest("form").querySelector("#harga");
    console.log("Harga awal:", totalInput.dataset.hargaAwal); // Periksa di konsol untuk memastikan nilai tersimpan

    function updateHarga() {
      let hargaAwal = parseInt(totalInput.dataset.hargaAwal, 10); // Pastikan penggunaan basis desimal (10)
      let pilihanFasilitas = select.value;

      if (pilihanFasilitas === "Sarapan") {
        totalInput.value = hargaAwal + 100000; // Tambah Rp 100.000 jika memilih sarapan
      } else {
        totalInput.value = hargaAwal; // Kembalikan ke harga awal jika tanpa sarapan
      }
    }

    // Event listener untuk perubahan pada dropdown fasilitas
    select.addEventListener("change", updateHarga);
  });
});
