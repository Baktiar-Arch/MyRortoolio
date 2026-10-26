<x-app-layout>
    {{-- Hero --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -top-40 right-0 h-80 w-80 rounded-full bg-indigo-500/10 blur-3xl dark:bg-indigo-500/20"></div>
            <div class="absolute bottom-0 left-10 h-72 w-72 rounded-full bg-sky-500/10 blur-3xl dark:bg-sky-500/20"></div>
        </div>
        <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
            <div class="reveal grid items-center gap-12 lg:grid-cols-2">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400">
                        Portfolio
                    </p>
                    <h1 class="mt-6 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl dark:text-white">
                        {{ config('app.name') }}
                    </h1>
                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-gray-600 dark:text-gray-400">
                        Backend-focused Laravel developer. I build practical systems — from POS and e-commerce to data-driven tools — with focus on clean architecture and real business needs.
                    </p>
                    <div class="mt-10 flex flex-wrap items-center gap-4">
                        <a href="#projects"
                           class="inline-flex items-center gap-2 rounded-full bg-gray-900 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-gray-800 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100">
                            Lihat Proyek
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                            </svg>
                        </a>
                        <a href="#contact"
                           class="inline-flex items-center gap-2 rounded-full border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-900 transition hover:-translate-y-0.5 hover:border-gray-400 dark:border-gray-700 dark:text-white dark:hover:border-gray-500">
                            Hubungi
                        </a>
                    </div>
                    <dl class="mt-12 grid gap-6 sm:grid-cols-3">
                        <div>
                            <dt class="text-sm text-gray-500 dark:text-gray-400">Fokus</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-white">Backend Architecture</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-gray-500 dark:text-gray-400">Stack Utama</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-white">Laravel • MySQL</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-gray-500 dark:text-gray-400">Bidang</dt>
                            <dd class="mt-1 text-base font-semibold text-gray-900 dark:text-white">RESTful API • DB Design</dd>
                        </div>
                    </dl>
                </div>
                <div class="relative">
                    <div class="relative mx-auto max-w-md overflow-hidden rounded-3xl border border-gray-200 shadow-[0_60px_120px_-80px_rgba(79,70,229,0.9)] dark:border-gray-800">
                        <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-white via-white/80 to-transparent dark:from-gray-950 dark:via-gray-950/80"></div>
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=1200&q=80"
                             alt="Developer workspace"
                             class="h-[420px] w-full object-cover">
                        <div class="absolute inset-x-0 bottom-0 space-y-3 bg-gradient-to-t from-white via-white/90 to-transparent p-6 dark:from-gray-950 dark:via-gray-950/90">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Current focus</p>
                            <p class="text-lg font-semibold text-gray-900 dark:text-white">Pragmatic solutions for real business flows</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Skills --}}
    <section class="border-t border-gray-100 py-20 dark:border-gray-800 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400">Stack</p>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                        Teknis yang dipakai
                    </h2>
                    <p class="mt-3 max-w-2xl text-gray-600 dark:text-gray-400">
                        Berdasarkan proyek nyata, bukan daftar panjang tanpa konteks.
                    </p>
                </div>
            </div>

            <div class="reveal mt-12 space-y-10">
                @forelse ($skillsGrouped as $category => $skills)
                    <div class="grid gap-4 border-t border-gray-100 pt-8 first:border-t-0 first:pt-0 dark:border-gray-800 sm:grid-cols-[220px_1fr] sm:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-[0.3em] text-gray-500 dark:text-gray-400">
                                {{ $category }}
                            </h3>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($skills as $skill)
                                <x-skill-badge :name="$skill->name" />
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">Belum ada skill yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section id="projects" class="border-t border-gray-100 py-20 dark:border-gray-800 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400">Proyek</p>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                        Proyek Pilihan
                    </h2>
                    <p class="mt-3 max-w-2xl text-gray-600 dark:text-gray-400">
                        Sistem yang benar-benar dibangun untuk kasus nyata.
                    </p>
                </div>
            </div>

            <div class="reveal mt-12 grid gap-8 lg:grid-cols-2">
                @forelse ($projects as $project)
                    <x-project-card :project="$project" />
                @empty
                    <p class="col-span-full text-gray-500 dark:text-gray-400">
                        Belum ada proyek. Tambahkan melalui <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:underline">admin panel</a>.
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="border-t border-gray-100 py-20 dark:border-gray-800 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal grid gap-10 lg:grid-cols-2">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400">Kontak</p>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                        Diskusikan proyek
                    </h2>
                    <p class="mt-4 max-w-xl text-gray-600 dark:text-gray-400">
                        Ada kebutuhan sistem, perbaikan alur bisnis, atau ingin kolaborasi? Kirim pesan singkat.
                    </p>
                    <div class="mt-8 space-y-4 text-sm text-gray-600 dark:text-gray-400">
                        <p>Email: {{ config('portfolio.email') }}</p>
                    </div>
                </div>
                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-900 sm:p-8">
                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nama <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') }}"
                                       required
                                       maxlength="100"
                                       autocomplete="name"
                                       class="block w-full rounded-lg border border-gray-300 px-3.5 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/10 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:focus:border-indigo-400">
                                @error('name')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email"
                                       name="email"
                                       id="email"
                                       value="{{ old('email') }}"
                                       required
                                       maxlength="150"
                                       autocomplete="email"
                                       class="block w-full rounded-lg border border-gray-300 px-3.5 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/10 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:focus:border-indigo-400">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Subjek <span class="text-red-500">*</span>
                            </label>
                            <input type="text"
                                   name="subject"
                                   id="subject"
                                   value="{{ old('subject') }}"
                                   required
                                   maxlength="150"
                                   class="block w-full rounded-lg border border-gray-300 px-3.5 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/10 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:focus:border-indigo-400">
                            @error('subject')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Pesan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="message"
                                      id="message"
                                      rows="5"
                                      required
                                      class="block w-full rounded-lg border border-gray-300 px-3.5 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/10 dark:border-gray-700 dark:bg-gray-950 dark:text-white dark:focus:border-indigo-400">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-full bg-gray-900 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-gray-800 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
