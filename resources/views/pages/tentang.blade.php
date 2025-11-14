<x-app-layout title="Tentang" is-header-blur="true">
	<!-- Main Content Wrapper -->
	<main class="main-content w-full px-[var(--margin-x)] pb-8">
		<div class="flex items-center space-x-4 py-5 lg:py-6">
			<h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl"> Tentang Neuron </h2>
		</div>
		<div class="mt-10">
			<div class="space-y-20">
				<div class="grid grid-cols-1 place-items-center gap-10 lg:grid-cols-2">
					<div class="flex justify-center">
						<img class="w-full max-w-xs" src="{{asset('images/about-keuangan.png')}}" alt="image" />
					</div>
					<div class="w-full">
						<h4 class="text-lg font-medium text-slate-700 dark:text-navy-100"> Keuangan </h4>
						<div x-data="{ expandedItem: 'item-1' }" class="mt-3 flex w-full flex-col divide-y divide-indigo-400 overflow-hidden rounded-lg border border-primary dark:border-accent">
							<div x-data="accordionItem('item-1')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-primary px-4 py-4 text-base font-medium text-white dark:bg-accent sm:px-5">
									<p>Question 1</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-indigo-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-2')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-primary px-4 py-4 text-base font-medium text-white dark:bg-accent sm:px-5">
									<p>Question 2</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-indigo-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-3')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-primary px-4 py-4 text-base font-medium text-white dark:bg-accent sm:px-5">
									<p>Question 3</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-indigo-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-4')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-primary px-4 py-4 text-base font-medium text-white dark:bg-accent sm:px-5">
									<p>Question 4</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-indigo-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-primary text-primary dark:border-accent-light dark:text-accent-light"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="grid grid-cols-1 place-items-center gap-10 lg:grid-cols-2">
					<div class="flex justify-center lg:order-last">
						<img class="w-full max-w-xs" src="{{asset('images/about-persuratan.png')}}" alt="image" />
					</div>
					<div class="w-full">
						<h4 class="text-lg font-medium text-slate-700 dark:text-navy-100"> Persuratan </h4>
						<div x-data="{ expandedItem: 'item-1' }" class="mt-3 flex w-full flex-col divide-y divide-yellow-400 overflow-hidden rounded-lg border border-warning">
							<div x-data="accordionItem('item-1')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-warning px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 1</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-yellow-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-2')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-warning px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 2</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-yellow-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-3')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-warning px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 3</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-yellow-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-4')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-warning px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 4</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-yellow-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-warning text-warning"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="grid grid-cols-1 place-items-center gap-10 lg:grid-cols-2">
					<div class="flex justify-center">
						<img class="w-full max-w-xs" src="{{asset('images/about-publikasi.png')}}" alt="image" />
					</div>
					<div class="w-full">
						<h4 class="text-lg font-medium text-slate-700 dark:text-navy-100"> Publikasi </h4>
						<div x-data="{ expandedItem: 'item-1' }" class="mt-3 flex w-full flex-col divide-y divide-sky-400 overflow-hidden rounded-lg border border-info">
							<div x-data="accordionItem('item-1')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-info px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 1</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-sky-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-2')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-info px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 2</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-sky-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-3')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-info px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 3</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-sky-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
							<div x-data="accordionItem('item-4')">
								<div @click="expanded = !expanded" class="flex cursor-pointer items-center justify-between bg-info px-4 py-4 text-base font-medium text-white sm:px-5">
									<p>Question 4</p>
									<div :class="expanded && '-rotate-180'" class="text-sm font-normal leading-none text-sky-100 transition-transform duration-300">
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div x-collapse x-show="expanded">
									<div class="px-4 py-4 sm:px-5">
										<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi earum magni officiis possimus repellendus. Accusantium adipisci aliquid praesentium quaerat voluptate. </p>
										<div class="mt-2 flex space-x-2">
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 1 </a>
											<a href="#" class="tag rounded-full border border-info text-info"> Tag 2 </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</x-app-layout>