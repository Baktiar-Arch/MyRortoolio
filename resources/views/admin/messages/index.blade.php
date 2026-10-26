<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pesan Masuk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($messages->isEmpty())
                    <div class="p-8 text-center text-sm text-gray-500">
                        Belum ada pesan masuk.
                    </div>
                @else
                    <ul class="divide-y divide-gray-200">
                        @foreach ($messages as $message)
                            <li class="p-6 flex items-start justify-between gap-4">
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-gray-900">
                                        {{ $message->name }}
                                        <span class="ml-2 font-normal text-gray-500">&lt;{{ $message->email }}&gt;</span>
                                    </p>
                                    <p class="mt-2 text-sm text-gray-700 whitespace-pre-line">{{ $message->message }}</p>
                                    <p class="mt-2 text-xs text-gray-400">
                                        {{ $message->created_at->format('d M Y H:i') }}
                                    </p>
                                </div>

                                <form method="POST"
                                      action="{{ route('admin.messages.destroy', $message) }}"
                                      onsubmit="return confirm('Hapus pesan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="shrink-0 rounded-md text-sm font-medium text-red-600 hover:text-red-900">
                                        Hapus
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="px-6 py-4">
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
