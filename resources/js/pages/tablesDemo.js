export function initKodeAsetTable() {
    return {
        table: null,
        config: {
            columns: [{
                    id: "kode_aset.id",
                    name: "No",
                    sort: false,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_aset.kode",
                    name: "Kode",
                    sort: false,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_aset.jenis",
                    name: "Jenis",
                    sort: false,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    name: "Aksi",
                    sort: false,
                    formatter: (_, row) =>
                        Gridjs.html(`<div class="flex justify-center space-x-2">
                          
                            <button class="btn btn-info" onclick="openEditModal(${row.cells[0].data}, '${row.cells[1].data}', '${row.cells[2].data}')">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button onclick="deleteItem('${row.cells[0].data}')" class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>
                        <div id="editModal" class="hidden fixed inset-0 bg-gray-800/50 flex items-center justify-center z-50"> <form class="bg-white p-6 rounded-lg w-96" onsubmit="updateData(event)"> <h2 class="text-lg font-semibold mb-4">Edit Data Kode Aset</h2> <input type="hidden" id="edit_id" name="id"> <div class="mb-3"> <label class="block text-sm">Kode</label> <input id="edit_kode" name="kode" type="text" class="w-full border rounded p-2"> </div> <div class="mb-3"> <label class="block text-sm">Jenis</label> <input id="edit_jenis" name="jenis" type="text" class="w-full border rounded p-2"> </div> <div class="flex justify-end space-x-2"> <button type="button" onclick="closeEditModal()" class="btn bg-gray-300">Batal</button> <button type="submit" class="btn bg-blue-600 text-white">Simpan</button> </div> </form> </div>
                        `),
                },
            ],
            server: {
                url: "/api/kode_asets",
                then: data => data.map(kode_aset => [kode_aset.id, kode_aset.kode, kode_aset.jenis])
            },
            sort: true,
            search: true,
            pagination: {
                enabled: true,
                limit: 10,
            }
        },
        init() {
            this.table = new Gridjs.Grid(this.config).render(this.$root);
        },
        detailItem() {
            this.$notification({
                text: "Item detail action",
                variant: "success"
            });
        },
        deleteItem() {
            this.$notification({
                text: "Item remove action",
                variant: "warning"
            });
        },
        editItem() {
            this.$notification({
                text: "Item edit action",
                variant: "info"
            });
        },
    };
}

export function initKodeBarangTable() {
    return {
        table: null,
        config: {
            columns: [{
                    id: "kode_barang.id",
                    name: "Id",
                    sort: false,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_barang.kode",
                    name: "Kode BMD",
                    sort: true,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_barang.subsubrincian",
                    name: "Sub Sub Rincian Objek",
                    sort: true,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_barang.subrincian",
                    name: "Sub Rincian Objek",
                    sort: true,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_barang.rincianobjek",
                    name: "Rincian Objek",
                    sort: true,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_barang.objek",
                    name: "Objek",
                    sort: true,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_barang.jenis",
                    name: "Jenis",
                    sort: true,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "kode_barang.kelompok",
                    name: "Kelompok",
                    sort: true,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    name: "Aksi",
                    sort: false,
                    formatter: (_, row) =>
                        Gridjs.html(`
                          <div class="flex justify-center space-x-2">
                            <button class="btn btn-info" onclick="openEditModal('${row.cells[0].data}','${row.cells[1].data}','${row.cells[2].data}','${row.cells[3].data}','${row.cells[4].data}','${row.cells[5].data}','${row.cells[6].data}','${row.cells[7].data}')">
                              <i class="fa fa-edit"></i>
                            </button>
                            <button onclick="deleteItem('${row.cells[0].data}')" class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                <i class="fa fa-trash-alt"></i>
                            </button>

                          </div>
                        
                         <div
                        id="editModal"
                        class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                        >
                        <!-- Modal Box -->
                        <form
                            onsubmit="updateData(event)"
                            class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-6 relative animate-[fadeIn_0.3s_ease-out]"
                        >
                        <!-- Header -->
                        <div class="flex justify-between items-center border-b pb-3 mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Edit Data Kode Barang</h2>
                        <button
                            type="button"
                            onclick="closeEditModal()"
                            class="text-gray-500 hover:text-gray-700 transition"
                        >
                            ✕
                        </button>
                        </div>

                        <!-- Hidden ID -->
                        <input type="hidden" id="edit_id" name="id" />

                        <!-- Kode -->
                        <div class="mb-3">
                        <label for="edit_kode" class="block text-sm font-medium text-gray-700">Kode</label>
                        <input
                            type="text"
                            id="edit_kode"
                            name="kode"
                            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                        </div>

                        <!-- Objek -->
                        <div class="mb-3">
                        <label for="edit_objek" class="block text-sm font-medium text-gray-700">Objek</label>

                        <select
                            id="edit_objek"
                            name="objek"
                            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >
                            <option value="" disabled selected>Pilih Jenis</option>
                            <option value="TANAH">TANAH</option>
                            <option value="ALAT BESAR">ALAT BESAR</option>
                            <option value="ALAT ANGKUTAN">ALAT ANGKUTAN</option>
                            <option value="ALAT LABORATORIUM">ALAT LABORATORIUM</option>
                            <option value="BANGUNAN GEDUNG">BANGUNAN GEDUNG</option>
                            <option value="JALAN DAN JEMBATAN">JALAN DAN JEMBATAN</option>
                            <option value="ASET LAIN-LAIN">ASET LAIN-LAIN</option>
                            </select>
                        </div>

                        <!-- Sub Rincian dan Rincian -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-3">
                        <div>
                            <label for="edit_subrincian" class="block text-sm font-medium text-gray-700">Sub Rincian</label>
                            <input
                            type="text"
                            id="edit_subrincian"
                            name="subrincian"
                            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>
                        <div>
                            <label for="edit_rincianobjek" class="block text-sm font-medium text-gray-700">Rincian Objek</label>
                            <input
                            type="text"
                            id="edit_rincianobjek"
                            name="rincianobjek"
                            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>
                        </div>

                        <!-- Sub Sub Rincian -->
                        <div class="mb-3">
                        <label for="edit_subsubrincian" class="block text-sm font-medium text-gray-700">Sub Sub Rincian</label>
                        <input
                            type="text"
                            id="edit_subsubrincian"
                            name="subsubrincian"
                            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                        </div>

                        <!-- Jenis dan Kelompok -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-5">
                        <div>
                            <label for="edit_jenis" class="block text-sm font-medium text-gray-700">Jenis</label>

                            <select
                            id="edit_jenis"
                            name="jenis"
                            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >
                            <option value="" disabled selected>Pilih Jenis</option>
                            <option value="PERALATAN DAN MESIN">PERALATAN DAN MESIN</option>
                            <option value="GEDUNG DAN BANGUNAN">GEDUNG DAN BANGUNAN</option>
                            <option value="JALAN, JARINGAN DAN IRIGASI">JALAN, JARINGAN DAN IRIGASI</option>
                            <option value="ASET TIDAK BERWUJUD">ASET TIDAK BERWUJUD</option>
                            <option value="KEMITRAAN DENGAN PIHAK KETIGA">KEMITRAAN DENGAN PIHAK KETIGA</option>
                            </select>
                        </div>
                        <div>
                            <label for="edit_kelompok" class="block text-sm font-medium text-gray-700">Kelompok</label>
                    
                            <select
                            id="edit_kelompok"
                            name="kelompok"
                            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            >
                            <option value="" disabled selected>Pilih Kelompok</option>
                            <option value="ASET TETAP">ASET TETAP</option>
                            <option value="ASET LAINNYA">ASET LAINNYA</option>
                            <option value="ASET TETAP LAINNYA">ASET TETAP LAINNYA</option>
                            </select>
                        </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end gap-2">
                        <button
                            type="button"
                            onclick="closeEditModal()"
                            class="px-4 py-2 rounded-md bg-gray-300 text-gray-800 hover:bg-gray-400 transition"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition"
                        >
                            Simpan
                        </button>
                        </div>
                    </form>
                    </div>

                    

                          `),
                },

            ],
            server: {
                url: "/api/kode_barangs",
                then: data => data.map(kode_barang => [kode_barang.id, kode_barang.kode, kode_barang.subsubrincian, kode_barang.subrincian, kode_barang.rincianobjek, kode_barang.objek, kode_barang.jenis, kode_barang.kelompok])
            },
            sort: true,
            search: true,
            pagination: {
                enabled: true,
                limit: 10,
            }
        },
        init() {
            this.table = new Gridjs.Grid(this.config).render(this.$root);
        },
        detailItem() {
            this.$notification({
                text: "Item detail action",
                variant: "success"
            });
        },
        deleteItem() {
            this.$notification({
                text: "Item remove action",
                variant: "warning"
            });
        },
        editItem() {
            this.$notification({
                text: "Item edit action",
                variant: "info"
            });
        },
    };
}

export function initAsetTable() {
    return {
        table: null,
        config: {
            columns: [
                {
                    id: "aset.id",
                    name: "No",
                    sort: false,
                    formatter: (cell) => Gridjs.html(`<span class="mx-2">${cell}</span>`),
                },
                {
                    id: "aset.kode_aset_id",
                    name: "Kode Aset",
                    sort: true,
                    formatter: (cell) =>
                        Gridjs.html(
                            `<span class="mx-2">${cell}</span>`
                        ),
                },
                {
                    id: "aset.kode_barang_id",
                    name: "Kode Barang",
                    sort: true,
                    formatter: (cell) =>
                        Gridjs.html(
                            `<span class="mx-2">${cell}</span>`
                        ),
                },
                {
                    id: "aset.spesifikasi",
                    name: "Spesifikasi",
                    formatter: (cell) =>
                        Gridjs.html(
                            `<span class="mx-2">${cell}</span>`
                        ),
                },
                {
                    id: "aset.lokasi",
                    name: "Lokasi Aset",
                    sort: true,
                    formatter: (cell) =>
                        Gridjs.html(
                            `<span class="mx-2">${cell ?? '-'}</span>`
                        ),
                },
                {
                id: "aset.harga_perolehan",
                name: "Harga Perolehan",
                sort: true,
                formatter: (cell) => {
                    // Jika cell null atau undefined
                    if (!cell) return Gridjs.html(`<span class="mx-2 flex-1">Rp -</span>`);

                    // Format angka ke format rupiah
                    const formatted = new Intl.NumberFormat("id-ID", {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                    }).format(cell);

                    // Tampilkan HTML
                    return Gridjs.html(`
                    <div class="flex items-center justify-between">
                        <span class="mx-2 flex-1">Rp ${formatted}</span>
                        <button class="btn h-8 w-8 p-0 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                        <svg class="w-5 h-5 text-green-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M16.5 15v1.5m0 0V18m0-1.5H15m1.5 0H18M3 9V6a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3M3 9v6a1 1 0 0 0 1 1h5M3 9h16m0 0v1M6 12h3m12 4.5a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Z" />
                        </svg>
                        </button>
                    </div>
                    `);
                },
                },
                {
                    id: "aset.tgl_perolehan",
                    name: "Tanggal Perolehan",
                    sort: true,
                    formatter: (cell) =>
                        Gridjs.html(
                            `<span class="mx-2">${cell}</span> `
                        ),
                },
                {
                    id: "aset.sumber",
                    name: "Sumber Dana",
                    formatter: (cell) =>
                        Gridjs.html(
                            `<span class="mx-2">${cell}</span> `
                        ),
                },
                {
                    id: "aset.dokumen",
                    name: "Dokumen",
                    formatter: (cell) =>
                        Gridjs.html(
                          `
                          <a href="/public/dokumen-aset/${cell}" class="inline-flex items-center hover:text-blue-600">
                              <svg class="w-5 h-5 text-gray-800 dark:text-white transition-colors duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v6M5 19v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-1M10 3v4a1 1 0 0 1-1 1H5m14 9.006h-.335a1.647 1.647 0 0 1-1.647-1.647v-1.706a1.647 1.647 0 0 1 1.647-1.647L19 12M5 12v5h1.375A1.626 1.626 0 0 0 8 15.375v-1.75A1.626 1.626 0 0 0 6.375 12H5Zm9 1.5v2a1.5 1.5 0 0 1-1.5 1.5v0a1.5 1.5 0 0 1-1.5-1.5v-2a1.5 1.5 0 0 1 1.5-1.5v0a1.5 1.5 0 0 1 1.5 1.5Z" />
                              </svg>
                          </a>
                          `
                        ),
                },
                {
                    name: "Aksi",
                    sort: false,
                    formatter: (_, row) =>
                        Gridjs.html(
                        `
                        <div class="flex justify-center space-x-2">
                            <a href="/dbp/aset/detail/${row.cells[0].data}" class="btn h-8 w-8 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25">
                              <svg class="w-6 h-6 text-primary-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>

                            </a>
                            <a href="/dbp/aset/edit/${row.cells[0].data}" class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25" onclick='openEditModal(${JSON.stringify(row.cells.map(c => c.data))})'>
                              <i class="fa fa-edit"></i>
                            </a>
                            <button onclick="deleteItem('${row.cells[0].data}')" class="btn h-8 w-8 p-0 text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                          </div>
 
                      `),
                },
            ],
            server: {
                url: "/api/asets",
                then: data => data.map(aset => [aset.id, 
                    aset.kode_asets ? aset.kode_asets.kode : "-", 
                    aset.kode_barangs ? aset.kode_barangs.kode : "-", 
                    aset.spesifikasi, 
                    aset.lokasi, 
                    aset.harga_perolehan, 
                    aset.tgl_perolehan, 
                    aset.sumber, 
                    aset.dokumen, 
                    aset.spek_lainnya,
                    aset.perolehan,
                    aset.ukuran,
                    aset.satuan,
                    aset.kondisi,
                    aset.spek_lainnya,
                ])
            },
            sort: true,
            search: true,
            pagination: {
                enabled: true,
                limit: 10,
            }
        },
        init() {
            this.table = new Gridjs.Grid(this.config).render(this.$root);
        },
        detailItem() {
            this.$notification({
                text: "Item detail action",
                variant: "success"
            });
        },
        deleteItem() {
            this.$notification({
                text: "Item remove action",
                variant: "warning"
            });
        },
        editItem() {
            this.$notification({
                text: "Item edit action",
                variant: "info"
            });
        },
    };
}
