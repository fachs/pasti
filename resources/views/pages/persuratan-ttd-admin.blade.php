<x-app-layout title="Permintaan Tanda Tangan" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6 justify-between">
			<div class="flex space-x-3">
				<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> Permintaan Tanda Tangan </h2>
				<div class="mx-4 my-1 w-px bg-slate-200"></div>
				<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
					<li class="flex items-center space-x-2">
						<a class="text-primary transition-colors hover:text-primary-focus" href="{{ route('persuratan') }}">Persuratan</a>
						<svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</li>
					<li>Permintaan Tanda Tangan</li>
				</ul>
			</div>
			<div x-data="{showModal:false}">
				<button
				  @click="showModal = true"
				  class="btn relative bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"
				>
				<div class="flex items-center space-x-2">
					<i class="fa-solid fa-cloud-arrow-up text-base"></i>
					<span>Unggah Dokumen</span>
				</div>
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
					<form action="{{ route('suratTtd.upload') }}" method="post" enctype="multipart/form-data"> 
						@csrf
						  <span>Upload file surat (Format .pdf | Maks 5 MB)</span>
						  <div class="mt-4 px-4 sm:px-12">
							<div class="filepond fp-grid fp-bordered [--fp-grid:2]">
								<div class="mb-3">
									<input
									  class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
									  name="file_surat"
									  type="file" />
								  </div>
								<input type="hidden" name="status" value="Proses">
								@if (!empty(auth()->user()->no_whatsapp))
									<input type="hidden" name="pic_kontak" value="{{ auth()->user()->no_whatsapp }}">
								@else
									<input type="hidden" name="pic_kontak" value="-">
								@endif
								<input type="hidden" name="pic_name" value="{{ auth()->user()->name }}">
								<input type="hidden" name="bidang" value="{{ auth()->user()->bidang }}">
								<input type="hidden" name="file_ttd" value="-">
							</div>
							<label class="flex mb-3">
								<span class="mr-2 mt-2">Penanda Tangan:</span>
								<input
								name="nama_ttd"
								  class="form-input mt-1.5 w-1/2 rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
								  placeholder="Nama Penanda Tangan"
								  type="text"
								/>
							  </label>
							  <label class="flex mb-3">
								<span class="mr-2 mt-2">Jabatan Penanda Tangan:</span>
								<input
								name="jabatan_ttd"
								  class="form-input mt-1.5 w-1/2 rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
								  placeholder="Jabatan Penanda Tangan"
								  type="text"
								/>
							  </label>
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
							  Simpan
							</button>
						  </div>
						</form>
					</div>
				  </div>
				</template>
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
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5 rounded-tr-lg"> Hasil </th>
								</tr>
							</thead>
							<tbody>
								@foreach($req_ttds as $key=>$item)
									<tr class="border-y border-transparent border-b-slate-200">
										<td class="whitespace-nowrap px-4 py-3 sm:px-5"><?php echo(mb_strimwidth( $item->file_surat , 0, 35, "...")); ?></td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">
											@if ($item->status === 'Selesai')
												<span class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
												Selesai </span>
											@else
												<span class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
												Dalam proses </span>
											@endif
										</td>
										<td class="whitespace-nowrap px-3 py-3 lg:px-5">{{ $item->created_at }}</td>
										<td class="flex whitespace-nowrap px-4 py-3 sm:px-5">
						
  											@if ($item->status === 'Selesai')
											  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#10b981" class="w-6 h-6">
												<path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0l-3-3m3 3l3-3m-8.25 6a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
											</svg>
											@else
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
												<path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75v6.75m0 0l-3-3m3 3l3-3m-8.25 6a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
											</svg>
											@endif
                    </td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
						<div class="text-xs+"></div>
						<ol class="pagination">
							{{ $req_ttds->links('pagination::tailwind') }}
						</ol>
					</div>
				</div>
    </div>
	</main>
</x-app-layout>