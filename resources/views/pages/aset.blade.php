<x-app-layout title="Aset" is-header-blur="true">
  <main class="main-content w-full px-[var(--margin-x)] pb-10">
    <!-- FilePond core -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <!-- Plugin validasi tipe file -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <!-- (Opsional) Plugin preview file -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <div class="flex items-center space-x-4 py-5 lg:py-6">
      <h2 class="text-lg font-medium text-slate-800 lg:text-2xl">Data Aset</h2>
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
        <li>Aset</li>
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
            <div class="relative w-1/2 sm:w-1/2 md:w-1/2 lg:w-1/2
         origin-top rounded-lg bg-white transition-all duration-300 max-h-[80vh] overflow-y-auto" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
              <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
                <h3 class="text-base font-medium text-slate-700"> Tambah Data Aset </h3>
                <button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
              <div class="px-4 py-4 sm:px-5">
                <form action="{{ route('aset.store') }}" method="post" enctype="multipart/form-data"> @method('POST') @csrf <div class="mt-4 space-y-4">
                    <div class="flex gap-2" x-data="{
                            kodeAsetList: [
                                @foreach ($kode_asets as $aset)
                                    { id: '{{ $aset->id }}', kode: '{{ $aset->kode }}', jenis: '{{ $aset->jenis }}' },
                                @endforeach
                            ],
                            selectedKode: '',
                            jenis: '',
                            updateJenis() {
                                const aset = this.kodeAsetList.find(b => b.id === this.selectedKode);
                                this.jenis = aset ? aset.jenis : '';
                            }
                        }">
                      <div class="block form-group flex-1">
                        <label for="kode_aset_id">Pilih Kode Aset</label>
                        <select id="kode_aset_id" name="kode_aset_id" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" x-model="selectedKode" @change="updateJenis()">
                          <option value="">-- Pilih Kode Aset --</option> @foreach ($kode_asets as $aset) <option value="{{ $aset->id }}">{{ $aset->kode }}</option> @endforeach
                        </select>
                      </div>
                      <div class="block form-group flex-1">
                        <label for="jenis_aset">Jenis Aset</label>
                        <input type="text" id="jenis_aset" class="form-control mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" x-model="jenis" readonly>
                      </div>
                    </div>
                    <div class="flex gap-2" x-data="{
                            kodeBarangList: [
                                @foreach ($kode_barangs as $barang)
                                    { id: '{{ $barang->id }}', kode: '{{ $barang->kode }}', subsubrincian: '{{ $barang->subsubrincian }}' },
                                @endforeach
                            ],
                            selectedKode: '',
                            subsubrincian: '',
                            updateRincian() {
                                const barang = this.kodeBarangList.find(b => b.id === this.selectedKode);
                                this.subsubrincian = barang ? barang.subsubrincian : '';
                            }
                        }">
                      <div class="block form-group flex-1">
                        <label for="kode_barang_id">Pilih Kode Barang</label>
                        <select id="kode_barang_id" name="kode_barang_id" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" x-model="selectedKode" @change="updateRincian()">
                          <option value="">-- Pilih Kode Barang --</option> @foreach ($kode_barangs as $barang) <option value="{{ $barang->id }}">{{ $barang->kode }}</option> @endforeach
                        </select>
                      </div>
                      <div class="block form-group flex-1">
                        <label for="rincian_barang">Sub Sub Rincian Objek</label>
                        <input type="text" id="rincian_barang" class="form-control mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" x-model="subsubrincian" readonly>
                      </div>
                    </div>
                    <label class="block">
                      <span>Spesifikasi</span>
                      <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="spesifikasi" />
                    </label>
                    <div class="flex gap-2">
                      <label class="block flex-1">
                        <span>Spesifikasi Lainnya</span>
                        <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="spek_lainnya" />
                      </label>
                      <label class="block flex-1">
                        <span>Sumber Dana</span>
                        <select id="sumber" name="sumber" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary">
                          <option value="">-- Pilih Sumber Dana --</option>
                          <option value="APBD KOTA">APBD KOTA</option>
                          <option value="HIBAH">HIBAH</option>
                          <option value="MUTASI">MUTASI</option>
                          <option value="PEMBELIAN">PEMBELIAN</option>
                          <option value="PEMBELIAN BELUM BAYAR">PEMBELIAN BELUM BAYAR</option>
                          <option value="REKLAS DARI KDP">REKLAS DARI KDP</option>
                          <option value="PENGADAAN">PENGADAAN</option>
                          <option value="UTANG">UTANG</option>
                        </select>
                      </label>
                    </div>
                    <label class="flex gap-2">
                      <label class="block flex-1">
                        <span>Tanggal Perolehan</span>
                        <label class="relative flex">
                          <input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input mt-1.5 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Pilih tanggal..." type="text" name="tgl_perolehan" />
                        </label>
                      </label>
                      <label class="block flex-1">
                        <span>Cara Perolehan</span>
                        <select id="perolehan" name="perolehan" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary">
                          <option value="">-- Pilih Cara Perolehan --</option>
                          <option value="APBD KOTA">APBD KOTA</option>
                          <option value="HIBAH">HIBAH</option>
                          <option value="MUTASI">MUTASI</option>
                          <option value="PEMBELIAN">PEMBELIAN</option>
                          <option value="PEMBELIAN BELUM BAYAR">PEMBELIAN BELUM BAYAR</option>
                          <option value="REKLAS DARI KDP">REKLAS DARI KDP</option>
                          <option value="PENGADAAN">PENGADAAN</option>
                          <option value="UTANG">UTANG</option>
                        </select>
                      </label>
                    </label>
                    <label class="flex gap-2">
                      <label class="block">
                        <span>Ukuran</span>
                        <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="number" name="ukuran" />
                      </label>
                      <label class="block">
                        <span>Satuan</span>
                        <select id="satuan" name="satuan" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary">
                          <option value="">-- Pilih Satuan --</option>
                          <option value="Aplikasi">Aplikasi</option>
                          <option value="Bidang">Bidang</option>
                          <option value="Eks">Eks</option>
                          <option value="Golong">Golong</option>
                          <option value="Kajian">Kajian</option>
                          <option value="KEG">KEG</option>
                          <option value="Konstruksi">Konstruksi</option>
                          <option value="Lot">Lot</option>
                          <option value="Paket">Paket</option>
                          <option value="Pcs">Pcs</option>
                          <option value="Roll">Roll</option>
                          <option value="Set">Set</option>
                          <option value="Tabung">Tabung</option>
                          <option value="Unit">Unit</option>
                        </select>
                      </label>
                      <label class="block">
                        <span>Kondisi</span>
                        <select id="kondisi" name="kondisi" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary">
                          <option value="">-- Pilih Kondisi --</option>
                          <option value="BAIK">BAIK</option>
                          <option value="BUAH">BUAH</option>
                          <option value="RUSAK BERAT">RUSAK BERAT</option>
                          <option value="RUSAK RINGA">RUSAK RINGAN</option>
                          <option value="TABUNG">TABUNG</option>
                          <option value="UNIT">UNIT</option>
                        </select>
                      </label>
                    </label>
                    <div class="flex gap-2">
                      <label class="flex-1 block">
                        <span>Lokasi</span>
                        <select id="lokasi" name="lokasi" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary">
                          <option value="">-- Pilih Lokasi Aset --</option>
                          <option value="SEKRETARIAT">SEKRETARIAT</option>
                          <option value="BID. P2P">BID. P2P</option>
                          <option value="BID. YANKES">BID. YANKES</option>
                          <option value=">BID. KESMAS">BID. KESMAS</option>
                          <option value="BID. SDK">BID. SDK</option>
                        </select>
                      </label>
                      <div class="flex-1 block">
                        <span>Harga Perolehan</span>
                        <label class="mt-1.5 flex -space-x-px">
                          <div class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                            <span class="-mt-1">Rp</span>
                          </div>
                          <input class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="harga_perolehan" type="number" />
                        </label>
                      </div>
                    </div>
                    <label class="block flex-1">
                      <span>Foto</span>
                      <div class="filepond fp-grid fp-bordered [--fp-grid:2]">
                        <div class="mb-3">
                          <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" name="foto" type="file" />
                        </div>
                      </div>
                    </label>
                    <label class="block flex-1">
                      <span>Dokumen</span>
                      <div class="filepond fp-grid fp-bordered [--fp-grid:2]">
                        <div class="mb-3">
                          <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" name="dokumen" type="file" />
                        </div>
                      </div>
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
                      const response = await fetch(`/api/asets/${deleteId}`, {
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

                  //  function openEditModal(data) {
                  //   document.querySelector('#edit_id').value = data.id;
                  //   document.querySelector('#edit_kode_asets').value = data.kode_asets;
                  //   document.querySelector('#edit_kode_barangs').value = data.kode_barangs;
                  //   document.querySelector('#edit_spesifikasi').value = data.spesifikasi;
                  //   document.querySelector('#edit_lokasi').value = data.lokasi;
                  //   document.querySelector('#edit_harga_perolehan').value = data.harga_perolehan;
                  //   document.querySelector('#edit_tgl_perolehan').value = data.tgl_perolehan;
                  //   document.querySelector('#edit_sumber').value = data.kode_sumber;
                  //   document.querySelector('#edit_dokumen').value = data.kode_dokumen;
                  //   document.querySelector('#edit_spek_lainnya').value = data.spek_lainnya;
                  //   document.querySelector('#edit_perolehan').value = data.perolehan;
                  //   document.querySelector('#edit_ukuran').value = data.ukuran;
                  //   document.querySelector('#edit_satuan').value = data.satuan;
                  //   document.querySelector('#edit_kondisi').value = data.kondisi;
                  //   document.querySelector('#edit_spek_lainnya').value = data.spek_lainnya;
                  //   document.querySelector('#editModal').classList.remove('hidden');
                  // }

                  // function closeEditModal() {
                  //   document.querySelector('#editModal').classList.add('hidden');
                  // }
                  // async function updateData(event) {
                  //   event.preventDefault();
                  //   const id = document.querySelector('#edit_id').value;
                  //   const formData = new FormData(event.target);
                  //   const response = await fetch(`/api/asets`, {
                  //     method: "POST",
                  //     headers: {
                  //       "X-HTTP-Method-Override": "PUT"
                  //     },
                  //     body: formData
                  //   });
                  //   if (response.ok) {
                  //     location.reload();
                  //     // this.$notification({ text: "Data Berhasil Diubah!", variant: "success" });
                  //   }
                  // }
                </script>
                <div x-data="pages.tables.initAsetTable"></div>
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