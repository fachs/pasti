<x-app-layout title="Kode Aset" is-header-blur="true">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <main class="main-content w-full px-[var(--margin-x)] pb-10">
    <div class="flex items-center space-x-4 py-5 lg:py-6">
      <h2 class="text-lg font-medium text-slate-800 lg:text-2xl">Kode Aset</h2>
      <div class="hidden h-9 py-1 sm:flex">
        <div class="h-8 w-px bg-slate-300"></div>
      </div>
      <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
        <li class="flex items-center space-x-2">
          <a class="text-primary transition-colors hover:text-primary-focus" href="{{route('dbp')}}">DBP</a>
          <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </li>
        <li>Kode Aset</li>
      </ul>
      <div class="pr-5"></div>
      <div x-data="{showModal:false}">
        <button @click="showModal = true" class="btn rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-50 pr-2" fill="none" viewBox="0 0 24 24" stroke="white">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg> Tambah Data </button>
        <template x-teleport="#x-teleport-target">
          <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
            <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
            <div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
              <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
                <h3 class="text-base font-medium text-slate-700"> Tambah Kode Aset </h3>
                <button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
              <div class="px-4 py-4 sm:px-5">
                <form action="{{ route('kodeAset.store') }}" method="post"> @method('POST') @csrf <div class="mt-4 space-y-4">
                    <label class="block">
                      <span>Kode</span>
                      <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="kode" />
                    </label>
                    <label class="block">
                      <span>Jenis</span>
                      <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="jenis" />
                    </label>
                    <div class="space-x-2 text-right">
                      <button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Batal </button>
                      <button @click="showModal = false" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Simpan </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </template>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
      <div class="card px-4 pb-4 sm:px-5">
        <div class="w-full">
          <div class="mt-5">
            <div class="flex flex-col"></div>
            <!-- GridJS Advanced Example -->
            <div class="card pb-4">
              <!-- Modal Konfirmasi Hapus -->
              <div id="deleteModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
                  <h2 class="text-lg font-semibold text-gray-800 mb-2">Konfirmasi Hapus</h2>
                  <p class="text-gray-600 text-sm mb-6"> Yakin ingin menghapus data ini? </p>
                  <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300"> Batal </button>
                    <button id="confirmDeleteBtn" type="button" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700"> Ya, Hapus </button>
                  </div>
                </div>
              </div>
              <!-- Notifikasi -->
              <div id="notification" class="hidden fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md text-sm z-50 transition-all duration-300">
                <span id="notifText">Berhasil!</span>
              </div>
              <div>
                <script>
                  let deleteId = null;
                  window.deleteItem = function(id) {
                    deleteId = id;
                    document.querySelector('#deleteModal').classList.remove('hidden');
                  };

                  function closeDeleteModal() {
                    document.querySelector('#deleteModal').classList.add('hidden');
                  }
                  document.querySelector('#confirmDeleteBtn').addEventListener('click', async () => {
                    if (!deleteId) return;
                    try {
                      const response = await fetch(`/api/kode_asets/${deleteId}`, {
                        method: "DELETE",
                        headers: {
                          "Accept": "application/json"
                        }
                      });
                      const data = await response.json();
                      if (response.ok && data.success) {
                        showNotification("Data berhasil dihapus!", "success");
                        closeDeleteModal();
                        setTimeout(() => {
                          location.reload();
                        }, 1000);
                      } else {
                        showNotification(data.message || "Terjadi kesalahan saat menghapus data.", "error");
                      }
                    } catch (error) {
                      showNotification("Tidak dapat terhubung ke server.", "error");
                    }
                  });

                  function showNotification(message, type = "success") {
                    const notif = document.querySelector('#notification');
                    const notifText = document.querySelector('#notifText');
                    notifText.textContent = message;
                    notif.classList.remove('hidden');
                    notif.classList.remove('bg-green-500', 'bg-red-500');
                    notif.classList.add(type === "success" ? 'bg-green-500' : 'bg-red-500');
                    setTimeout(() => {
                      notif.classList.add('hidden');
                    }, 2500);
                  }

                  function openEditModal(id, kode, jenis) {
                    document.querySelector('#edit_id').value = id;
                    document.querySelector('#edit_kode').value = kode;
                    document.querySelector('#edit_jenis').value = jenis;
                    document.querySelector('#editModal').classList.remove('hidden');
                  }

                  function closeEditModal() {
                    document.querySelector('#editModal').classList.add('hidden');
                  }
                  async function updateData(event) {
                    event.preventDefault();
                    const id = document.querySelector('#edit_id').value;
                    const formData = new FormData(event.target);
                    const response = await fetch(`/api/kode_asets`, {
                      method: "POST",
                      headers: {
                        "X-HTTP-Method-Override": "PUT"
                      },
                      body: formData
                    });
                    if (response.ok) {
                      location.reload();
                      // this.$notification({ text: "Data Berhasil Diubah!", variant: "success" });
                    }
                  }
                </script>
                <div x-data="pages.tables.initKodeAsetTable"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="code-wrapper hidden pt-4">
          <pre class="is-scrollbar-hidden max-h-96 overflow-auto rounded-lg" x-init="hljs.highlightElement($el)">
					</div>
				</div>
			</div>
		</main>
	</x-app-layout>