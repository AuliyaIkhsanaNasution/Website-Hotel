// Pastikan script dijalankan setelah DOM sepenuhnya dimuat
document.addEventListener("DOMContentLoaded", function () {
  // Mendapatkan semua elemen nav item
  const navItems = document.querySelectorAll("#nav .nav-item");

  navItems.forEach((navItem) => {
    navItem.addEventListener("click", function () {
      // Menghapus class aktif dari semua nav item
      navItems.forEach((item) => {
        item.className = "block px-3 py-2 font-medium text-gray-900 rounded nav-item lg:text-white hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0";
      });

      // Menambahkan class aktif ke nav item yang diklik
      this.className = "block px-3 py-2 font-medium text-gray-900 bg-yellow-500 rounded-sm nav-item lg:text-yellow-400 lg:bg-transparent lg:text-ambeer-700 lg:p-0 lg:underline underline-offset-8";
    });
  });
});
