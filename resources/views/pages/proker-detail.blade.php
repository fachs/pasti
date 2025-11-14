<x-base-layout title="Progress Proker" is-sidebar-open="true" is-header-blur="true" has-min-sidebar="true">
	<!-- Sidebar -->
	<x-app-partials.main-sidebar></x-app-partials.main-sidebar>
	<!-- App Header -->
	<x-app-partials.header></x-app-partials.header>
	<!-- Main Content Wrapper -->
	<main class="main-content todo-app w-full px-[var(--margin-x)] pb-8">
		<div class="py-5" x-data="{ isSearchbarActive: false }" x-effect="$store.breakpoints.smAndUp && (isSearchbarActive = false)">
			<div x-show="!isSearchbarActive" class="flex items-center justify-between">
				<div>
					<div class="flex space-x-2">
						<p class="text-xl font-medium text-slate-800 dark:text-navy-50"> @foreach ($prokers as $proker) Progress {{ $proker->nama }} @endforeach </p>
					</div>
					<p class="mt-2 text-xs"> <?php $currentDateTime = new DateTime('now');
                        $currentDate = $currentDateTime->format('l, F j, Y');
                        echo $currentDate; ?> </p>
				</div>
				<div x-data="{showModal:false}">
					<button @click="showModal = true" class="btn space-x-2 bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
						</svg>
						<span> Tambah Task </span>
					</button>
					<template x-teleport="#x-teleport-target">
						<div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
							<div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
							<div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
								<div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
									<h3 class="text-base font-medium text-slate-700"> Buat Task Baru </h3>
									<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
											<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
										</svg>
									</button>
								</div>
								<div class="px-4 py-4 sm:px-5">
									<form action="{{ route('task.store') }}" method="post"> @method('POST') @csrf {{-- <input type="hidden" name="isDone" value=false> --}} @foreach ($prokers as $proker) <input type="hidden" name="proker_id" value="{{ $proker->id }}"> @endforeach <div class="mt-2 space-y-2">
											<div class="block">
												<span>Nama Task</span>
												<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="nama" />
											</div>
											<div class="block mt-2 space-y-1">
												<span>Prioritas</span>
												<div class="inline-space">
													<label class="inline-flex items-center space-x-2">
														<input value="3" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
														<p>Low</p>
													</label>
													<label class="inline-flex items-center space-x-2">
														<input value="2" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
														<p>Medium</p>
													</label>
													<label class="inline-flex items-center space-x-2">
														<input value="1" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
														<p>High</p>
													</label>
												</div>
											</div>
											<div class="block">
												<span>Deadline</span>
												<label class="relative flex">
													<input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Pilih tanggal..." type="text" name="deadline" />
													<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
														<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
															<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
														</svg>
													</span>
												</label>
											</div>
											<div class="space-x-2 text-right">
												<button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Cancel </button>
												<button @click="showModal = false" type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Apply </button>
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
		<div class="card px-4 pt-2 pb-4"> 
      @foreach ($tasks as $task) 
      <div class="border-b border-slate-150 py-3 dark:border-navy-500">
				<div class="flex items-center space-x-2 sm:space-x-3">
					<h2 class="cursor-pointer text-slate-600 line-clamp-1 dark:text-navy-100">
						{{ $task->nama }}
					</h2>
				</div>
				<div class="mt-1 flex items-end justify-between">
					<div class="flex flex-wrap items-center font-inter text-xs">
						<p>{{ $task->deadline }}</p>
						<div class="m-1.5 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div>
						<span class="flex items-center space-x-1">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
							</svg>
						</span>
						<div class="m-1.5 w-px self-stretch bg-slate-200 dark:bg-navy-500"></div> @switch($task->prioritas) @case(1) <div class="badge space-x-2.5 px-1 text-error">
							<div class="h-2 w-2 rounded-full bg-current"></div>
							<span>High</span>
						</div> @break @case(2) <div class="badge space-x-2.5 px-1 text-warning">
							<div class="h-2 w-2 rounded-full bg-current"></div>
							<span>Medium</span>
						</div> @break @case(3) <div class="badge space-x-2.5 px-1 text-success">
							<div class="h-2 w-2 rounded-full bg-current"></div>
							<span>Low</span>
						</div> @break @default @endswitch
					</div>
					<div class="flex items-center space-x-1"> @if ($task->isDone) <a href="#" class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25"> Selesai </a>
						<button disabled class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#d6d6d6" class="w-5 h-5">
								<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
							</svg>
						</button> @else <form action="{{ route('task.updateCheck') }}" method="post"> @method('PUT') @csrf <input type="hidden" name="id" value={{ $task->id }} />
							<input type="hidden" name="isDone" value=1 />
							<button type="submit" class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
							</button>
						</form> @endif <form action="{{ route('task.delete') }}" method="post"> @method('PUT') @csrf <input type="hidden" name="id" value={{ $task->id }} />
							<button class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
								</svg>
							</button>
						</form>
						<div x-data="{showModal:false}">
							<button @click="showModal = true" class="btn h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
									<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
								</svg>
							</button>
							<template x-teleport="#x-teleport-target">
								<div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5" x-show="showModal" role="dialog" @keydown.window.escape="showModal = false">
									<div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" @click="showModal = false" x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
									<div class="relative w-full max-w-lg origin-top rounded-lg bg-white transition-all duration-300" x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
										<div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 sm:px-5">
											<h3 class="text-base font-medium text-slate-700"> Ubah Task </h3>
											<button @click="showModal = !showModal" class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
													<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
												</svg>
											</button>
										</div>
										<div class="px-4 py-4 sm:px-5">
											<form action="{{ route('task.update') }}" method="post"> @method('PUT') @csrf <input type="hidden" name="id" value="{{ $task->id }}" />
												<div class="mt-2 space-y-2">
													<div class="block">
														<span>Nama Task</span>
														<input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" type="text" name="nama" value="{{ $task->nama }}" />
													</div>
													<div class="block mt-2 space-y-1">
														<span>Prioritas</span>
														<div class="inline-space"> @switch($task->prioritas) @case(1) <label class="inline-flex items-center space-x-2">
																<input value="3" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>Low</p>
															</label>
															<label class="inline-flex items-center space-x-2">
																<input value="2" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>Medium</p>
															</label>
															<label class="inline-flex items-center space-x-2">
																<input checked value="1" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>High</p>
															</label> @break @case(2) <label class="inline-flex items-center space-x-2">
																<input value="3" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>Low</p>
															</label>
															<label class="inline-flex items-center space-x-2">
																<input checked value="2" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>Medium</p>
															</label>
															<label class="inline-flex items-center space-x-2">
																<input value="1" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>High</p>
															</label> @break @case(3) <label class="inline-flex items-center space-x-2">
																<input checked value="3" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>Low</p>
															</label>
															<label class="inline-flex items-center space-x-2">
																<input checked value="2" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>Medium</p>
															</label>
															<label class="inline-flex items-center space-x-2">
																<input value="1" class="form-radio is-outline h-5 w-5 rounded-full border-slate-400/70 before:bg-primary checked:border-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:before:bg-accent dark:checked:border-accent dark:hover:border-accent dark:focus:border-accent" name="prioritas" type="radio" />
																<p>High</p>
															</label> @break @default @endswitch
														</div>
													</div>
													<div class="block">
														<span>Deadline</span>
														<label class="relative flex">
															<input x-init="$el._x_flatpickr = flatpickr($el)" class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Pilih tanggal..." type="text" name="deadline" value="{{ $task->deadline }}" />
															<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
																<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
																	<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
																</svg>
															</span>
														</label>
													</div>
													<div class="space-x-2 text-right">
														<button @click="showModal = false" class="btn min-w-[7rem] rounded-full border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80"> Cancel </button>
														<button @click="showModal = false" type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Apply </button>
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
      @endforeach 
    </div>
	</main>
	<div class="fixed right-3 bottom-3 rounded-full bg-white dark:bg-navy-700">
		<button class="btn h-14 w-14 rounded-full bg-info p-0 font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 sm:hidden">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
				<path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
			</svg>
		</button>
	</div>
</x-base-layout>