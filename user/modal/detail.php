<div id="<?= $rowType['slug'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-3 md:p-5 border-b rounded-t ">
                <h3 class="text-xl font-bold text-gray-900 ">
                    <?= $rowType['nama_tipe'] ?>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="<?= $rowType['slug'] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class=" pb-4 p-3 relative bg-white rounded-lg shadow overflow-hidden flex md:flex-row flex-col">
                <img class="p-2 pl-5 object-cover w-full md:w-96 h-96 md:h-auto rounded-full md:rounded-xl md:rounded-l-xl" src="../assets/images/<?= $rowType['image'] ?>.jpeg" alt="">
                <div class="flex flex-col justify-between md:w-1/2">
                    <h6 class="text-base md:text-medium font-semibold tracking-tight text-gray-900 ">Deskripsi Ruangan</h6>
                    <p class="text-base lg:text-lg"><?= $rowType['deskripsi'] ?>.</p>
                    <h6 class="mt-2 text-base md:text-medium font-semibold tracking-tight text-gray-900 ">Fasilitas Kamar</h6>

                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <i class="fa-solid fa-wind text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">Air Conditioning</span><br>
                            <i class="fa-solid fa-soap text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">Body Soap</span><br>
                            <i class="fa-solid fa-hotjar text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base"> Hot & Cold Shower</span><br>
                            <i class="fa-solid fa-tv text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-sm lg:text-base">LCD Flat Panel TV</span><br>
                            <i class="fa-solid fa-jug-detergent text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base"> Shampoo</span><br>
                            <i class="fa-solid fa-shoe-prints text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-sm lg:text-base">Slippers</span><br>
                            <i class="fa-solid fa-mug-saucer text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">coffe maker</span><br>
                        </div>
                        <div class="basis-1/2">
                            <i class="fa-solid fa-mattress-pillow text-gray-800 text-xs lg:text-sm"></i><span class="ml-2 text-sm lg:text-base">Bath Towel</span><br>
                            <i class="fa-solid fa-plug text-gray-800 text-xl lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">Cable TV</span><br>
                            <i class="fa-solid fa-phone text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">IDD Telephone</span><br>
                            <i class="fa-solid fa-ban-smoking text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">Non-Smoking</span><br>
                            <i class="fa-solid fa-shower text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">Shower</span><br>
                            <i class="fa-solid fa-pump-soap text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">Soap</span><br>
                            <i class="fa-solid fa-tooth text-gray-800 text-sm lg:text-lg"></i><span class="ml-2 text-sm lg:text-base">Toothbrush and/or Toot...</span><br>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>