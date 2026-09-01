<form wire:submit.prevent="saveProject" method="POST"
    class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <x-form.save label="Project" name="Save Project" toggle :show="$show" />
    @if ($show)
        <div class="space-y-3 ml-10">
            @forelse ($projects as $index => $project)
                <div wire:key="project-{{ $project['id'] }}">
                    <div class="flex gap-4 items-center">
                        <div>
                            <x-form.svg-toggle :show="$show2[$index] ?? false" :toggleFunc="'toggle2(' . $index . ')'" />
                        </div>
                        <div class="flex gap-4 flex-1 w-full">

                            <div class="space-y-2 flex-1 w-full">
                                <x-form.input disabled labelClass="sr-only" label="Judul (ID) {{ $index + 1 }}"
                                    model="projects.{{ $index }}.title_id" placeholder="Title (ID)"
                                    :rules="$rules" name="projects[{{ $index }}][title_id]" />
                            </div>

                            <div class="space-y-2 flex-1 w-full">
                                <x-form.input disabled labelClass="sr-only" label="Title (EN) {{ $index + 1 }}"
                                    model="projects.{{ $index }}.title_en" placeholder="Title (EN)"
                                    :rules="$rules" name="projects[{{ $index }}][title_en]" />
                            </div>

                            <div class="space-y-2 flex-1 w-full">
                                <x-form.input disabled labelClass="sr-only" label="Intro (ID) {{ $index + 1 }}"
                                    model="projects.{{ $index }}.introduction_id" placeholder="Introduction (ID)"
                                    :rules="$rules" name="projects[{{ $index }}][introduction_id]" />
                            </div>
                            <div class="space-y-3 flex items-end">
                                <x-form.button action="delete" :btnFunc="'removeProjectButton(' . $index . ')'" label="Hapus" />
                            </div>
                        </div>
                    </div>
                </div>

                @if ($show2[$index] ?? false)
                    <div class="repeater-item bg-surface/50 border border-border rounded-xl p-4 pl-5 transition-all">
                        <div class="relative flex flex-col items-center mb-4">
                            <x-form.input-photo model="tempPhotos.{{ $index }}" accept="image/*"
                                :photo="$project['image'] ?? null" label="Photo" rounded="rounded-md" :tempPhoto="$tempPhotos[$index] ?? null"
                                confirmAction="confirmUpdatePhoto({{ $index }})" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">

                            <div class="space-y-2">
                                <x-form.input label="Judul (ID) {{ $index + 1 }}"
                                    model="projects.{{ $index }}.title_id" placeholder="Title (ID)"
                                    :rules="$rules" name="projects[{{ $index }}][title_id]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Title (EN) {{ $index + 1 }}"
                                    model="projects.{{ $index }}.title_en" placeholder="Title (EN)"
                                    :rules="$rules" name="projects[{{ $index }}][title_en]" />
                            </div>

                            <div class="space-y-2">
                                <x-form.date label="Tanggal Mulai {{ $index + 1 }}"
                                    model="projects.{{ $index }}.start_date" :rules="$rules"
                                    name="projects[{{ $index }}][start_date]" :max="now()->format('Y-m-d')"
                                    :min="'2010-01-01'" />
                            </div>

                            <div class="space-y-2">
                                <x-form.date label="Tanggal Selesai {{ $index + 1 }}"
                                    model="projects.{{ $index }}.completed_at" :rules="$rules"
                                    name="projects[{{ $index }}][completed_at]" :max="now()->format('Y-m-d')"
                                    :min="$projects[$index]['start_date'] ?? '2010-01-01'" />
                            </div>


                            <div class="md:col-span-2 space-y-2">
                                <x-form.textarea model="projects.{{ $index }}.introduction_id"
                                    label="Pendahuluan (ID)" name="projects[{{ $index }}][introduction_id]"
                                    :rules="$rules"
                                    placeholder="Perkenalkan proyek Anda dalam bahasa Indonesia..." />
                            </div>


                            <div class="md:col-span-2 space-y-2">
                                <x-form.textarea model="projects.{{ $index }}.introduction_en"
                                    label="Introduction (EN)" name="projects[{{ $index }}][introduction_en]"
                                    :rules="$rules" placeholder="Introduce your project in English..." />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Demo URL {{ $index + 1 }}"
                                    model="projects.{{ $index }}.demo" placeholder="https://example.com/demo"
                                    :rules="$rules" name="projects[{{ $index }}][demo]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Source Code URL {{ $index + 1 }}"
                                    model="projects.{{ $index }}.source_code"
                                    placeholder="https://github.com/username/project" :rules="$rules"
                                    name="projects[{{ $index }}][source_code]" />
                            </div>
                        </div>


                        <div class="space-y-3 md:col-span-2 mt-4">
                            <div class="flex gap-3 items-end">
                                {{-- Technology --}}
                                <div class="flex-1 relative">
                                    <x-form.input label="Technology" modelType="live"
                                        model="technologyInputs.{{ $index }}" placeholder="Technology"
                                        :rules="$rules" name="technology" />

                                    @if (!empty($technologyInputs[$index]))
                                        <div
                                            class="absolute z-20 w-full mt-1 bg-card border border-border rounded-lg shadow-lg overflow-hidden">
                                            @foreach ($this->getTechnologies($index) as $technology)
                                                <button type="button"
                                                    wire:click="$set('technologyInputs.{{ $index }}', '{{ $technology->name }}')"
                                                    class="w-full text-left px-3 py-2 hover:bg-surface">
                                                    {{ $technology->name }}
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Category --}}
                                <div class="flex-1 relative">
                                    <x-form.input label="Category" modelType="live"
                                        model="categoryInputs.{{ $index }}" placeholder="Category"
                                        :rules="$rules" name="category" />

                                    @if (!empty($categoryInputs[$index]))
                                        <div
                                            class="absolute z-20 w-full mt-1 bg-card border border-border rounded-lg shadow-lg overflow-hidden">
                                            @foreach ($this->getCategories($index) as $category)
                                                <button type="button"
                                                    wire:click="$set('categoryInputs.{{ $index }}', '{{ $category->name }}')"
                                                    class="w-full text-left px-3 py-2 hover:bg-surface">
                                                    {{ $category->name }}
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Add --}}
                                <button type="button" wire:click="addTechnology({{ $index }})"
                                    class="h-10 px-4 rounded-lg border border-border hover:bg-surface transition">
                                    Add
                                </button>
                            </div>

                            {{-- Existing Data --}}
                            <div class="flex flex-wrap gap-2">
                                @foreach ($project['project_details'] ?? [] as $detailIndex => $detail)
                                    <div
                                        class="inline-flex items-center gap-2 rounded-full border border-border bg-surface px-3 py-1.5 text-sm">
                                        <span>{{ $detail['technology']['name'] }}</span>
                                        <span class="text-muted-foreground">·</span>
                                        <span class="text-muted-foreground">{{ $detail['category']['name'] }}</span>
                                        <button type="button"
                                            wire:click="removeTechnology({{ $index }}, {{ $detailIndex }})"
                                            class="hover:text-red-500">
                                            ×
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="text-center py-4 text-secondary-text">
                    Belum ada proyek. Tambahkan proyek baru di bawah.
                </div>
            @endforelse


            <div class="flex gap-4 items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="flex gap-4 flex-1 w-full flex-wrap">
                    <div class="space-y-2 flex-1 min-w-[150px]">
                        <x-form.input labelClass="sr-only" label="Title ID" model="addProjectTitleId"
                            placeholder="Judul (ID)" :rules="$rules" name="addProjectTitleId" />
                    </div>
                    <div class="space-y-2 flex-1 min-w-[150px]">
                        <x-form.input labelClass="sr-only" label="Title EN" model="addProjectTitleEn"
                            placeholder="Title (EN)" :rules="$rules" name="addProjectTitleEn" />
                    </div>
                    <div class="space-y-2 flex-1 min-w-[200px]">
                        <x-form.input labelClass="sr-only" label="Introduction ID" model="addProjectIntroductionId"
                            placeholder="Intro (ID)" :rules="$rules" name="addProjectIntroductionId" />
                    </div>
                    <div class="space-y-3 flex items-end">
                        <x-form.button action="store" :btnFunc="'addProjectButton'" label="Tambah" />
                    </div>
                </div>
            </div>
        </div>
    @endif
</form>
