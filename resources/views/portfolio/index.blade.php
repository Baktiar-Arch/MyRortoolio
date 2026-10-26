@extends('layouts.app')

@section('title', config('portfolio.owner') . ' — ' . config('portfolio.role'))

@section('content')
    {{-- Hero --}}
    <section id="home" class="relative overflow-hidden pt-16">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(99,102,241,0.12),transparent_55%)] dark:bg-[radial-gradient(ellipse_at_top_right,rgba(99,102,241,0.18),transparent_55%)]"></div>

        <div class="relative mx-auto flex min-h-[calc(100vh-4rem)] max-w-7xl flex-col justify-center px-4 py-20 sm:px-6 lg:px-8">
            <div class="reveal max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50 px-4 py-1.5 text-sm font-medium text-emerald-700 dark:border-emerald-500/20 dark:bg-emerald-500/10 dark:text-emerald-300">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                    </span>
                    Tersedia untuk proyek freelance
                </p>

                <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl dark:text-white">
                    Halo, saya
                    <span class="bg-gradient-to-r from-indigo-600 via-violet-500 to-sky-500 bg-clip-text text-transparent">
                        {{ config('portfolio.owner') }}
                    </span>
                </h1>

                <p class="mt-4 text-xl font-semibold text-indigo-600 dark:text-indigo-400">
                    {{ config('portfolio.role') }}
                </p>

                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-gray-600 dark:text-gray-400">
                    {{ config('portfolio.tagline') }}
                </p>

                <div class="mt-10 flex flex-wrap items-center gap-4">
                    <a href="#projects"
                       class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/25 transition hover:bg-indigo-500 hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950">
                        Lihat Proyek
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="#contact"
                       class="inline-flex items-center gap-2 rounded-xl border border-gray-300 px-6 py-3 text-sm font-semibold text-gray-700 transition hover:border-indigo-400 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-gray-700 dark:text-gray-200 dark:hover:border-indigo-500 dark:hover:text-indigo-400 dark:focus:ring-offset-gray-950">
                        Hubungi Saya
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="border-t border-gray-100 py-20 dark:border-gray-800 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal mx-auto max-w-3xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Tentang Saya
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-gradient-to-r from-indigo-600 to-sky-500"></div>
            </div>

            <div class="reveal mx-auto mt-12 grid max-w-4xl gap-8 md:grid-cols-[auto,1fr] md:items-center">
                <div class="mx-auto flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-violet-600 text-5xl font-extrabold text-white shadow-xl shadow-indigo-500/30 md:h-48 md:w-48 md:text-6xl">
                    {{ strtoupper(substr(config('portfolio.owner'), 0, 1)) }}
                </div>

                <div class="text-center md:text-start">
                    <p class="text-lg leading-relaxed text-gray-600 dark:text-gray-400">
                        {{ config('portfolio.about') }}
                    </p>

                    <dl class="mt-8 grid grid-cols-3 gap-4 text-center">
                        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-800 dark:bg-gray-900">
                            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Proyek</dt>
                            <dd class="mt-1 text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{ $projects->count() }}</dd>
                        </div>
                        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-800 dark:bg-gray-900">
                            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Skill</dt>
                            <dd class="mt-1 text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{ \App\Models\Skill::count() }}</dd>
                        </div>
                        <div class="rounded-xl border border-gray-100 bg-gray-50 p-4 dark:border-gray-800 dark:bg-gray-900">
                            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500 dark:text-gray-400">Tahun</dt>
                            <dd class="mt-1 text-2xl font-bold text-indigo-600 dark:text-indigo-400">3+</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    {{-- Skills --}}
    <section id="skills" class="border-t border-gray-100 bg-gray-50 py-20 dark:border-gray-800 dark:bg-gray-900/50 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal mx-auto max-w-3xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Keahlian Saya
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-gradient-to-r from-indigo-600 to-sky-500"></div>
                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Teknologi yang saya gunakan sehari-hari.
                </p>
            </div>

            <div class="reveal mt-14 space-y-10">
                @forelse ($skillsGrouped as $category => $skills)
                    <div>
                        <h3 class="text-sm font-bold uppercase tracking-widest text-indigo-600 dark:text-indigo-400">
                            {{ $category }}
                        </h3>
                        <div class="mt-4 flex flex-wrap gap-3">
                            @foreach ($skills as $skill)
                                <x-skill-badge :name="$skill->name" :level="$skill->level" />
                            @endforeach
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 dark:text-gray-400">Belum ada skill yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section id="projects" class="border-t border-gray-100 py-20 dark:border-gray-800 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal mx-auto max-w-3xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Proyek Pilihan
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-gradient-to-r from-indigo-600 to-sky-500"></div>
                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Beberapa hasil karya yang pernah saya bangun.
                </p>
            </div>

            <div class="reveal mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($projects as $project)
                    <x-project-card :project="$project" />
                @empty
                    <p class="col-span-full text-center text-gray-500 dark:text-gray-400">
                        Belum ada proyek. Tambahkan melalui <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:underline">admin panel</a>.
                    </p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="border-t border-gray-100 bg-gray-50 py-20 dark:border-gray-800 dark:bg-gray-900/50 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="reveal mx-auto max-w-3xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Hubungi Saya
                </h2>
                <div class="mx-auto mt-3 h-1 w-16 rounded-full bg-gradient-to-r from-indigo-600 to-sky-500"></div>
                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Punya ide proyek atau ingin berkolaborasi? Kirim pesan.
                </p>
            </div>

            <div class="reveal mx-auto mt-14 max-w-2xl">
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
                                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500 dark:focus:border-indigo-400 dark:focus:ring-indigo-400">
                            @error('name')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
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
                                   class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500 dark:focus:border-indigo-400 dark:focus:ring-indigo-400">
                            @error('email')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="message" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Pesan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message"
                                  id="message"
                                  rows="6"
                                  required
                                  maxlength="5000"
                                  placeholder="Tulis pesan Anda di sini..."
                                  class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white dark:placeholder-gray-500 dark:focus:border-indigo-400 dark:focus:ring-indigo-400">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/25 transition hover:bg-indigo-500 hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                            </svg>
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
