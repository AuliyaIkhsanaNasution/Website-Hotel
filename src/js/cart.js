document.addEventListener("DOMContentLoaded", function () {
  function loadData() {
    const bookingContainer = document.getElementById("bookingContainer");
    const totalAmountDisplay = document.getElementById("totalAmount");
    const storedData = localStorage.getItem("keranjang_");
    let totalAmount = 0; // Initialize total amount

    if (storedData) {
      const bookings = JSON.parse(storedData);
      if (bookings.length > 0) {
        bookings.forEach((booking) => {
          const bookingHTML = `
          <div class="flex flex-col items-center justify-center max-w-4xl p-3 mb-2 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow lg:flex-row ">
            <div class="basis-1/4">
              <img src="../assets/images/${booking.image}.jpeg" class="rounded-lg lg:w-auto lg:h-auto lg:rounded-lg" alt="">
            </div>
            <div class="pt-4 pl-2 text-left basis-1/2">
              <h3 class="pt-4 font-semibold text-md lg:text-xl lg:font-bold">${booking.tipeKamar}</h3>
              <p class="mb-3 text-xs font-bold lg:text-base">${formatCurrency(booking.harga)}<span class="text-sm font-medium lg:text-sm">/Room</span></p>
              <span class="inline-block p-1 mb-2 text-xs font-medium bg-gray-200 rounded-lg lg:text-xs">(${booking.checkin}) - (${booking.checkout})</span>
              <span class="p-1 m-2 text-xs font-medium bg-gray-200 rounded-lg lg:text-xs">${booking.tamu} orang dewasa</span><br>
              <span class="p-1 mt-3 text-xs font-medium ${booking.fasilitas == "Sarapan" ? "text-green-500" : "text-red-500"} bg-gray-200 rounded-lg lg:text-xs">${
            booking.fasilitas == "Sarapan" ? "with breakfast" : "without breakfast"
          }</span>
            </div>
            <div class="pt-8 text-right basis-1/4">
              <span class="text-sm lg:text-sm">*Harga Untuk Satu Malam</span><br>
              <span class="text-2xl font-semibold lg:text-2xl">${formatCurrency(booking.total)}</span><br>
              <span class="text-xs lg:text-xs">sudah termasuk pajak</span><br>
            </div>
          </div>
          `;
          totalAmount += parseInt(booking.total); // Add to total
          const div = document.createElement("div");
          div.innerHTML = bookingHTML;
          div.className = "flex flex-col max-w-4xl p-3 mb-2 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow lg:flex-row";
          bookingContainer.appendChild(div);
        });
        // Display the formatted total amount
        totalAmountDisplay.innerHTML = `Total Amount: ${formatCurrency(totalAmount)}`;
        totalAmountDisplay.className = "p-4 text-2xl font-semibold";
      } else {
        displayNoOrdersMessage();
      }
    } else {
      displayNoOrdersMessage();
    }
  }

  function displayNoOrdersMessage() {
    const bookingContainer = document.getElementById("bookingContainer");
    bookingContainer.innerHTML = '<h1 class="my-5 text-xl font-bold text-red-800 md:text-2xl lg:text-4xl">Tidak Ada Pesanan</h1>';
  }

  function formatCurrency(value) {
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
      minimumFractionDigits: 0,
    }).format(value);
  }

  loadData();
});
