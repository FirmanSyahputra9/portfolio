<form wire:submit.prevent="saveHeroButton" method="POST"
    class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">

    <x-form.save label="Hero - Button" toggle name="Save Button" :show="$show" />
    @if ($show)
        <div class="space-y-3">
            @forelse ($heroButtons as $index => $button)
                <div class="grid md:grid-cols-5 gap-5 mt-5">
                    <div class="space-y-3">
                        <x-form.input label="Label ID Tombol {{ $index + 1 }}"
                            model="heroButtons.{{ $index }}.label_id"
                            placeholder="Tombol {{ $index + 1 }} (ID)" />
                    </div>


                    <div class="space-y-3">
                        <x-form.input label="Label EN Tombol {{ $index + 1 }}"
                            model="heroButtons.{{ $index }}.label_en"
                            placeholder="Tombol {{ $index + 1 }} (EN)" />
                    </div>

                    <div class="space-y-3">
                        <x-form.input label="Target URL Tombol {{ $index + 1 }}"
                            model="heroButtons.{{ $index }}.url"
                            placeholder="Target Tombol {{ $index + 1 }}" />
                    </div>

                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-primaryText">
                            Aksi Tombol {{ $index + 1 }}
                        </label>

                        <select wire:model="heroButtons.{{ $index }}.action"
                            class="w-full rounded-xl border border-border bg-surface px-4 py-2.5 text-sm text-primaryText focus:border-accent focus:outline-none focus:ring-1 focus:ring-accent">
                            <option value="link">Pengalihan / Link</option>
                            <option value="download">Download</option>
                        </select>

                        @error("heroButtons.{$index}.action")
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="space-y-3 flex items-end">
                        <x-form.button action="delete" :btnFunc="'removeHeroButton(' . $index . ')'" label="Hapus Tombol" />
                    </div>
                </div>
            @empty
                <span>Belum ada tombol</span>
            @endforelse

            <div class="grid md:grid-cols-5 gap-5 mt-5">
                <div class="space-y-3">
                    <x-form.input label="Tambah Tombol (ID)" model="btnAddId" type="text" name="hero_btnAdd_id"
                        placeholder="Tombol Add (ID)" />
                    @error('btnAddId')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-3">
                    <x-form.input label="Tambah Tombol (EN)" model="btnAddEn" type="text" name="hero_btnAdd_en"
                        placeholder="Tombol Add (EN)" />
                    @error('btnAddEn')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-3">
                    <x-form.input label="Tambah Target Tombol" model="btnAddTarget" type="text"
                        name="hero_btnAdd_target" placeholder="Target Tombol" />
                    @error('btnAddTarget')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-3">
                    <label class="block text-sm font-medium text-primaryText">
                        Aksi Tombol Baru
                    </label>

                    <select wire:model="btnAddAction"
                        class="w-full rounded-xl border border-border bg-surface px-4 py-2.5 text-sm text-primaryText">
                        <option value="link">Pengalihan / Link</option>
                        <option value="download">Download</option>
                    </select>

                    @error('btnAddAction')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="space-y-3 flex items-end">
                    <x-form.button action="store" :btnFunc="'addHeroButton'" label="Tambah Tombol" />
                </div>

            </div>

        </div>
    @endif
</form>
