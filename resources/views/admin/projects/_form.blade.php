@props(['project' => null])

<div class="space-y-6">
    <div>
        <x-input-label for="title" value="Judul *" />
        <x-text-input id="title"
                      name="title"
                      type="text"
                      class="mt-1 block w-full"
                      :value="old('title', $project?->title)"
                      required
                      maxlength="150" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    <div>
        <x-input-label for="description" value="Deskripsi *" />
        <textarea id="description"
                  name="description"
                  rows="6"
                  required
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $project?->description) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    <div>
        <x-input-label for="tech_stack" value="Tech Stack * (pisahkan dengan koma)" />
        <x-text-input id="tech_stack"
                      name="tech_stack"
                      type="text"
                      class="mt-1 block w-full"
                      :value="old('tech_stack', $project?->tech_stack)"
                      placeholder="Laravel, Tailwind CSS, MySQL"
                      required
                      maxlength="255" />
        <x-input-error class="mt-2" :messages="$errors->get('tech_stack')" />
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <x-input-label for="demo_url" value="URL Demo (opsional)" />
            <x-text-input id="demo_url"
                          name="demo_url"
                          type="url"
                          class="mt-1 block w-full"
                          :value="old('demo_url', $project?->demo_url)"
                          placeholder="https://demo.example.com" />
            <x-input-error class="mt-2" :messages="$errors->get('demo_url')" />
        </div>

        <div>
            <x-input-label for="repo_url" value="URL Repository (opsional)" />
            <x-text-input id="repo_url"
                          name="repo_url"
                          type="url"
                          class="mt-1 block w-full"
                          :value="old('repo_url', $project?->repo_url)"
                          placeholder="https://github.com/username/repo" />
            <x-input-error class="mt-2" :messages="$errors->get('repo_url')" />
        </div>
    </div>

    <div>
        <x-input-label for="thumbnail" value="Thumbnail URL (opsional)" />
        <x-text-input id="thumbnail"
                      name="thumbnail"
                      type="text"
                      class="mt-1 block w-full"
                      :value="old('thumbnail', $project?->thumbnail)"
                      placeholder="https://example.com/image.jpg" />
        <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
    </div>
</div>
