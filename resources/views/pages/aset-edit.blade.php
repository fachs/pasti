<x-app-layout title="Edit Data Aset" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
          <h2
            class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"
          >
            Edit Data Aset
          </h2>
          <div class="hidden h-full py-1 sm:flex">
            <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
          </div>
          <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
            <li class="flex items-center space-x-2">
              <a
                class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                href="#"
                >Aset</a
              >
              <svg
                x-ignore
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M9 5l7 7-7 7"
                />
              </svg>
            </li>
            <li>Edit</li>
          </ul>
        </div>

        <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
          <div class="col-span-12 sm:col-span-8">
            <div class="card p-4 sm:p-5">

              <div class="mt-4 space-y-4">
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
                      <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="spesifikasi" value="{{ old('spesifikasi', $asets->spesifikasi ?? '') }}"/>
                    </label>
                    <label class="block">
                        <span>Spesifikasi Lainnya</span>
                        <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="spek_lainnya" value="{{ old('spek_lainnya', $asets->spek_lainnya ?? '') }}"/>
                      </label>
                    <label class="flex gap-2">
                      <label class="block flex-1">
                        <span>Tanggal Perolehan</span>
                        <label class="relative flex">
                          <input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input mt-1.5 peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="text" name="tgl_perolehan" value="{{ old('tgl_perolehan', $asets->tgl_perolehan ?? '') }}"/>
                        </label>
                      </label>
                      <label class="block flex-1">
                        <span>Cara Perolehan</span>
                        <select id="perolehan" name="perolehan" class="form-control form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary">
                          <option value="{{ old('perolehan', $asets->perolehan ?? '') }}">{{ old('perolehan', $asets->perolehan ?? '') }}</option>
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
                    </label>
                    <label class="flex gap-2">
                      <label class="block flex-1">
                        <span>Ukuran</span>
                        <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="number" name="ukuran" value="{{ old('ukuran', $asets->ukuran ?? '') }}"/>
                      </label>
                      <label class="block flex-1">
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
                      <label class="flex-1 block">
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
                      <div class="flex-1 block">
                        <span>Harga Perolehan</span>
                        <label class="mt-1.5 flex -space-x-px">
                          <div class="flex items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter dark:border-navy-450">
                            <span class="-mt-1">Rp</span>
                          </div>
                          <input class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" name="harga_perolehan" type="number" value="{{ old('harga_perolehan', $asets->harga_perolehan ?? '') }}"/>
                        </label>
                      </div>
                    </div>
                    <div class="flex gap-2">
                        <label class="block flex-1">
                      <span>Foto</span>
                      <div class="filepond fp-grid fp-bordered [--fp-grid:2]">
                        <div class="mb-3">
                          <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" name="foto" type="file" value="{{ old('foto', $asets->foto ?? '') }}"/>
                        </div>
                      </div>
                    </label>
                    <label class="block flex-1">
                      <span>Dokumen</span>
                      <div class="filepond fp-grid fp-bordered [--fp-grid:2]">
                        <div class="mb-3">
                          <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary" name="dokumen" type="file" value="{{ old('dokumen', $asets->dokumen ?? '') }}"/>
                        </div>
                      </div>
                    </label>
                    </div>
                    <div class="space-x-2 text-right">
                      <button class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Batal </button>
                      <button type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Simpan </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>


        </div>
      </main>
</x-app-layout>
