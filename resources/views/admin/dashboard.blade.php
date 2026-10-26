<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid gap-6 sm:grid-cols-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500">Total Proyek</div>
                        <div class="mt-1 text-3xl font-bold text-indigo-600">{{ $projectCount }}</div>
                        <a href="{{ route('admin.projects.index') }}" class="mt-3 inline-block text-sm font-medium text-indigo-600 hover:underline">
                            Kelola proyek &rarr;
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500">Total Skill</div>
                        <div class="mt-1 text-3xl font-bold text-indigo-600">{{ $skillCount }}</div>
                        <a href="{{ route('admin.skills.index') }}" class="mt-3 inline-block text-sm font-medium text-indigo-600 hover:underline">
                            Kelola skill &rarr;
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="text-sm font-medium text-gray-500">Pesan Masuk</div>
                        <div class="mt-1 text-3xl font-bold text-indigo-600">{{ $messageCount }}</div>
                        <a href="{{ route('admin.messages.index') }}" class="mt-3 inline-block text-sm font-medium text-indigo-600 hover:underline">
                            Lihat pesan &rarr;
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800">Pesan Terbaru</h3>

                    @if ($recentMessages->isEmpty())
                        <p class="mt-3 text-sm text-gray-500">Belum ada pesan masuk.</p>
                    @else
                        <ul class="mt-4 divide-y divide-gray-100">
                            @foreach ($recentMessages as $message)
                                <li class="py-3 flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">
                                            {{ $message->name }}
                                            <span class="font-normal text-gray-500">&lt;{{ $message->email }}&gt;</span>
                                        </p>
                                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{ $message->message }}</p>
                                    </div>
                                    <span class="shrink-0 text-xs text-gray-400">{{ $message->created_at->diffForHumans() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
