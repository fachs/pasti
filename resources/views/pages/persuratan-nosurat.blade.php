<x-app-layout title="Permintaan Nomor Surat" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6 justify-between">
			<div class="flex space-x-3">
				<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> Permintaan Nomor Surat </h2>
				<div class="mx-4 my-1 w-px bg-slate-200"></div>
				<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
					<li class="flex items-center space-x-2">
						<a class="text-primary transition-colors hover:text-primary-focus" href="{{ route('persuratan') }}">Persuratan</a>
						<svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</li>
					<li>Permintaan Nomor Surat</li>
				</ul>
			</div>
		</div>
		<div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
			<!-- Collapsible  Table -->
			<div class="flex items-center justify-between"></div>
			<div class="card mt-3">
				<div class="is-scrollbar-hidden min-w-full overflow-x-auto">
					<table class="is-hoverable w-full text-left">
						<thead>
							<tr>
								<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Nama File </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Status </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Tanggal Unggah </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Diunggah Oleh </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Surat </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5 rounded-tr-lg"> Hasil No Surat </th>
							</tr>
						</thead>
						<tbody>
							@foreach($req_surats as $req_surat)
								<tr class="border-y border-transparent border-b-slate-200">
									<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $req_surat->file_surat }}</td>
									<td class="whitespace-nowrap px-4 py-3 sm:px-5">
										@if ($req_surat->status === 'Selesai')
												<span class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
												Selesai </span>
											@else
												<span class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
												Dalam proses </span>
											@endif
									</td>
									<td class="whitespace-nowrap px-3 py-3 lg:px-5">{{ $req_surat->created_at }}</td>
									<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $req_surat->pic_name }}</td>
									<td class="whitespace-nowrap px-4 py-3 sm:px-5">
										<a href="/{{ $req_surat->file_surat }}">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
												<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
											</svg>
										</a>
									</td>
									<td class="flex whitespace-nowrap px-4 py-3 sm:px-5">
										<div class="mr-2 mt-1">
											{{ $req_surat->hasil_no_surat }}
										</div>
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
															<h3 class="text-base font-medium text-slate-700"> Kirim Nomor Surat </h3>
															<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																	<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
																</svg>
															</button>
														</div>
														<form action="{{ route('suratNomor.update') }}" method="post"> @method('PUT') @csrf
														<div class="px-4 py-4 sm:px-5">
															 <div class="mt-2 space-y-2 mb-2">
																
																<input type="hidden" name="id" value="{{ $req_surat->id }}"/>
																<label class="block">
																	<span>Hasil Nomor Surat</span>
																	<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="hasil_no_surat"/>
																</label>
																
																<div class="space-x-2 text-right">
																	<button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Batal </button>
																	<button @click="showModal = false" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Kirim </button>
																</div>
															</div>
															
														
														</div>
													</form>
													</div>
												</div>
											</template>
										</div>

									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
					<div class="text-xs+"></div>
					<ol class="pagination">
						{{ $req_surats->links('pagination::tailwind') }}
					</ol>
				</div>
			</div>
		</div>
	</main>
</x-app-layout>