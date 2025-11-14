<x-app-layout title="Audit Laporan Keuangan" is-header-blur="true">
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
			@foreach ($laporanOuts as $laporanOut)
				<span class="text-base text-indigo-500">Bidang {{ $laporanOut->bidang }}</span>
			@endforeach
			
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
                <div class="flex pb-3 justify-between">
                  <div class="w-2"></div>
                  
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

															<th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Total </th>
														</tr>
													</thead>
													<tbody> @foreach ($laporanOuts as $laporanOut) <tr class="border-y border-transparent border-b-slate-200">
															<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $laporanOut->penerima }}</td>
															<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $laporanOut->uraian }}</td>
															<td class="whitespace-nowrap px-3 py-3 sm:px-5">Rp {{ $laporanOut->harga_satuan }}</td>
															</td>
															<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $laporanOut->kuantitas }}</td>
															</td>
															<td class="whitespace-nowrap px-4 py-3 sm:px-5">Rp {{ $laporanOut->total }}</td>
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
			</div>
		</main>
	</x-app-layout>