<x-app-layout title="SPTB Himpunan" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6">
			<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> SPTB Himpunan </h2>
			<div class="hidden h-full py-1 sm:flex">
				<div class="h-full w-px bg-slate-300"></div>
			</div>
			<ul class="hidden flex-wrap items-center space-x-2 sm:flex">
				<li class="flex items-center space-x-2">
					<a class="text-primary transition-colors hover:text-primary-focus" href="{{ route('keuangan') }}">Keuangan</a>
					<svg x-ignore xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
					</svg>
				</li>
				<li>SPTB Himpunan</li>
			</ul>
		</div>
		<div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
			<!-- Collapsible  Table -->
			<div>
				<div class="flex items-center justify-between"></div>
				<div class="card mt-3">
					<div class="is-scrollbar-hidden min-w-full overflow-x-auto">
						<table class="is-hoverable w-full text-left">
							<thead>
								<tr>
									<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Nama Himpunan </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Nominal IUK </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Jumlah Mahasiswa </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Penanggung Jawab </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Kontak </th>
									<th class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Lampiran </th>
								</tr>
							</thead>
							<tbody>
								@foreach($sptbs as $sptb)
									<tr class="border-y border-transparent border-b-slate-200">
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $sptb->himpunan }}</td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $sptb->nominal_iuk }}</td>
										<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $sptb->jumlah_mhs }}</td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $sptb->pic }}</td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">
                      <a href="http://wa.me/+62{{ $sptb->pic_wa }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#22c55e" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                        </svg>                        
                      </a>
                    </td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">
											<a href="/{{ $sptb->lampiran_sptb }}" class="btn space-x-2 rounded-full bg-success text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
													<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
												</svg>
												<span> SPTB </span>
											</a>
											<a href="/{{ $sptb->lampiran_nList }}" class="btn space-x-2 rounded-full bg-success text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
												<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
													<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
												</svg>
												<span> Nama </span>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
	</main>
</x-app-layout>