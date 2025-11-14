<x-app-layout title="Pengajuan Desain" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6 justify-between">
			<div class="flex space-x-3">
				<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> Desain </h2>
				<div class="mx-4 my-1 w-px bg-slate-200"></div>
				<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
					<li class="flex items-center space-x-2">
						<a class="text-primary transition-colors hover:text-primary-focus" href="{{ route('publikasi') }}">Publikasi</a>
						<svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</li>
					<li>Pengajuan Desain</li>
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
						<tbody> @foreach ($desains as $desain) <tr class="border-y border-transparent border-b-slate-200">
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $desain->judul }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">
									@if ($desain->status == 'Selesai')
											<span class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25"> Selesai </span>
										@else
											<span class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25"> Dalam proses </span>
										@endif
								</td>
								<td class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 lg:px-5">
									{{ $desain->created_at }}
								</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $desain->pic_name }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $desain->jenis }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">Bidang</td>
								<td class="flex whitespace-nowrap space-x-4 px-4 py-3 sm:px-5">
									<a href="http://wa.me/+62{{ $desain->pic_kontak }}" class="mt-2">
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
															  class="relative w-1/2 rounded-lg bg-white pt-10 pb-4 text-center transition-all duration-300 dark:bg-navy-700"
															  x-show="showModal"
															  x-transition:enter="easy-out"
															  x-transition:enter-start="opacity-0 [transform:translate3d(0,1rem,0)]"
															  x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
															  x-transition:leave="easy-in"
															  x-transition:leave-start="opacity-100 [transform:translate3d(0,0,0)]"
															  x-transition:leave-end="opacity-0 [transform:translate3d(0,1rem,0)]"
															>
															<form action="{{ route('desainCreate.update') }}" method="post" enctype="multipart/form-data"> 
																@method('PUT') @csrf 
																  <span>Upload hasil desain</span>
																  <div class="mt-4 px-4 sm:px-12">
																	<div class="filepond fp-grid fp-bordered [--fp-grid:2]">
																		<div class="mb-3">
																			<input
																			  class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
																			  name="hasil_desain"
																			  type="file" />
																			  <input type="hidden" name="id" value="{{ $desain->id }}"/>
																		  </div>
																	</div>
																	
																  </div>
																  
																  <div class="space-x-3">
																	<button
																	  @click="showModal = false"
																	  class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"
																	>
																	  Batal
																	</button>
																	<button
																	  @click="showModal = false" type="submit"
																	  class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
																	>
																	  Kirim
																	</button>
																  </div>
																</form>
															</div>
														  </div>
														</template>
													  </div>
									</div>
									<div class="mt-2">
										<a href="/uploads/images/{{ $desain->lampiran }}">
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
						{{ $desains->links('pagination::tailwind') }}
					</ol>
				</div>
			</div>
		</div>
    </div>
	</main>
</x-app-layout>