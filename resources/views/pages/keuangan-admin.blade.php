<x-app-layout title="Keuangan" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="mx-auto mt-20 grid w-full max-w-4xl grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-5 lg:gap-6">
        <a href='/keuangan/laporan'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-primary shadow-xl shadow-primary/50">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-8 h-8">
                <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" />
                <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z" clip-rule="evenodd" />
                <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z" />
              </svg>
            </div>
            <p class="mt-6 pb-2 font-medium text-slate-700">
              <span class="text-xl">Laporan Keuangan</span>
            </p>
          </div>
        </a>
  
        <a href='/keuangan/sptbh'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-warning shadow-xl shadow-warning/50">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-8 h-8">
                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
              </svg>
            </div>
            <p class="mt-6 font-medium text-slate-700">
              <span class="text-xl">SPTB Himpunan</span>
            </p>
          </div>
        </a>
  
        <a href='/keuangan/rab'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-info shadow-xl shadow-info/50">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-8 h-8">
                <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
              </svg>
            </div>
            <p class="mt-6 font-medium text-slate-700">
              <span class="text-xl">RAB Bidang</span>
            </p>
          </div>
        </a>
      </div>      
    </main>
  </x-app-layout>
  