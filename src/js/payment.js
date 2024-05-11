// For example trigger on button clicked, or any time you need
const payButton = document.getElementById("pay-button");
const form = document.getElementById("payment-form");

payButton.addEventListener("click", async function (e) {
  e.preventDefault(); // Perbaikan tanda kurung
  const formData = new FormData(form); // Huruf besar pada FormData
  const data = new URLSearchParams(formData);
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

    // console.log(snapToken);
    window.snap.pay(snapToken);
  } catch (error) {
    console.error(error);
  }
});
