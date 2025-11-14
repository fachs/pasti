<x-app-layout title="Laporan Keuangan" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-10">
		<div class="flex items-center space-x-4 py-5 lg:py-6">
			<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> Laporan Keuangan </h2>
			<div class="hidden h-9 py-1 sm:flex">
				<div class="h-8 w-px bg-slate-300"></div>
			</div>
			<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
				<li class="flex items-center space-x-2">
					<a class="text-primary transition-colors hover:text-primary-focus" href="{{route('keuangan')}}">Keuangan</a>
					<svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
					</svg>
				</li>
				<li>Laporan Keuangan</li>
			</ul>
			<div class="pr-5"></div>

		</div>
		<div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
			<div class="card px-4 pb-4 sm:px-5">
				<div class="w-full">
					<div class="mt-5">
						<div x-data="{ activeTab: 'tabHome' }" class="tabs flex flex-col">
							<div class="tabs-list flex justify-between">
								<div class="">
									<button @click="activeTab = 'tabHome'" :class="activeTab === 'tabHome' ?
                                            'border-primary text-primary' :
                                            'border-transparent hover:text-slate-800 focus:text-slate-800'" class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium"> Pengeluaran </button>
									<button @click="activeTab = 'tabProfile'" :class="activeTab === 'tabProfile' ?
                                              'border-primary text-primary' :
                                              'border-transparent hover:text-slate-800 focus:text-slate-800'" class="btn shrink-0 rounded-none border-b-2 px-3 py-2 font-medium"> Pemasukan </button>
								</div>
								<div x-show="activeTab === 'tabHome'" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
									<div class="flex gap-2">
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
															<h3 class="text-base font-medium text-slate-700"> Tambah Data Pengeluaran </h3>
															<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																	<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
																</svg>
															</button>
														</div>
														<div class="px-4 py-4 sm:px-5">
															<form action="{{ route('keuangan/laporan/out') }}" method="post"> @method('POST') @csrf <div class="mt-4 space-y-4">
																<input type="hidden" name="bidang" value="{{ auth()->user()->bidang }}">	
																<label class="block">
																		<span>Penerima</span>
																		<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="penerima" />
																	</label>
																	<label class="block">
																		<span>Uraian</span>
																		<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="uraian" />
																	</label>
																	<label class="flex gap-2">
																		<label class="block">
																			<span>Harga Satuan</span>
																			<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="harga_satuan" />
																		</label>
																		<label class="block">
																			<span>Kuantitas</span>
																			<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="kuantitas" />
																		</label>
																	</label>
																	<label class="block">
																		<span>Total</span>
																		<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="total" />
																	</label>
																	<label class="inline-flex items-center">
																		<span>Tanggal Pelaksanaan</span>
																	</label>
																	<label class="relative flex">
																		<input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="Choose date..." type="text" name="tanggal" />
																		<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
																			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
																				<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
																			</svg>
																		</span>
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
								</div>
								<div x-show="activeTab === 'tabProfile'" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
									<div class="flex gap-2">
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
															<h3 class="text-base font-medium text-slate-700"> Tambah Data Pemasukan </h3>
															<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																	<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
																</svg>
															</button>
														</div>
														<div class="px-4 py-4 sm:px-5">
															<form action="{{ route('keuangan/laporan/in') }}" method="post"> @method('POST') @csrf <div class="mt-4 space-y-4">
																	<input type="hidden" name="bidang" value="{{ auth()->user()->bidang }}">
																	<label class="block">
																		<span>Sumber</span>
																		<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="sumber" />
																	</label>
																	<label class="block">
																		<span>Jumlah</span>
																		<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="jumlah" />
																	</label>
																	<label class="inline-flex items-center">
																		<span>Tanggal</span>
																	</label>
																	<label class="relative flex">
																		<input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="Choose date..." type="text" name="tanggal" />
																		<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
																			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
																				<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
																			</svg>
																		</span>
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
								</div>
							</div>
							<div class="tab-content pt-4">
								<div x-show="activeTab === 'tabHome'" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
									<div>
										<div class="card mt-3">
											<div class="is-scrollbar-hidden min-w-full overflow-x-auto">
												<table class="is-hoverable w-full text-left">
													<thead>
														<tr>
															<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Penerima </th>
															<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Uraian </th>
															<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Harga Satuan </th>
															<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Kuantitas </th>
															<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Total </th>
															<th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Aksi </th>
														</tr>
													</thead>
													<tbody> @foreach ($laporanOuts as $laporanOut) <tr class="border-y border-transparent border-b-slate-200">
															<td x-text="" class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $laporanOut->penerima }}</td>
															<td x-text="" class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $laporanOut->uraian }}</td>
															<td x-text="" class="whitespace-nowrap px-3 py-3 sm:px-5">Rp {{ $laporanOut->harga_satuan }}</td>
															</td>
															<td x-text="" class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $laporanOut->kuantitas }}</td>
															</td>
															<td x-text="" class="whitespace-nowrap px-4 py-3 sm:px-5">Rp {{ $laporanOut->total }}</td>
															</td>
															<td class="whitespace-nowrap px-4 py-3 sm:px-5">
																<div class="flex gap-2">
																	<div>
																		<div x-data="{showModal:false}">
																			<button @click="showModal = true" class="btn h-8 w-8 p-0 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
																				<i class="fa fa-edit"></i>
																			</button>
																			<template x-teleport="#x-teleport-target">
																				<div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
																					<div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
																					<div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
																						<div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
																							<h3 class="text-base font-medium text-slate-700"> Edit Data Pengeluaran </h3>
																							<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
																								<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																									<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
																								</svg>
																							</button>
																						</div>
																						<form action="{{ route('keuanganOut.update') }}" method="post"> @method('PUT') @csrf
																						<div class="px-4 py-4 sm:px-5">
																							 <div class="mt-4 space-y-4">
																								@foreach($laporanOuts as $laporanOut)
																								<input type="hidden" name="id" value="{{ $laporanOut->id }}"/>
																								<label class="block">
																									<span>Penerima</span>
																									<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="penerima" value="{{ $laporanOut->penerima }}"/>
																								</label>
																								<label class="block">
																									<span>Uraian</span>
																									<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="uraian" value="{{ $laporanOut->uraian }}" />
																								</label>
																								<label class="flex gap-2">
																									<label class="block">
																										<span>Harga Satuan</span>
																										<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="harga_satuan" value="{{ $laporanOut->harga_satuan }}" />
																									</label>
																									<label class="block">
																										<span>Kuantitas</span>
																										<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="kuantitas" value="{{ $laporanOut->kuantitas }}" />
																									</label>
																								</label>
																								<label class="block">
																									<span>Total</span>
																									<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="total" value="{{ $laporanOut->total }}" />
																								</label>
																								<label class="inline-flex items-center">
																									<span>Tanggal Pelaksanaan</span>
																								</label>
																								<label class="relative flex">
																									<input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="Choose date..." type="text" name="tanggal" value="{{ $laporanOut->tanggal }}" />
																									<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
																										<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
																											<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
																										</svg>
																									</span>
																								</label>
																								<div class="space-x-2 text-right">
																									<button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Batal </button>
																									<button @click="showModal = false" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Simpan </button>
																								</div>
																							</div>
																							@endforeach
																						
																						</div>
																					</form>
																					</div>
																				</div>
																			</template>
																		</div>
																	</div>

																</div>
															</td>
														</tr> @endforeach </tbody>
												</table>
											</div>
											<div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
												<div class="text-xs+"></div>
												<ol class="pagination"> {!! $laporanOuts->links() !!} </ol>
											</div>
										</div>
									</div>
								</div>
								<div x-show="activeTab === 'tabProfile'" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
									<div>
										<div class="card">
											<div class="is-scrollbar-hidden min-w-full overflow-x-auto" x-data="pages.tables.initExample1">
												<div class="flex pb-3 justify-between">
													<div class="w-2"></div>
												</div>
												<table class="is-hoverable w-full text-left">
													<thead>
														<tr>
															<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Tanggal </th>
															<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Sumber Dana </th>
															<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Jumlah </th>
															<th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Aksi </th>
														</tr>
													</thead>
													<tbody> @foreach ($laporanIns as $laporanIn) <tr class="border-y border-transparent border-b-slate-200">
															<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $laporanIn->tanggal }}</td>
															<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $laporanIn->sumber }}</td>
															<td class="whitespace-nowrap px-4 py-3 sm:px-5">Rp {{ $laporanIn->jumlah }}</td>
															<td class="whitespace-nowrap px-4 py-3 sm:px-5">
																<div class="flex gap-3">
																	<div>
																		<div x-data="{showModal:false}">
																			<button @click="showModal = true" class="">
																				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
																					<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
																				</svg>
																			</button>
																			<template x-teleport="#x-teleport-target">
																				<div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
																					<div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
																					<div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
																						<div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
																							<h3 class="text-base font-medium text-slate-700"> Edit Data Pemasukan </h3>
																							<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
																								<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																									<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
																								</svg>
																							</button>
																						</div>
																						@foreach($laporanIns as $laporanIn)
																						<div class="px-4 py-4 sm:px-5">
																							<form action="{{ route('keuanganIn.update') }}" method="post"> @method('PUT') @csrf <div class="mt-4 space-y-4">
																									<label class="block">
																										<span>Sumber</span>
																										<input type="hidden" name="id" value="{{ $laporanIn->id }}" />
																										<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="sumber" value="{{ $laporanIn->sumber }}" />
																									</label>
																									<label class="block">
																										<span>Jumlah</span>
																										<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="jumlah" value="{{ $laporanIn->jumlah }}" />
																									</label>
																									<label class="inline-flex items-center">
																										<span>Tanggal</span>
																									</label>
																									<label class="relative flex">
																										<input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="Choose date..." type="text" name="tanggal" value="{{ $laporanIn->tanggal }}" />
																										<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
																											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
																												<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
																											</svg>
																										</span>
																									</label>
																									<div class="space-x-2 text-right">
																										<button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Batal </button>
																										<button @click="showModal = false" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Simpan </button>
																									</div>
																								</div>
																							</form>
																						</div>
																						@endforeach
																					</div>
																				</div>
																			</template>
																		</div>
																	</div>

																</div>
															</td>
														</tr> @endforeach </tbody>
												</table>
											</div>
											<div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
												<div class="text-xs+"></div>
												<ol class="pagination">
													{{ $laporanIns->links('pagination::tailwind') }}
												</ol>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="code-wrapper hidden pt-4">
					<pre class="is-scrollbar-hidden max-h-96 overflow-auto rounded-lg" x-init="hljs.highlightElement($el)">
		</div>
	</div>
</div></main></x-app-layout>