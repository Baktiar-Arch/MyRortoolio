<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Proyek: {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('admin.projects.update', $project) }}" class="p-6">
                    @csrf
                    @method('PUT')

                    @include('admin.projects._form', ['project' => $project])

                    <div class="mt-8 flex items-center justify-end gap-3">
                        <a href="{{ route('admin.projects.index') }}"
                           class="rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Batal
                        </a>
                        <x-primary-button>Perbarui Proyek</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
