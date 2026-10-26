@props(['skill' => null])

<div class="space-y-6">
    <div>
        <x-input-label for="name" value="Nama Skill *" />
        <x-text-input id="name"
                      name="name"
                      type="text"
                      class="mt-1 block w-full"
                      :value="old('name', $skill?->name)"
                      required
                      maxlength="100" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="category" value="Kategori *" />
        <x-text-input id="category"
                      name="category"
                      type="text"
                      class="mt-1 block w-full"
                      :value="old('category', $skill?->category)"
                      placeholder="Backend, Frontend, Database, Tools..."
                      required
                      maxlength="100" />
        <x-input-error class="mt-2" :messages="$errors->get('category')" />
    </div>

    <div>
        <x-input-label for="level" value="Level (0–100, opsional)" />
        <x-text-input id="level"
                      name="level"
                      type="number"
                      min="0"
                      max="100"
                      class="mt-1 block w-full"
                      :value="old('level', $skill?->level)" />
        <x-input-error class="mt-2" :messages="$errors->get('level')" />
    </div>
</div>
