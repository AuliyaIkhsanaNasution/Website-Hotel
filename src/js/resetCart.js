document.addEventListener("DOMContentLoaded", function () {
  // Mendefinisikan fungsi ResetCart
  function ResetCart() {
    // Tampilkan dialog konfirmasi sebelum menghapus data
    if (window.confirm("Apakah Anda yakin ingin menghapus semua item di keranjang?")) {
      // Hapus item dari localStorage
      localStorage.removeItem("keranjang_");

      // Mengosongkan konten dari container booking jika diperlukan
      const bookingContainer = document.getElementById("bookingContainer");
      if (bookingContainer) {
        bookingContainer.innerHTML = "<p>Keranjang telah direset.</p>";
      }

      // Opsi lain, tampilkan pesan ke user
      alert("Keranjang telah direset.");
    }
  }
  // Menghubungkan fungsi dengan tombol
  document.getElementById("ResetCart").addEventListener("click", ResetCart);
});
