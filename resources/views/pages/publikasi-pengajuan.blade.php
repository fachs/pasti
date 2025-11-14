<x-app-layout title="Pengajuan Publikasi" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6 justify-between">
			<div class="flex space-x-3">
				<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> Pengajuan Publikasi </h2>
				<div class="mx-4 my-1 w-px bg-slate-200"></div>
				<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
					<li class="flex items-center space-x-2">
						<a class="text-primary transition-colors hover:text-primary-focus" href="{{ route('publikasi') }}">Publikasi</a>
						<svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</li>
					<li>Pengajuan Publikasi</li>
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
								<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold text-slate-800 lg:px-5"> Judul </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Status </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Tanggal Unggah </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Diunggah Oleh </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Jenis </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Bidang </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5 rounded-tr-lg"> Aksi </th>
							</tr>
						</thead>
						<tbody> @foreach ($publikasis as $publikasi) <tr class="border-y border-transparent border-b-slate-200">
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $publikasi->judul }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">
									@if ($publikasi->status == 'Selesai')
											<span class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25"> Selesai </span>
										@else
											<span class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25"> Dalam proses </span>
										@endif
								</td>
								<td class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 lg:px-5">
									{{ $publikasi->created_at }}
								</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $publikasi->pic_name }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $publikasi->jenis }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">Bidang</td>
								<td class="flex whitespace-nowrap space-x-4 px-4 py-3 sm:px-5">
									<a href="http://wa.me/+62{{ $publikasi->pic_kontak }}" class="mt-2">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#22c55e" class="w-6 h-6">
											<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
										</svg>
									</a>
									
									  
									<div class="">
										<div x-data="{showModal:false}">
											<button @click="showModal = true" class="btn mr-3">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#3b82f6" class="w-6 h-6">
													<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
												</svg>
											</button>
											<template x-teleport="#x-teleport-target">
												<div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
													<div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
													<div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
														<div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
															<h3 class="text-base font-medium text-slate-700"> Edit Publikasi </h3>
															<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
																	<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
																</svg>
															</button>
														</div>
														<div class="px-4 py-2 sm:px-5">
															<form action="{{ route('publikasi.update') }}" method="post"> @method('PUT') @csrf <div class="mt-4 space-y-4">
																	<label class="flex gap-2">
																		<div class="block">
																			<span>Kirim Tautan Publikasi</span>
																			<input type="hidden" name="id" value="{{ $publikasi->id }}"/>
																			<input type="hidden" name="status" value="Selesai"/>
																			<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="hasil_publikasi"/>
																		</div>
																	</label>
																	<div class="space-x-2 text-right">
																		<button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Batal </button>
																		<button @click="showModal = false" type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Selesai </button>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</template>
										</div>
									</div>
									<div class="mt-2">
										<a href="/uploads/images/{{ $publikasi->lampiran }}">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
												<path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
											</svg>
										</a>
									</div>
									
								</td>
							</tr> @endforeach </tbody>
					</table>
				</div>
				<div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
					<div class="text-xs+"></div>
					<ol class="pagination">
						{{ $publikasis->links('pagination::tailwind') }}
					</ol>
				</div>
			</div>
		</div>
	</main>
</x-app-layout>