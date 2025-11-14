<x-app-layout title="Kode Barang" is-header-blur="true">
  <main class="main-content w-full px-[var(--margin-x)] pb-10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="flex items-center space-x-4 py-5 lg:py-6">
      <h2 class="text-lg font-medium text-slate-800 lg:text-2xl">Kode Barang</h2>
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
        <li>Kode Barang</li>
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
                    <div class="relative w-3/4 sm:w-3/4 md:w-3/4 lg:w-1/2 origin-top rounded-lg bg-white transition-all duration-300 max-h-[80vh] overflow-y-auto" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                      <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
                        <h3 class="text-base font-medium text-slate-700"> Tambah Kode Barang </h3>
                        <button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                          </svg>
                        </button>
                      </div>
                      <div class="px-4 py-4 sm:px-5">
                        <form action="{{ route('kodeBarang.store') }}" method="post"> @method('POST') @csrf <div class="mt-4 space-y-4">
                            <label class="flex gap-2">
                              <label class="block flex-1">
                              <span>Kode</span>
                              <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="kode" />
                            </label>
                            <label class="block flex-1">
                              <span>Objek</span>
                              <select
                                name="objek"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 text-slate-700 hover:border-slate-400 focus:border-primary focus:ring-1 focus:ring-primary"
                              >
                                <option value="" disabled selected>Pilih Jenis</option>
                                <option value="TANAH">TANAH</option>
                                <option value="ALAT BESAR">ALAT BESAR</option>
                                <option value="ALAT ANGKUTAN">ALAT ANGKUTAN</option>
                                <option value="ALAT BENGKEL DAN ALAT UKUR">ALAT BENGKEL DAN ALAT UKUR</option>
                                <option value="ALAT PERTANIAN">ALAT PERTANIAN</option>
                                <option value="ALAT KANTOR DAN RUMAH TANGGA">ALAT KANTOR DAN RUMAH TANGGA</option>
                                <option value="ALAT STUDIO, KOMUNIKASI DAN PEMANCAR">ALAT STUDIO, KOMUNIKASI DAN PEMANCAR</option>
                                <option value="ALAT KEDOKTERAN DAN KESEHATAN">ALAT KEDOKTERAN DAN KESEHATAN</option>
                                <option value="ALAT LABORATORIUM">ALAT LABORATORIUM</option>
                                <option value="ALAT PERSENJATAAN">ALAT PERSENJATAAN</option>
                                <option value="KOMPUTER">KOMPUTER</option>
                                <option value="ALAT EKSPLORASI">ALAT EKSPLORASI</option>
                                <option value="ALAT PENGEBORAN">ALAT PENGEBORAN</option>
                                <option value="ALAT PRODUKSI, PENGOLAHAN DAN PEMURNIAN">ALAT PRODUKSI, PENGOLAHAN DAN PEMURNIAN</option>
                                <option value="ALAT BANTU EKSPLORASI">ALAT BANTU EKSPLORASI</option>
                                <option value="ALAT KESELAMATAN KERJA">ALAT KESELAMATAN KERJA</option>
                                <option value="ALAT PERAGA">ALAT PERAGA</option>
                                <option value="PERALATAN PROSES/PRODUKSI">PERALATAN PROSES/PRODUKSI</option>
                                <option value="RAMBU - RAMBU">RAMBU - RAMBU</option>
                                <option value="PERALATAN OLAH RAGA">PERALATAN OLAH RAGA</option>
                                <option value="BANGUNAN GEDUNG">BANGUNAN GEDUNG</option>
                                <option value="MONUMEN">MONUMEN</option>
                                <option value="BANGUNAN MENARA">BANGUNAN MENARA</option>
                                <option value="TUGU TITIK KONTROL/PASTI">TUGU TITIK KONTROL/PASTI</option>
                                <option value="JALAN DAN JEMBATAN">JALAN DAN JEMBATAN</option>
                                <option value="BANGUNAN AIR">BANGUNAN AIR</option>
                                <option value="INSTALASI">INSTALASI</option>
                                <option value="JARINGAN">JARINGAN</option>
                                <option value="BAHAN PERPUSTAKAAN">BAHAN PERPUSTAKAAN</option>
                                <option value="BARANG BERCORAK KESENIAN/KEBUDAYAAN/OLAHRAGA">BARANG BERCORAK KESENIAN/KEBUDAYAAN/OLAHRAGA</option>
                                <option value="HEWAN">HEWAN</option>
                                <option value="BIOTA PERAIRAN">BIOTA PERAIRAN</option>
                                <option value="TANAMAN">TANAMAN</option>
                                <option value="BARANG KOLEKSI NON BUDAYA">BARANG KOLEKSI NON BUDAYA</option>
                                <option value="ASET TETAP DALAM RENOVASI">ASET TETAP DALAM RENOVASI</option>
                                <option value="ASET TIDAK BERWUJUD">ASET TIDAK BERWUJUD</option>
                                <option value="KONSTRUKSI DALAM PENGERJAAN">KONSTRUKSI DALAM PENGERJAAN</option>
                                <option value="AKUMULASI PENYUSUTAN PERALATAN DAN MESIN">AKUMULASI PENYUSUTAN PERALATAN DAN MESIN</option>
                                <option value="AKUMULASI PENYUSUTAN GEDUNG DAN BANGUNAN">AKUMULASI PENYUSUTAN GEDUNG DAN BANGUNAN</option>
                                <option value="AKUMULASI PENYUSUTAN JALAN, JARINGAN DAN IRIGASI">AKUMULASI PENYUSUTAN JALAN, JARINGAN DAN IRIGASI</option>
                                <option value="AKUMULASI PENYUSUTAN ASET TETAP LAINNYA">AKUMULASI PENYUSUTAN ASET TETAP LAINNYA</option>
                                <option value="KEMITRAAN DENGAN PIHAK KETIGA">KEMITRAAN DENGAN PIHAK KETIGA</option>
                                <option value="ASET LAIN-LAIN">ASET LAIN-LAIN</option>
                                <option value="AKUMULASI AMORTISASI ASET TIDAK BERWUJUD">AKUMULASI AMORTISASI ASET TIDAK BERWUJUD</option>
                                <option value="AKUMULASI PENYUSUTAN ASET LAINNYA">AKUMULASI PENYUSUTAN ASET LAINNYA</option>
                              </select>
                            </label>
                            </label>
                            <label class="flex gap-2">
                              <label class="block flex-1">
                              <span>Sub Rincian Objek</span>
                              <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="subrincian" />
                            </label>
                            <label class="block flex-1">
                              <span>Rincian Objek</span>
                              <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="rincianobjek" />
                            </label>
                            </label>
                            <label class="block">
                              <span>Sub Sub Rincian Objek</span>
                              <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="subsubrincian" />
                            </label>
                            <label class="flex gap-2">
                              <label class="block flex-1">
                              <span>Jenis</span>
                              <select
                                name="jenis"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 text-slate-700 hover:border-slate-400 focus:border-primary focus:ring-1 focus:ring-primary"
                              >
                                <option value="" disabled selected>Pilih Jenis</option>
                                <option value="AKUMULASI AMORTISASI ASET TIDAK BERWUJUD">AKUMULASI AMORTISASI ASET TIDAK BERWUJUD</option>
                                <option value="AKUMULASI PENYUSUTAN">AKUMULASI PENYUSUTAN</option>
                                <option value="AKUMULASI PENYUSUTAN LAINNYA">AKUMULASI PENYUSUTAN LAINNYA</option>
                                <option value="ASET LAIN-LAIN">ASET LAIN-LAIN</option>
                                <option value="ASET TETAP LAINNYA">ASET TETAP LAINNYA</option>
                                <option value="ASET TIDAK BERWUJUD">ASET TIDAK BERWUJUD</option>
                                <option value="GEDUNG DAN BANGUNAN">GEDUNG DAN BANGUNAN</option>
                                <option value="JALAN, JARINGAN DAN IRIGASI">JALAN, JARINGAN DAN IRIGASI</option>
                                <option value="KEMITRAAN DENGAN PIHAK KETIGA">KEMITRAAN DENGAN PIHAK KETIGA</option>
                                <option value="KONSTRUKSI DALAM PENGERJAAN">KONSTRUKSI DALAM PENGERJAAN</option>
                                <option value="PERALATAN DAN MESIN">PERALATAN DAN MESIN</option>
                                <option value="TANAH">TANAH</option>
                              </select>
                            </label>
                            <label class="block flex-1">
                              <span>Kelompok</span>
                              <select
                                name="kelompok"
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 text-slate-700 hover:border-slate-400 focus:border-primary focus:ring-1 focus:ring-primary"
                              >
                                <option value="" disabled selected>Pilih Kelompok</option>
                                <option value="ASET TETAP">ASET TETAP</option>
                                <option value="ASET LAINNYA">ASET LAINNYA</option>
                                <option value="ASET TETAP LAINNYA">ASET TETAP LAINNYA</option>
                              </select>
                            </label>
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
    <p class="text-gray-600 text-sm mb-6">
      Yakin ingin menghapus data ini? 
    </p>
    <div class="flex justify-end space-x-2">
      <button
        type="button"
        onclick="closeDeleteModal()"
        class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300"
      >
        Batal
      </button>
      <button
        id="confirmDeleteBtn"
        type="button"
        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700"
      >
        Ya, Hapus
      </button>
    </div>
  </div>
</div>

<!-- Notifikasi -->
<div id="notification"
  class="hidden fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md text-sm z-50 transition-all duration-300">
  <span id="notifText">Berhasil!</span>
</div>

              <script>
                  // window.deleteItem = async function(id)  {
                  //   Swal.fire({
                  //     title: "Yakin ingin menghapus data ini?",
                  //     text: "Data yang dihapus tidak dapat dikembalikan.",
                  //     icon: "warning",
                  //     showCancelButton: true,
                  //     confirmButtonText: "Ya, hapus!",
                  //     cancelButtonText: "Batal",
                  //     // buttonsStyling: false,
                  //   }).then(async (result) => {
                  //     if (result.isConfirmed) {
                  //       try {
                  //         const response = await fetch(`/api/kode_barangs/${id}`, {
                  //           method: "DELETE",
                  //           headers: { "Accept": "application/json" }
                  //         });

                  //         const data = await response.json();

                  //         if (response.ok && data.success) {
                  //           Swal.fire({
                  //             icon: "success",
                  //             title: "Berhasil!",
                  //             text: data.message
                  //           });

                  //           // Contoh: refresh tabel Grid.js setelah hapus
                  //           if (window.grid) location.reload();

                  //         } else {
                  //           Swal.fire({
                  //             icon: "error",
                  //             title: "Gagal!",
                  //             text: data.message || "Terjadi kesalahan saat menghapus data."
                  //           });
                  //         }
                  //       } catch (error) {
                  //         Swal.fire({
                  //           icon: "error",
                  //           title: "Error!",
                  //           text: "Tidak dapat terhubung ke server."
                  //         });
                  //       }
                  //     }
                  //   });
                  // }
                  
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
    const response = await fetch(`/api/kode_barangs/${deleteId}`, {
      method: "DELETE",
      headers: { "Accept": "application/json" }
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

                  function openEditModal(id, kode, subsubrincian, subrincian, rincianobjek, objek, jenis, kelompok) {
                    document.querySelector('#edit_id').value = id;
                    document.querySelector('#edit_kode').value = kode;
                    document.querySelector('#edit_objek').value = objek;
                    document.querySelector('#edit_subrincian').value = subrincian;
                    document.querySelector('#edit_rincianobjek').value = rincianobjek;
                    document.querySelector('#edit_subsubrincian').value = subsubrincian;
                    document.querySelector('#edit_jenis').value = jenis;
                    document.querySelector('#edit_kelompok').value = kelompok;
                    document.querySelector('#editModal').classList.remove('hidden');
                  }

                  function closeEditModal() {
                    document.querySelector('#editModal').classList.add('hidden');
                  }

                  async function updateData(event) {
                    event.preventDefault();
                    const id = document.querySelector('#edit_id').value;
                    const formData = new FormData(event.target);

                    const response = await fetch(`/api/kode_barangs`, {
                      method: "POST",
                      headers: { "X-HTTP-Method-Override": "PUT" },
                      body: formData
                    });

                    if (response.ok) {
                      location.reload();
                      // this.$notification({ text: "Data Berhasil Diubah!", variant: "success" });
                    }

                    
                  }
                </script>
                
              <div>
                <div x-data="pages.tables.initKodeBarangTable"></div>
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