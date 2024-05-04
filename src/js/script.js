// Pastikan script dijalankan setelah DOM sepenuhnya dimuat
document.addEventListener("DOMContentLoaded", function () {
  // Mendapatkan semua elemen nav item
  const navItems = document.querySelectorAll("#nav .nav-item");

  navItems.forEach((navItem) => {
    navItem.addEventListener("click", function () {
      // Menghapus class aktif dari semua nav item
      navItems.forEach((item) => {
        item.className = "nav-item block py-2 px-3 text-gray-900 lg:text-white rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0 font-medium";
      });

      // Menambahkan class aktif ke nav item yang diklik
      this.className = "nav-item block py-2 px-3 text-gray-900 lg:text-yellow-400 bg-yellow-500 rounded-sm lg:bg-transparent lg:text-ambeer-700 lg:p-0 font-medium lg:underline underline-offset-8";
    });
  });
});
