<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Skill
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('admin.skills.store') }}" class="p-6">
                    @csrf

                    @include('admin.skills._form')

                    <div class="mt-8 flex items-center justify-end gap-3">
                        <a href="{{ route('admin.skills.index') }}"
                           class="rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Batal
                        </a>
                        <x-primary-button>Simpan Skill</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
