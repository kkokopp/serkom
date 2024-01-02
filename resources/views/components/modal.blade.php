{{-- deklarasi props --}}
@props(['item', 'index'])

{{-- modal --}}
<div id={{ "modal_" . $index }} class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  
    <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
            <div class="bg-gray-50 px-4 py-3 flex flex-row-reverse justify-between items-center">
              {{-- button index --}}
              <button id="close-modal-button" data-index="{{ $index }}" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>                  
              </button>
              <h3 class=" text-lg text-black">{{ $item['title'] }}</h3>
            </div>
          <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">{{ $item['title'] }}</h3>
                <div class="mt-2">
                  <p class="text-sm text-gray-500">{{ $item['description'] }}</p>
                  <p class=" text-gray-500">Syarat :</p>
                  <ul class=" list-disc text-sm ms-5">
                    {{-- perulangan pada syarat --}}
                      @foreach ($item['syarat'] as $syarat)
                          <li>{{ $syarat }}</li>
                      @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
    //menampilkan modal 
    document.addEventListener('DOMContentLoaded', function () {
      // mendapatkan semua element yang memiliki atribut data-index
        const closeModalButtons = document.querySelectorAll('.close-modal-button');
        // melakukan perulangan pada setiap element
        closeModalButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const dataIndex = button.getAttribute('data-index');
                const modal = document.getElementById('modal_' + dataIndex);
                if (modal) {
                  // menambahkan class hidden pada modal
                    modal.classList.add('hidden');
                }
            });
        });
    });
</script>
