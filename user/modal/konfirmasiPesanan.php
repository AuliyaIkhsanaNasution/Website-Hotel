 <!-- Main modal -->
 <div id="konfirmasi-<?= $rowType['slug'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative w-full max-w-md max-h-full p-4">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
                 <h3 class="text-lg font-semibold text-gray-900 ">
                     Verifikasi Pemesanan
                 </h3>
                 <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto " data-modal-toggle="konfirmasi-<?= $rowType['slug'] ?>">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <form class="p-4 md:p-5" id="form-<?= $rowType['slug'] ?>">
                 <div class="grid grid-cols-2 gap-4 mb-4">
                     <input type="hidden" name="checkin" id="checkin" value="<?= $checkin ?>">
                     <input type="hidden" name="checkout" id="checkout" value="<?= $checkout ?>">
                     <input type="hidden" name="image" id="image" value="<?= $rowType['image'] ?>">
                     <input type="hidden" name="idType" id="idType" value="<?= $rowType['tipe_kamar_id'] ?>">

                     <div class="col-span-2">
                         <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Tipe Kamar</label>
                         <input type="text" value="<?= $rowType['nama_tipe'] ?>" name="tipeKamar" id="tamu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " readonly>
                     </div>
                     <div class="col-span-2">
                         <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Jumlah tamu/kamar <span class="inline-block text-xs font-medium text-[#ef4444]">*diatas 10 thn</span></label>
                         <p class="text-xs text-yellow-500 font-ligth">Max 2 Orang perkamar</p>
                         <input type="number" min="1" max="2" placeholder="1" name="tamu" id="tamu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                     </div>
                     <div class="col-span-2">
                         <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Pilih Kamar</label>
                         <select name="kamar" id="kamar" class="kamar-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                             <option selected>--Pilih Kamar--</option>

                             <?php
                                $kamar = mysqli_query($conn, "SELECT * FROM kamar WHERE tipe_kamar_id = '$rowType[tipe_kamar_id]'");
                                while ($rowKamar = mysqli_fetch_assoc($kamar)) {
                                    $bookingDates = json_decode($rowKamar['booking_date']); // Decode JSON booking_date
                                    echo "<script>console.log('Booking Dates: " . json_encode($bookingDates) . "');</script>"; // Debug booking dates

                                    // Cek apakah tanggal checkin ada di booking dates
                                    if (!in_array($checkin, $bookingDates)) {
                                ?>
                                     <option value="<?= $rowKamar['kamar_id'] ?>"><?= $rowKamar['kamar_id'] ?></option>
                             <?php }
                                }
                                ?>
                         </select>
                     </div>
                     <div class="col-span-2">
                         <label for="fasilitas" class="block mb-2 text-sm font-medium text-gray-900 ">fasilitas Tambahan</label>
                         <select name="fasilitas" id="fasilitas" class="kamar-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                             <option value="Tanpa Sarapan">Tanpa Sarapan</option>
                             <option value="Sarapan">Sarapan</option>
                         </select>
                     </div>
                     <div class="col-span-2">
                         <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 ">Total Harga</label>
                         <input type="number" name="harga" id="harga" data-harga-awal="<?= $rowType['harga'] ?>" value="<?= $rowType['harga'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " readonly>
                     </div>
                 </div>
                 <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                     <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                     </svg>
                     Masukkan Keranjang
                 </button>
             </form>
         </div>
     </div>
 </div>