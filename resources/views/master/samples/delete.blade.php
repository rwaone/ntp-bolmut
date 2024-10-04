 {{-- modal delete --}}
 <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
     id="sample-delete-confirm" tabindex="-1" aria-labelledby="disabled_backdrop" aria-hidden="true"
     data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog relative w-auto pointer-events-none">
         <div
             class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
     rounded-md outline-none text-current">
             <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                 <!-- Modal header -->
                 <div
                     class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-danger-500">

                     <iconify-icon class="text-xl text-white spin-slow ltr:mr-2 rtl:ml-2 relative top-[1px]"
                         icon="material-symbols:warning-rounded"></iconify-icon>
                     <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                         Hapus Dokumen </h3>
                     <button type="button"
                         class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                 dark:hover:bg-slate-600 dark:hover:text-white"
                         data-bs-dismiss="modal">
                         <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                         11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                 clip-rule="evenodd"></path>
                         </svg>
                         <span class="sr-only">Close modal</span>
                     </button>
                 </div>
                 <!-- Modal body -->
                 <div class="p-6 space-y-4">
                     <h6 class="text-base text-slate-900 dark:text-white leading-6">
                         Apakah anda yakin akan menghapus data ini?
                     </h6>
                     <div style="margin-left: 10px">

                         <i>Data hilang takkan kembali, <br>
                             Hapusnya cepat, tak pikir panjang. <br>
                             Dicari-cari, kini kau sedih sendiri, <br>
                             Sudah terlambat, cuma bisa bilang "Sayang!" <br>
                             <i>
                     </div>
                     <span id="sample-delete-id" class="hidden"></span>


                 </div>
                 <!-- Modal footer -->
                 <div
                     class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">

                     <button data-bs-dismiss="modal"
                         class="btn inline-flex justify-center text-white bg-success-500">Batal</button>
                     <button id="hapus-confirm-button" class="btn inline-flex justify-center text-white bg-danger-500">
                         <iconify-icon id="hapus-loading"
                             class="text-xl spin-slow ltr:mr-2 rtl:ml-2 relative top-[1px] hidden"
                             icon="line-md:loading-twotone-loop"></iconify-icon>
                         Hapus</button>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     (() => {
         const hapusConfirmButton = document.getElementById('hapus-confirm-button')
         hapusConfirmButton.addEventListener('click', async () => {
             const hapusLoading = document.getElementById('hapus-loading');
             hapusLoading.classList.remove('hidden');
             try {
                 const sampleDeleteId = document.getElementById('sample-delete-id');
                 const response = await axios.delete(
                     `/master/samples/${sampleDeleteId.textContent}`);


             } catch (error) {
                 console.log({
                     error
                 });
             } finally {
                 hapusLoading.classList.add('hidden');
                 $('[data-bs-dismiss=modal]').click();
                 window.location.reload();

             }

         })
     })();
 </script>
