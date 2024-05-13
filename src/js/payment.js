// For example trigger on button clicked, or any time you need
const payButton = document.getElementById("pay-button");
const form = document.getElementById("payment-form");

payButton.addEventListener("click", async function (e) {
  e.preventDefault(); // Perbaikan tanda kurung
  const formData = new FormData(form); // Huruf besar pada FormData
  let data = new URLSearchParams(formData);
  const localData = localStorage.getItem("keranjang_");

  // Cek apakah localData ada, dan tambahkan ke data yang akan dikirim jika ada
  if (localData) {
    data.append("localData", localData);
  }

  // Mengambil nilai input
  const nik = document.querySelector('input[name="nik"]').value;
  const nama = document.querySelector('input[name="nama"]').value;
  const email = document.querySelector('input[name="email"]').value;
  const kontak = document.querySelector('input[name="kontak"]').value;
  const alamat = document.querySelector('input[name="alamat"]').value;

  try {
    const response = await fetch("function/payment.php", {
      method: "POST",
      body: data,
    });
    let snapToken = await response.text(); // Mengasumsikan server hanya mengembalikan token sebagai teks sederhana
    snapToken = snapToken.replace(/"/g, "");

    // Gunakan token untuk membuka Snap popup
    window.snap.pay(snapToken, {
      onSuccess: function (result) {
        // Melakukan update transaksi terlebih dahulu
        $.ajax({
          url: "function/upDatabase.php",
          type: "POST",
          data: {
            nama: document.querySelector('input[name="nama"]').value,
            email: document.querySelector('input[name="email"]').value,
            kontak: document.querySelector('input[name="kontak"]').value,
            alamat: document.querySelector('input[name="alamat"]').value,
            nik: document.querySelector('input[name="nik"]').value,
            localData: localStorage.getItem("keranjang_"), // Pastikan untuk mengirim data ini jika diperlukan
          },
          dataType: "json",
          success: function (response) {
            if (response.success) {
              Swal.fire({
                icon: "success",
                title: "Pembayaran Berhasil",
                text: "Pembayaran telah dilakukan. Cek pemesanan anda di bagian 'Cek Booking'",
              }).then((result) => {
                if (result.value) {
                  localStorage.removeItem("keranjang_");
                  location.href = "../index.php";
                }
              });
            } else {
              Swal.fire("Error", response.message, "error");
            }
          },
          error: function () {
            Swal.fire("Error", "Tidak dapat terhubung ke server.", "error");
          },
        });
      },
      onPending: function (result) {
        Swal.fire({
          icon: "info",
          title: "Pembayaran Pending",
          text: "Silahkan lakukan pembayaran. Jika terjadi kesalahan mulai ulang website",
        });
      },
      onError: function (result) {
        Swal.fire({
          icon: "error",
          title: "Pembayaran Gagal",
          text: "pembayaran Expired, silahkan lakukan pemesanan dan pembayaran kembali",
        });
      },
      onClose: function () {
        Swal.fire({
          icon: "warning",
          title: "Kamu keluar sebelum melanjutkan pemabayaran",
          text: "Silahkan lakukan pemesanan dan pembayaran kembali. Jika terjadi kesalahan mulai ulang website",
        });
      },
    });
  } catch (error) {
    console.error(error);
  }
});
