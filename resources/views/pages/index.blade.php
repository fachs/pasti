<x-app-layout title="Beranda" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div
            class="mt-6 flex flex-col items-center justify-between space-y-2 text-center sm:flex-row sm:space-y-0 sm:text-left">
            <div>
                <h3 class="text-xl font-semibold text-slate-700">
                    Program Kerja
                </h3>
                <p class="mt-1 hidden sm:block">Nama Bidang</p>
            </div>

        </div>
        <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">
            <div class="card shadow-none">
                <div class="flex flex-1 flex-col justify-between rounded-lg bg-warning/15 p-4 sm:p-5">
                    <div>
                        <h2 class="mt-3 text-base mb-2 text-slate-700 line-clamp-2">
                            Proker XYZ
                        </h2>
                        <p class="text-xs+">May 01, 2021</p>
                    </div>
                    <div>
                        <div class="mt-4">
                            <p class="text-xs+ text-slate-700">Progress</p>
                            <div class="progress my-2 h-1.5 bg-warning/30">
                                <span class="w-8/12 rounded-full bg-warning"></span>
                            </div>
                            <p class="text-right text-xs+ font-medium">78%</p>
                        </div>

                        <div class="mt-5 flex flex-wrap -space-x-3">
                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-warning"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <div
                                    class="is-initial rounded-full border-2 border-warning bg-info text-xs+ uppercase text-white">
                                    jd
                                </div>
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-warning"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-warning"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between space-x-2">
                            <div></div>
                            <div>
                              <div x-data="{showModal:false}">
                                <button
                                @click="showModal = true"
                                class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
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
                                      Buat Proker Baru
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
                                    <div class="mt-4 space-y-4">
                                      <label class="block">
                                        <span>Nama Program Kerja</span>
                                        <input
                                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                         
                                          type="text"
                                        />
                                      </label>
                                      <label class="block">
                                        <span>Deskripsi</span>
                                        <textarea
                                          rows="4"
                                          
                                          class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                        ></textarea>
                                      </label>
                                      <label class="block">
                                        <span>Penanggung Jawab</span>
                                        <input
                                          class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                          
                                          type="text"
                                        />
                                      </label>
                                      <label class="inline-flex items-center">
                                        <span>Tanggal Pelaksanaan</span>
                                      </label>
                                      <label class="relative flex">
                                        <input
                                          x-init="$el._x_flatpickr = flatpickr($el)"
                                          class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                          placeholder="Choose date..."
                                          type="text"
                                        />
                                        <span
                                          class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary"
                                        >
                                          <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 transition-colors duration-200"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.5"
                                          >
                                            <path
                                              stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                          </svg>
                                        </span>
                                      </label>
                                      <div class="space-x-2 text-right">
                                        <button
                                          @click="showModal = false"
                                          class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"
                                        >
                                          Cancel
                                        </button>
                                        <button
                                          @click="showModal = false"
                                          class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"
                                        >
                                          Apply
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </template>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-none">
                <div class="flex flex-1 flex-col justify-between rounded-lg bg-info/15 p-4 sm:p-5">
                    <div>
                        <h3 class="mt-3 text-base mb-2 text-slate-700 line-clamp-2">
                            Proker BCD
                        </h3>
                        <p class="text-xs+">June 04, 2021</p>
                    </div>
                    <div>
                        <div class="mt-4">
                            <p class="text-xs+ text-slate-700">
                                Progress
                            </p>
                            <div class="progress my-2 h-1.5 bg-info/15">
                                <div class="w-4/12 rounded-full bg-info"></div>
                            </div>
                            <p class="text-right text-xs+ font-medium text-info">25%</p>
                        </div>

                        <div class="mt-5 flex flex-wrap -space-x-3">
                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <div
                                    class="is-initial rounded-full border-2 border-white bg-warning text-xs+ uppercase text-white">
                                    ii
                                </div>
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between space-x-2">
                            <div></div>
                            <div x-data="{showModal:false}">
                              <button
                              @click="showModal = true"
                              class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                  viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
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
                                    Buat Proker Baru
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
                                  <div class="mt-4 space-y-4">
                                    <label class="block">
                                      <span>Nama Program Kerja</span>
                                      <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                       
                                        type="text"
                                      />
                                    </label>
                                    <label class="block">
                                      <span>Deskripsi</span>
                                      <textarea
                                        rows="4"
                                        
                                        class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                      ></textarea>
                                    </label>
                                    <label class="block">
                                      <span>Penanggung Jawab</span>
                                      <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                        
                                        type="text"
                                      />
                                    </label>
                                    <label class="inline-flex items-center">
                                      <span>Tanggal Pelaksanaan</span>
                                    </label>
                                    <label class="relative flex">
                                      <input
                                        x-init="$el._x_flatpickr = flatpickr($el)"
                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                        placeholder="Choose date..."
                                        type="text"
                                      />
                                      <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary"
                                      >
                                        <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 transition-colors duration-200"
                                          fill="none"
                                          viewBox="0 0 24 24"
                                          stroke="currentColor"
                                          stroke-width="1.5"
                                        >
                                          <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                          />
                                        </svg>
                                      </span>
                                    </label>
                                    <div class="space-x-2 text-right">
                                      <button
                                        @click="showModal = false"
                                        class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"
                                      >
                                        Cancel
                                      </button>
                                      <button
                                        @click="showModal = false"
                                        class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"
                                      >
                                        Apply
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </template>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-none">
                <div
                    class="flex flex-1 flex-col justify-between rounded-lg bg-secondary/15 p-4 sm:p-5">
                    <div>
                        <h3 class="mt-3 text-base text-slate-700 line-clamp-2 mb-2">
                            Proker JKL
                        </h3>
                        <p class="text-xs+">Oct 27, 2021</p>
                    </div>
                    <div>
                        <div class="mt-4">
                            <p class="text-xs+ text-slate-700">
                                Progress
                            </p>
                            <div class="progress my-2 h-1.5 bg-secondary/15">
                                <div class="w-6/12 rounded-full bg-secondary"></div>
                            </div>
                            <p class="text-right text-xs+ font-medium text-secondary">
                                52%
                            </p>
                        </div>

                        <div class="mt-5 flex flex-wrap -space-x-3">
                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <div
                                    class="is-initial rounded-full border-2 border-white bg-error text-xs+ uppercase text-white">
                                    pl
                                </div>
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between space-x-2">
                            <div></div>
                            <div x-data="{showModal:false}">
                              <button
                              @click="showModal = true"
                              class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                  viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
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
                                    Buat Proker Baru
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
                                  <div class="mt-4 space-y-4">
                                    <label class="block">
                                      <span>Nama Program Kerja</span>
                                      <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                       
                                        type="text"
                                      />
                                    </label>
                                    <label class="block">
                                      <span>Deskripsi</span>
                                      <textarea
                                        rows="4"
                                        
                                        class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                      ></textarea>
                                    </label>
                                    <label class="block">
                                      <span>Penanggung Jawab</span>
                                      <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                        
                                        type="text"
                                      />
                                    </label>
                                    <label class="inline-flex items-center">
                                      <span>Tanggal Pelaksanaan</span>
                                    </label>
                                    <label class="relative flex">
                                      <input
                                        x-init="$el._x_flatpickr = flatpickr($el)"
                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                        placeholder="Choose date..."
                                        type="text"
                                      />
                                      <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary"
                                      >
                                        <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 transition-colors duration-200"
                                          fill="none"
                                          viewBox="0 0 24 24"
                                          stroke="currentColor"
                                          stroke-width="1.5"
                                        >
                                          <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                          />
                                        </svg>
                                      </span>
                                    </label>
                                    <div class="space-x-2 text-right">
                                      <button
                                        @click="showModal = false"
                                        class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"
                                      >
                                        Cancel
                                      </button>
                                      <button
                                        @click="showModal = false"
                                        class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"
                                      >
                                        Apply
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </template>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-none">
                <div
                    class="flex flex-1 flex-col justify-between rounded-lg bg-success/15 p-4 sm:p-5">
                    <div>
                        <h3 class="mt-3 text-base text-slate-700 line-clamp-2 mb-2">
                            Proker ABC
                        </h3>
                        <p class="text-xs+">Sep 16, 2021</p>
                    </div>
                    <div>
                        <div class="mt-4">
                            <p class="text-xs+ text-slate-700">
                                Progress
                            </p>
                            <div class="progress my-2 h-1.5 bg-success/15">
                                <div class="w-4/12 rounded-full bg-success"></div>
                            </div>
                            <p class="text-right text-xs+ font-medium text-success">
                                33%
                            </p>
                        </div>

                        <div class="mt-5 flex flex-wrap -space-x-3">
                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <div
                                    class="is-initial rounded-full border-2 border-white bg-success text-xs+ uppercase text-white">
                                    rt
                                </div>
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>

                            <div class="avatar h-8 w-8 hover:z-10">
                                <img class="rounded-full border-2 border-white"
                                    src="{{ asset('images/200x200.png') }}" alt="avatar" />
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between space-x-2">
                            <div></div>
                            <div x-data="{showModal:false}">
                              <button
                              @click="showModal = true"
                              class="btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                  viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
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
                                    Buat Proker Baru
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
                                  <div class="mt-4 space-y-4">
                                    <label class="block">
                                      <span>Nama Program Kerja</span>
                                      <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                       
                                        type="text"
                                      />
                                    </label>
                                    <label class="block">
                                      <span>Deskripsi</span>
                                      <textarea
                                        rows="4"
                                        
                                        class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                      ></textarea>
                                    </label>
                                    <label class="block">
                                      <span>Penanggung Jawab</span>
                                      <input
                                        class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                        
                                        type="text"
                                      />
                                    </label>
                                    <label class="inline-flex items-center">
                                      <span>Tanggal Pelaksanaan</span>
                                    </label>
                                    <label class="relative flex">
                                      <input
                                        x-init="$el._x_flatpickr = flatpickr($el)"
                                        class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"
                                        placeholder="Choose date..."
                                        type="text"
                                      />
                                      <span
                                        class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary"
                                      >
                                        <svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="h-5 w-5 transition-colors duration-200"
                                          fill="none"
                                          viewBox="0 0 24 24"
                                          stroke="currentColor"
                                          stroke-width="1.5"
                                        >
                                          <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                          />
                                        </svg>
                                      </span>
                                    </label>
                                    <div class="space-x-2 text-right">
                                      <button
                                        @click="showModal = false"
                                        class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"
                                      >
                                        Cancel
                                      </button>
                                      <button
                                        @click="showModal = false"
                                        class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"
                                      >
                                        Apply
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </template>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</x-app-layout>
