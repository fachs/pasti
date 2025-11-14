<x-base-layout title="Buat Bidang">
    <div class="fixed top-0 hidden p-6 lg:block lg:px-12">
        <a href="#" class="flex items-center space-x-2">
            <img class="h-12 w-12" src="{{ asset('favicon.png') }}" alt="logo" />
            <p class="text-xl font-semibold uppercase text-slate-700">
                Neuron
            </p>
        </a>
    </div>
    <div class="hidden w-full place-items-center lg:grid">
        <div class="w-full pl-20">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets5.lottiefiles.com/packages/lf20_h6ykqbyg.json"  background="transparent"  speed="1"  style="width: 600px; height: 400px;"  loop  autoplay></lottie-player>
        </div>
    </div>
    <main class="flex w-full flex-col items-center bg-white lg:max-w-md">
        <div class="flex w-full max-w-sm grow flex-col justify-center p-5">

            <form class="mt-4" action="{{ route('bidang.store') }}" method="post">
                @method('POST') @csrf
                <div class="space-y-4">
                    <div>
                        <label class="relative flex">
                            <input
                                class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring"
                                placeholder="Nama Bidang" type="text" name="nama" value="{{ old('nama') }}" />
                            <span
                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                  </svg>                                  
                            </span>
                        </label>
                        @error('nama')
                            <span class="text-tiny+ text-error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit"
                    class="btn mt-10 h-10 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                    Buat Bidang
                </button>
            </form>
        </div>
    </main>
</x-base-layout>
