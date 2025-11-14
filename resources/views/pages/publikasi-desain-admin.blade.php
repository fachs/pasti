<x-app-layout title="Pengajuan Desain" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6 justify-between">
			<div class="flex space-x-3">
				<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> Pengajuan Desain </h2>
				<div class="mx-4 my-1 w-px bg-slate-200"></div>
				<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
					<li class="flex items-center space-x-2">
						<a class="text-primary transition-colors hover:text-primary-focus" href="{{ route('publikasi') }}">Publikasi</a>
						<svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
						</svg>
					</li>
					<li> Desain </li>
				</ul>
			</div>
			<label class="btn relative bg-primary font-medium text-white shadow-lg shadow-primary/50 hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
				<a href="{{ route('desainCreate.show') }}" class="flex items-center space-x-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
					</svg>
					<span>Buat Permintaan</span>
				</a>
			</label>
		</div>
		<div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
			<!-- Collapsible  Table -->
			<div class="flex items-center justify-between"></div>
			<div class="card mt-3">
				<div class="is-scrollbar-hidden min-w-full overflow-x-auto">
					<table class="is-hoverable w-full text-left">
						<thead>
							<tr>
								<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Judul </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Status </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Tanggal Unggah </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Diunggah Oleh </th>
								<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5 rounded-tr-lg"> Aksi </th>
							</tr>
						</thead>
						<tbody>
							@foreach ($desains as $desain)
								<tr class="border-y border-transparent border-b-slate-200">
									<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $desain->judul }}</td>
									<td class="whitespace-nowrap px-4 py-3 sm:px-5">
										@if ($desain->status == 'Selesai')
											<span class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25"> Selesai </span>
										@else
											<span class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25"> Dalam proses </span>
										@endif
									</td>
									<td class="whitespace-nowrap px-3 py-3 font-medium text-slate-700 lg:px-5">{{ $desain->created_at }}</td>
									<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $desain->pic_name }}</td>
									<td class="flex whitespace-nowrap space-x-4 px-4 py-3 sm:px-5">
										@if ( $desain->status == 'Selesai')
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
							{{ $desains->links('pagination::tailwind') }}
						</ol>
				</div>
			</div>
		</div>
	</main>
</x-app-layout>