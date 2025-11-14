<x-app-layout title="DBP" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="mx-auto mt-20 grid w-full max-w-3xl grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
        <a href='{{ route('aset') }}'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-success shadow-xl shadow-success/50">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-8 h-8">
                <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd" />
                <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
              </svg>
            </div>
            <p class="mt-6 font-medium text-slate-700">
              <span class="text-xl">Aset</span>
            </p>
          </div>
        </a>
  
        <a href='{{ route('kodeBarang') }}'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-info shadow-xl shadow-info/50">
              <svg class="w-10 h-10 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path fill="white" d="M9.98189 4.50602c1.24881-.67469 2.78741-.67469 4.03621 0l3.9638 2.14148c.3634.19632.6862.44109.9612.72273l-6.9288 3.60207L5.20654 7.225c.2403-.22108.51215-.41573.81157-.5775l3.96378-2.14148ZM4.16678 8.84364C4.05757 9.18783 4 9.5493 4 9.91844v4.28296c0 1.3494.7693 2.5963 2.01811 3.2709l3.96378 2.1415c.32051.1732.66011.3019 1.00901.3862v-7.4L4.16678 8.84364ZM13.009 20c.3489-.0843.6886-.213 1.0091-.3862l3.9638-2.1415C19.2307 16.7977 20 15.5508 20 14.2014V9.91844c0-.30001-.038-.59496-.1109-.87967L13.009 12.6155V20Z"/>
</svg>

            </div>
            <p class="mt-6 font-medium text-slate-700">
              <span class="text-xl">Kode Barang</span>
            </p>
          </div>
        </a>
        <a href='{{ route('kodeAset') }}'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-primary shadow-xl shadow-primary/50">
              <svg class="w-8 h-8 text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill="white" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
              </svg>
            </div>
            <p class="mt-6 font-medium text-slate-700">
              <span class="text-xl">Kode Aset</span>
            </p>
          </div>
        </a>
      </div>      
    </main>
  </x-app-layout>
  