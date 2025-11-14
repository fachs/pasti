<x-app-layout title="Pengajuan RAB" is-header-blur="true">
  <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="flex items-center space-x-4 py-5 lg:py-6 justify-between">
        <div class="flex flex flex-row gap-2">
          <h2
          class="text-lg font-medium text-slate-800 lg:text-2xl"
        >
          Pengajuan RAB
        </h2>

        <div class="mx-4 my-1 w-px bg-slate-200"></div>

        <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
          <li class="flex items-center space-x-2">
            <a
              class="text-primary transition-colors hover:text-primary-focus"
              href="{{route('keuangan')}}"
              >Keuangan</a
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
          <li>Pengajuan RAB</li>
        </ul>
        </div>
        <div x-data="{showModal:false}">
          <button
          @click="showModal = true"
          class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-50" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          <span> Ajukan Anggaran </span>
          </button>
          <template x-teleport="#x-teleport-target">
            <div
              class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
              x-show="showModal"
              role="dialog"
              @keydown.window.escape="showModal = false"
            >
              <div
                class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                @click="showModal = false"
                x-show="showModal"
                x-transition:enter="ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
              ></div>
              <div
                class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300"
                x-show="showModal"
                x-transition:enter="easy-out"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="easy-in"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
              >
                <div
                  class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5"
                >
                  <h3 class="text-base font-medium text-slate-700">
                    Ajukan Anggaran Baru
                  </h3>
                  <button
                    @click="showModal = !showModal"
                    class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-4.5 w-4.5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                      ></path>
                    </svg>
                  </button>
                </div>
                <div class="px-4 py-4 sm:px-5">
                  <form action="{{ route('rab.store') }}" method="post"> @method('POST') @csrf
                    
                  <div class="mt-4 space-y-4">
                    
                    <label class="block">
                      <span>Program Kerja</span>
                      <select
                        name="proker_id" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary"
                      >
                      @foreach ($prokers as $proker)
                        <option value="{{ $proker->id }}">{{ $proker->nama }}</option>
                      @endforeach

                      </select>
                    </label>
                    <label class="block">
                      <span>Rincian</span>
                      <input
                        name="rincian" class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                        type="text"
                      />
                    </label>
                    <label class="flex gap-2">
                      <label class="block">
                        <span>Harga</span>
                          <label class="mt-1.5 flex -space-x-px">
                            <span
                              class="flex shrink-0 items-center justify-center rounded-l-lg border border-slate-300 px-3.5 font-inter"
                            >
                              <span class="-mt-1">Rp </span>
                            </span>
                            
                            <input 
                           
                              name="harga"
                              class="form-input w-full rounded-r-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary"
                              type="text"
                            />
                          </label>
                      </label>
                      <label class="block">
                        <span>Kuantitas</span>
                        <input name="kuantitas" class="form-input mt-1.5 w-21 rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" />
                      </label>
                    </label>
                    <label class="block">
                      <span id="result"></span>
                      <input type="hidden" name="total" value="result" class="text-base font-semibold" />
                      <input type="hidden" name="status" value="Proses" />
                      <input type="hidden" name="bidang" value="-">
                    </label>

                    <div class="space-x-2 text-right">
                      <button
                        @click="showModal = false"
                        class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"
                      >
                        Batal
                      </button>
                      <button
                        @click="showModal = false"
                        class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"
                      >
                        Simpan
                      </button>
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

        <!-- Collapsible  Table -->
        <div>

          <div class="card mt-3">
            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
              <table class="w-full text-left">
                <thead class="w-full">
                  <tr>
                    <th
                      class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                    >
                      Nama Proker
                    </th>
                    
                    <th
                      class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                    >
                      Status Pengajuan
                    </th>
                    <th
                    class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                  >
                    Total Pengajuan
                  </th>
                    <th
                      class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                    >
                      Detail
                    </th>
                  </tr>
                </thead>
                @foreach ($prokers as $proker)
                <tbody x-data="{expanded:false}">
                    <tr class="border-y border-transparent">
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $proker->nama }}</td>

                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <?php 
                          $counter = 0;
                          $sum = 0;
                          foreach ($rabs as $rab) {
                            if ($rab->proker_id === $proker->id && $counter === 0) {
                              if ($rab->status === 'Selesai') {
                                echo '<div class="px-5 badge rounded-full border border-success text-success"> Selesai </div>';
                              } else {
                                echo '<div class="px-5 badge rounded-full border border-info text-info">Dalam pengajuan</div>';
                              }
                              $counter++;
                            } 
                            if ($rab->proker_id === $proker->id) {
                              $sum = $sum + $rab->total;
                            } 
                          }
                        ?>
                      </td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $sum }}</td>
                      <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                        <button
                          @click="expanded = !expanded"
                          class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25"
                        >
                          <i
                            :class="expanded && '-rotate-180'"
                            class="fas fa-chevron-down text-sm transition-transform"
                          ></i>
                        </button>
                      </td>
                    </tr>
                  
                  <tr
                    class="border-y border-transparent border-b-slate-200"
                  >
                    <td colspan="100" class="p-0">
                      <div x-show="expanded" x-collapse>
                        <div class="px-4 pb-4 sm:px-5">
                          
                          <div
                            class="is-scrollbar-hidden min-w-full overflow-x-auto"
                          >
                            <table class="is-hoverable w-full text-left">
                              <thead>
                                <tr
                                  class="border-y border-transparent border-b-slate-200"
                                >
                                  <th
                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                                  >
                                    #
                                  </th>
                                  <th
                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                                  >
                                    Rincian
                                  </th>
                                  <th
                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                                  >
                                    Harga
                                  </th>
                                  <th
                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                                  >
                                    Kuantitas
                                  </th>
                                  <th
                                    class="whitespace-nowrap px-3 py-3 font-semibold uppercase text-slate-800 lg:px-5"
                                  >
                                    Total
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
     
                                <?php 
                                  $counter = 1;
                                  foreach ($rabs as $rab) {
                                    if ($rab->proker_id === $proker->id) {
                                      echo '<tr class="border-y border-transparent border-b-slate-200">
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                      ' . $counter . '
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                          '. $rab->rincian .'
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5"> 
                                          <span>Rp </span>
                                          <span>'. $rab->harga .'</span>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                          '. $rab->kuantitas .'
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                          <span>Rp </span>
                                          <span>'. $rab->total .'</span>
                                        </td>
                                      </tr>';
                                      $counter++;
                                    }
                                  }
                                ?>
                              </tbody>
                            </table>
                          </div>
                          <div class="text-right">
                            <button
                              @click="expanded = false"
                              class="btn mt-2 h-8 rounded px-3 text-xs+ font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25"
                            >
                              Hide
                            </button>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
                @endforeach
        
              </table>
            </div>

            <div
              class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5"
            >
            <div class="text-xs+"></div>
            <ol class="pagination"> {!! $rabs->links() !!} </ol>
            </div>
          </div>
        </div>

      </div>
    </main>
</x-app-layout>
