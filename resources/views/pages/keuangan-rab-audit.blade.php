<x-app-layout title="RAB Bidang" is-header-blur="true">
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6">
			<h2 class="text-lg font-medium text-slate-800 lg:text-2xl"> RAB Bidang </h2>
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
				<li>RAB Bidang</li>
			</ul>
		</div>
		<div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
			<!-- Collapsible  Table -->
				<div class="flex items-center justify-between"></div>
				<div class="card mt-3">
					<div class="is-scrollbar-hidden min-w-full overflow-x-auto">
						<table class="is-hoverable w-full text-left">
							<thead>
								<tr>
									<th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> # </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Rincian </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Harga </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Kuantitas </th>
									<th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 lg:px-5"> Total </th>
									
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								@foreach ($rabs as $rab)
									
									<tr class="border-y border-transparent border-b-slate-200">
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $i }}</td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $rab->rincian }}</td>
										<td class="whitespace-nowrap px-3 py-3 sm:px-5">{{ $rab->harga }}</td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $rab->kuantitas }}</td>
										<td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $rab->total }}</td>
										
									</tr>
									<?php $i++; ?>
								@endforeach
								
							</tbody>
						</table>
					</div>
					<div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">
						<div class="text-xs+"></div>
						<ol class="pagination">
							{{ $rabs->links('pagination::tailwind') }}
						</ol>
					</div>
				</div>
    </div>
	</main>
</x-app-layout>