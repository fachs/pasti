<x-app-layout title="Publikasi" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="mx-auto mt-20 grid w-full max-w-4xl grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
        <a href='/publikasi/pengajuan'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-primary shadow-xl shadow-primary/50">
              <i class="fa fa-upload text-xl text-white"></i>
            </div>
            <p class="mt-6 pb-2 font-medium text-slate-700">
              <span class="text-xl">Publikasi</span>
            </p>
          </div>
        </a>

        <a href='/publikasi/desain'>
          <div class="card p-4 sm:p-5 items-center justify-center">
            <div class="flex mt-3 h-18 w-18 items-center justify-center rounded-xl bg-warning shadow-xl shadow-warning/50">
            <i class="fa fa-paint-brush text-xl text-white"></i>
            </div>
            <p class="mt-6 font-medium text-slate-700">
              <span class="text-xl">Desain</span>
            </p>
          </div>
        </a>
      </div>
      </main>
</x-app-layout>
