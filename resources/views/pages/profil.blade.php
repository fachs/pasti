<x-app-layout title="Profil" is-header-blur="true">
	<main x-data="{activeTab:'tabAkun'}" class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6">
			<h2 class="text-xl font-medium text-slate-800 lg:text-2xl"> Profil </h2>
		</div>
		<div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
			<div class="col-span-12 lg:col-span-4">
				<div class="card p-4 sm:p-5">
					<div class="flex items-center space-x-4">
						<div class="avatar h-14 w-14">
							<img class="rounded-full" src="/uploads/images/{{ auth()->user()->profil_pict }}" alt="avatar" />
						</div>
						<div>
							<h3 class="text-base font-medium text-slate-700"> {{ auth()->user()->name }} </h3>
							<p class="text-xs+">@switch(auth()->user()->role)
								@case(1)
									Ketua -
									@break
								@case(2)
									Wakil Ketua -
									@break
								@case(3)
									Staff -
									@break
								@default
									
							@endswitch Bidang {{ auth()->user()->bidang }}</p>
						</div>
					</div>
					<ul class="mt-6 space-y-1.5 font-inter font-medium">
						<li>
							<button @click="activeTab = 'tabAkun'" :class="activeTab === 'tabAkun' ? 'bg-primary text-white outline-none' : 'hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800'" class="flex justify-start btn w-full space-x-2 rounded-lg tracking-wide transition-all">
								<span class="">Akun</span>
							</button>
						</li>
						<li>
							<button @click="activeTab = 'tabKeamanan'" :class="activeTab === 'tabKeamanan' ? 'bg-primary text-white outline-none' : 'hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800'" class="flex justify-start btn w-full space-x-2 rounded-lg tracking-wide transition-all">
								<span>Keamanan</span>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-span-12 lg:col-span-8">
				<div x-show="activeTab === 'tabAkun'" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
					<form action="{{ route('profil.update') }}" method="post" enctype="multipart/form-data"> 
						@method('PUT') @csrf 
					<div class="card">
						<div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
							<h2 class="text-lg font-medium tracking-wide text-slate-700"> Pengaturan Akun </h2>
							<div class="flex justify-center space-x-2">
								<button type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Simpan </button>
							</div>
						</div>
						<div class="p-4 sm:p-5">
							<div class="flex flex-col">
								<span class="text-base font-medium text-slate-600">Avatar</span>
									<div class="avatar mt-1.5 h-20 w-20">
										<img class="mask is-squircle" src="/uploads/images/{{ auth()->user()->profil_pict }}" alt="avatar" />
										<div class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white">
											<input type="file" name="profil_pict" class="btn h-6 w-6 rounded-full border border-slate-200 p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25">
											
										</div>
										<div class="absolute bottom-0 right-0 flex items-center justify-center rounded-full bg-white">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
												<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
											</svg>
										</div>
									</div>
								
							</div>
							<div class="my-7 h-px bg-slate-200"></div>
							<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
								<label class="block">
									<span>Nama lengkap </span>
									<span class="relative mt-1.5 flex">
										<input name="name" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="{{ auth()->user()->name }}" type="text" />
										<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
											<i class="fa-regular fa-user text-base"></i>
										</span>
									</span>
								</label>
								<label class="block">
									<span>Alamat email </span>
									<span class="relative mt-1.5 flex">
										<input name="email" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="{{ auth()->user()->email }}" type="text" />
										<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
											<i class="fa-regular fa-envelope text-base"></i>
										</span>
									</span>
								</label>
								<label class="block">
									<span>Nomor Whatsapp</span>
									<span class="relative mt-1.5 flex">
										<input name="no_whatsapp" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="{{ auth()->user()->no_whatsapp }}" type="text" />
										<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
											<i class="fa fa-phone"></i>
										</span>
									</span>
								</label>
							</div>
						</div>
					</div>
					<input type="hidden" name="id" value="{{ auth()->user()->id }}"/>
					</form>
				</div>
				<div x-show="activeTab === 'tabKeamanan'" x-transition:enter="transition-all duration-500 easy-in-out" x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]" x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]" class="card">
					<form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data"> 
						@csrf
					<div class="flex flex-col items-center space-y-4 border-b border-slate-200 p-4 sm:flex-row sm:justify-between sm:space-y-0 sm:px-5">
						<h2 class="text-lg font-medium tracking-wide text-slate-700"> Pengaturan Keamanan </h2>
						<div class="flex justify-center space-x-2">
							<button type="submit" class="btn min-w-[7rem] rounded-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90"> Simpan </button>
						</div>
					</div>
					<div class="p-4 sm:p-5">
						 
						<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
							<label class="block">
								<span>Password lama </span>
								<span class="relative mt-1.5 flex">
									<input name="old_password" class="form-control @error('old_password') is-invalid @enderror form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="Masukkan Password Lama" type="password" />
									<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
										<i class="fa-regular fa-user text-base"></i>
									</span>
									@error('old_password')
                                    	<span class="text-danger">{{ $message }}</span>
                                	@enderror
								</span>
							</label>
							<label class="block">
								<span>Password baru </span>
								<span class="relative mt-1.5 flex">
									<input name="new_password" class="form-control @error('new_password') is-invalid @enderror form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="Masukkan Password Baru" type="password" />
									<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
										<i class="fa-regular fa-envelope text-base"></i>
									</span>
									@error('new_password')
                                    	<span class="text-danger">{{ $message }}</span>
                                	@enderror
								</span>
							</label>
							<label class="block">
								<span>Konfirmasi password baru </span>
								<span class="relative mt-1.5 flex">
									<input name="new_password_confirmation" class="form-input peer w-full rounded-full border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary" placeholder="Konfirmasi Password Baru" type="password" />
									<span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
										<i class="fa fa-phone"></i>
									</span>
								</span>
							</label>
							
						</div>
						<input type="hidden" name="id" value="{{ auth()->user()->id }}"/>
						<input type="hidden" name="email" value="{{ auth()->user()->email }}"/>
					
					</div>
				</form>
				</div>
			</div>
		</div>
	</main>
</x-app-layout>