<div class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <x-form.save label="Skills (Technology & Category)" name="Manage Skills" toggle :show="$show" />

    @if ($show)
        <div class="space-y-6 ml-10">

            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-md font-semibold text-primary-text">Technologies</h3>
                    <button type="button" wire:click="toggleTechnologyForm"
                        class="text-sm text-accent hover:text-accent/80 transition">
                        {{ $showTechnologyForm ? 'Cancel' : '+ Add Technology' }}
                    </button>
                </div>


                @if ($showTechnologyForm)
                    <div class="bg-surface/50 border border-border rounded-xl p-4 mb-4">
                        @if ($editTechnologyId)
                            <div class="flex gap-3 items-end">
                                <div class="flex-1">
                                    <x-form.input model="editTechnologyName" label="Technology Name" type="text"
                                        name="edit_technology_name" :rules="$rules" placeholder="Technology name" />
                                </div>
                                <div class="flex-1">
                                    <x-form.input model="editTechnologyIcon" label="Icon (Font Awesome)" type="text"
                                        name="edit_technology_icon" :rules="$rules"
                                        placeholder="fa-brands fa-laravel" />
                                </div>
                                <div class="flex gap-2">
                                    <button type="button" wire:click="updateTechnology"
                                        class="px-4 py-2 bg-accent text-white rounded-lg hover:bg-accent/80 transition">
                                        Update
                                    </button>
                                    <button type="button" wire:click="cancelEditTechnology"
                                        class="px-4 py-2 border border-border rounded-lg hover:bg-surface transition">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="flex gap-3 items-end">
                                <div class="flex-1">
                                    <x-form.input model="newTechnologyName" label="Technology Name" type="text"
                                        name="new_technology_name" :rules="$rules" placeholder="e.g., Laravel" />
                                </div>
                                <div class="flex-1">
                                    <x-form.input model="newTechnologyIcon" label="Icon (Font Awesome)" type="text"
                                        name="new_technology_icon" :rules="$rules"
                                        placeholder="fa-brands fa-laravel" />
                                </div>
                                <button type="button" wire:click="addTechnology"
                                    class="px-4 py-2 bg-accent text-white rounded-lg hover:bg-accent/80 transition">
                                    Add
                                </button>
                            </div>
                        @endif
                    </div>
                @endif


                <div class="flex flex-wrap gap-2">
                    @forelse ($technologies as $tech)
                        <div
                            class="inline-flex items-center gap-2 rounded-full border border-border bg-surface px-3 py-1.5 text-sm">
                            @if ($tech['icon'])
                                <i class="{{ strtolower($tech['icon']) }} mr-2"></i>
                            @endif
                            <span>{{ $tech['name'] }}</span>
                            <span class="text-xs text-secondary-text">({{ $tech['slug'] }})</span>
                            <div class="flex gap-1 ml-1">
                                <button type="button" wire:click="editTechnology({{ $tech['id'] }})"
                                    class="text-secondary-text hover:text-accent transition px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button type="button" wire:click="deleteTechnology({{ $tech['id'] }})"
                                    wire:confirm="Are you sure you want to delete this technology?"
                                    class="text-secondary-text hover:text-red-500 transition px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-secondary-text text-sm">Belum ada technology</div>
                    @endforelse
                </div>
            </div>


            <div class="mt-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-md font-semibold text-primary-text">Categories</h3>
                    <button type="button" wire:click="toggleCategoryForm"
                        class="text-sm text-accent hover:text-accent/80 transition">
                        {{ $showCategoryForm ? 'Cancel' : '+ Add Category' }}
                    </button>
                </div>


                @if ($showCategoryForm)
                    <div class="bg-surface/50 border border-border rounded-xl p-4 mb-4">
                        @if ($editCategoryId)
                            <div class="flex gap-3 items-end">
                                <div class="flex-1">
                                    <x-form.input model="editCategoryName" label="Category Name" type="text"
                                        name="edit_category_name" :rules="$rules" placeholder="Category name" />
                                </div>
                                <div class="flex gap-2">
                                    <button type="button" wire:click="updateCategory"
                                        class="px-4 py-2 bg-accent text-white rounded-lg hover:bg-accent/80 transition">
                                        Update
                                    </button>
                                    <button type="button" wire:click="cancelEditCategory"
                                        class="px-4 py-2 border border-border rounded-lg hover:bg-surface transition">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="flex gap-3 items-end">
                                <div class="flex-1">
                                    <x-form.input model="newCategoryName" label="Category Name" type="text"
                                        name="new_category_name" :rules="$rules" placeholder="e.g., Backend" />
                                </div>
                                <button type="button" wire:click="addCategory"
                                    class="px-4 py-2 bg-accent text-white rounded-lg hover:bg-accent/80 transition">
                                    Add
                                </button>
                            </div>
                        @endif
                    </div>
                @endif


                <div class="flex flex-wrap gap-2">
                    @forelse ($categories as $cat)
                        <div
                            class="inline-flex items-center gap-2 rounded-full border border-border bg-surface px-3 py-1.5 text-sm">
                            <span>{{ $cat['name'] }}</span>
                            <span class="text-xs text-secondary-text">({{ $cat['slug'] }})</span>
                            <div class="flex gap-1 ml-1">
                                <button type="button" wire:click="editCategory({{ $cat['id'] }})"
                                    class="text-secondary-text hover:text-accent transition px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                <button type="button" wire:click="deleteCategory({{ $cat['id'] }})"
                                    wire:confirm="Are you sure you want to delete this category?"
                                    class="text-secondary-text hover:text-red-500 transition px-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-secondary-text text-sm">Belum ada category</div>
                    @endforelse
                </div>
            </div>


            <div class="mt-6 p-4 bg-blue-500/10 border border-blue-500/20 rounded-xl text-sm text-secondary-text">
                <p class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <span>Technology dan Category yang sudah digunakan di Project, Experience, Certificate, atau
                        Education <strong>tidak bisa dihapus</strong> untuk menjaga integritas data.</span>
                </p>
            </div>
        </div>
    @endif
</div>
