<x-app-layout title="Kepanitiaan" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6 justify-between">
			<div class="flex flex-row gap-2">
				<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> Kepanitiaan </h2>
				<div class="mx-4 my-1 w-px bg-slate-200"></div>
				<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
					<li class="flex items-center space-x-2"> @foreach($prokers as $proker) {{ $proker->nama }} @endforeach <svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</li>
					<li>Kepanitiaan</li>
				</ul>
			</div>
			<div x-data="{showModal:false}">
				<button @click="showModal = true" class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
					</svg>
					<span> Buat Rekrutmen </span>
				</button>
				<template x-teleport="#x-teleport-target">
					<div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
						<div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
						<div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
							<div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
								<h3 class="text-base font-medium text-slate-700"> Buat Rekrutmen Baru </h3>
								<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
										<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
									</svg>
								</button>
							</div>
							<div class="px-4 py-4 sm:px-5">
								<form action="{{ route('kepanitiaan.store') }}" method="post"> @method('POST') @csrf 
									@foreach($prokers as $proker)  
									<div class="mt-4 space-y-4">
										<input type="hidden" name="bidang" value="{{ auth()->user()->bidang }}">
										<label class="block">
											<span>Proker</span>
											<input disabled class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary disabled:pointer-events-none disabled:select-none disabled:border-none disabled:bg-zinc-100 dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent dark:disabled:bg-navy-600" type="text" value="{{ $proker->nama }}" />
											
										</label>
										<label class="block">
											<span>Divisi</span>
											<select name="divisi" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary">
												<option value="Acara">Acara</option>
												<option value="PDDD">PDDD</option>
												<option value="Humas">Humas</option>
												<option value="Sponsorship">Sponsorship</option>
											</select>
										</label>
										<label class="block">
											<span>Pelaksanaan</span>
											<select name="pelaksanaan" class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary">
												<option value="Daring">Daring</option>
												<option value="Luring">Luring</option>
											</select>
										</label>
										<label class="block">
											<span>Job Description</span>
											<textarea name="jobdesc" rows="4" class="form-textarea mt-1.5 w-full resize-none rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary"></textarea>
											<input type="hidden" name="proker_id" value="{{ $proker->id }}">
											<input type="hidden" name="nama_proker" value="{{ $proker->nama }}">
										</label>
										<div class="space-x-2 text-right">
											<button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Batal </button>
											<button @click="showModal = false" type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Simpan </button>
										</div>
									 </div>
									 @endforeach
								</form>
							</div>
						</div>
					</div>
			</div>
			</template>
		</div>
		</div>
		<div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
			<!-- Collapsible  Table -->
			<div class="card mt-3">
				<div class="is-scrollbar-hidden min-w-full overflow-x-auto">
					<table class="is-hoverable w-full text-left">
						<thead>
							<tr>
								<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Nama </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> NIM </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> No.WA </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Program Studi </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Divisi </th>
								<th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Alasan </th>
							</tr>
						</thead>
						<tbody> @foreach($panitias as $panitia) <tr class="border-y border-transparent border-b-slate-200">
								<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $panitia->nama }}</td>
								<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $panitia->nim }}</td>
								<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $panitia->no_whatsapp }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $panitia->prodi }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $panitia->alasan }}</td>
								<td class="whitespace-nowrap px-4 py-3 sm:px-5">
									<div x-data="usePopper({
                              offset: 12,
                              placement: 'left-start',
                              modifiers: [
                                  {name: 'flip', options: {fallbackPlacements: ['bottom','top']}},
                                  {name: 'preventOverflow', options: {padding: 10}}
                              ]
                            })" @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
										<button x-ref="popperRef" @click="isShowPopper = !isShowPopper">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
												<path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
											</svg>
										</button>
										<div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
											<div class="popper-box">
												<div class="rounded-md max-w-xl border border-slate-150 bg-white p-4">
													<h3 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1"> UI/UX Design </h3>
													<div class="break-all"> The Popover component is similar to tooltips. The difference is that the popovercancontainmuchmorecontent. Check out code for detail of usage. </div>
												</div>
												<div class="h-4 w-4" data-popper-arrow>
													<svg viewBox="0 0 16 9" xmlns="http://www.w3.org/2000/svg" class="absolute h-4 w-4" fill="currentColor">
														<path class="text-slate-150" d="M1.5 8.357s-.48.624 2.754-4.779C5.583 1.35 6.796.01 8 0c1.204-.009 2.417 1.33 3.76 3.578 3.253 5.43 2.74 4.78 2.74 4.78h-13z" />
														<path class="text-white" d="M0 9s1.796-.017 4.67-4.648C5.853 2.442 6.93 1.293 8 1.286c1.07-.008 2.147 1.14 3.343 3.066C14.233 9.006 15.999 9 15.999 9H0z" />
													</svg>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr> @endforeach </tbody>
					</table>
				</div>
				<div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
					<div class="text-xs+"></div>
					<ol class="pagination"> {!! $panitias->links() !!} </ol>
				</div>
			</div>
	</main>
</x-app-layout>