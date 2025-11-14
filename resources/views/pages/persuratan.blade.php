<x-app-layout title="Persuratan" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mx-auto mt-20 grid w-full max-w-4xl grid-cols-1 gap-2 sm:grid-cols-2 sm:gap-4 lg:gap-6">

          <a href='{{ route('persuratan/nomor') }}'>
              <div class="card p-4 sm:p-5 items-center justify-center">
                <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-primary shadow-xl shadow-primary/50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-8 h-8">
                    <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                    <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                </svg>
    
                </div>
                <p class="mt-6 pb-2 font-medium text-slate-700">
                  <span class="text-xl">Permintaan No Surat</span>
                </p>
              </div>
            </a>

            <a href='{{ route('persuratan/ttd') }}'>
              <div class="card p-4 sm:p-5 items-center justify-center">
                <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-warning shadow-xl shadow-warning/50">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M9 1.5H5.625c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5zm6.61 10.936a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 14.47a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                    <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                </svg>
    
                </div>
                <p class="mt-6 font-medium text-slate-700">
                  <span class="text-xl">Permintaan Tanda Tangan</span>
                </p>
              </div>
            </a>
  
          </div>
    </main>
</x-app-layout>
