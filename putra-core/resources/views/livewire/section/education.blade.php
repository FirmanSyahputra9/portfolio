<form wire:submit.prevent="saveEducation" method="POST"
    class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <x-form.save label="Education" name="Save Education" toggle :show="$show" />
    @if ($show)
        <div class="space-y-3 ml-10">
            @forelse ($educations as $index => $education)
                <div wire:key="education-{{ $education['id'] }}">
                    <div class="flex gap-4 items-center">
                        <div>
                            <x-form.svg-toggle :show="$show2[$index] ?? false" :toggleFunc="'toggle2(' . $index . ')'" />
                        </div>
                        <div class="flex gap-4 flex-1 w-full">

                            <div class="space-y-2 flex-1 w-full">
                                <x-form.input disabled labelClass="sr-only" label="Institusi (ID) {{ $index + 1 }}"
                                    model="educations.{{ $index }}.institution_id" placeholder="Institution (ID)"
                                    :rules="$rules" name="educations[{{ $index }}][institution_id]" />
                            </div>

                            <div class="space-y-2 flex-1 w-full">
                                <x-form.input disabled labelClass="sr-only" label="Institution (EN) {{ $index + 1 }}"
                                    model="educations.{{ $index }}.institution_en" placeholder="Institution (EN)"
                                    :rules="$rules" name="educations[{{ $index }}][institution_en]" />
                            </div>

                            <div class="space-y-2 flex-1 w-full">
                                <x-form.input disabled labelClass="sr-only" label="Gelar {{ $index + 1 }}"
                                    model="educations.{{ $index }}.degree" placeholder="Degree" :rules="$rules"
                                    name="educations[{{ $index }}][degree]" />
                            </div>
                            <div class="space-y-3 flex items-end">
                                <x-form.button action="delete" :btnFunc="'removeEducationButton(' . $index . ')'" label="Hapus" />
                            </div>
                        </div>
                    </div>
                </div>

                @if ($show2[$index] ?? false)
                    <div class="repeater-item bg-surface/50 border border-border rounded-xl p-4 pl-5 transition-all">
                        <div class="relative flex flex-col items-center mb-4">
                            <x-form.input-photo model="tempPhotos.{{ $index }}" accept="image/*"
                                :photo="$education['image'] ?? null" label="Photo" rounded="rounded-md" :tempPhoto="$tempPhotos[$index] ?? null"
                                confirmAction="confirmUpdatePhoto({{ $index }})" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">

                            <div class="space-y-2">
                                <x-form.input label="Institusi (ID) {{ $index + 1 }}"
                                    model="educations.{{ $index }}.institution_id"
                                    placeholder="Institution (ID)" :rules="$rules"
                                    name="educations[{{ $index }}][institution_id]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Institution (EN) {{ $index + 1 }}"
                                    model="educations.{{ $index }}.institution_en"
                                    placeholder="Institution (EN)" :rules="$rules"
                                    name="educations[{{ $index }}][institution_en]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Gelar {{ $index + 1 }}"
                                    model="educations.{{ $index }}.degree" placeholder="Degree"
                                    :rules="$rules" name="educations[{{ $index }}][degree]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Bidang Studi (ID) {{ $index + 1 }}"
                                    model="educations.{{ $index }}.field_of_study_id"
                                    placeholder="Field of Study (ID)" :rules="$rules"
                                    name="educations[{{ $index }}][field_of_study_id]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Field of Study (EN) {{ $index + 1 }}"
                                    model="educations.{{ $index }}.field_of_study_en"
                                    placeholder="Field of Study (EN)" :rules="$rules"
                                    name="educations[{{ $index }}][field_of_study_en]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Nilai Akhir {{ $index + 1 }}"
                                    model="educations.{{ $index }}.final_grade" placeholder="Final Grade"
                                    :rules="$rules" name="educations[{{ $index }}][final_grade]" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Lokasi {{ $index + 1 }}"
                                    model="educations.{{ $index }}.location" placeholder="Location"
                                    :rules="$rules" name="educations[{{ $index }}][location]" />
                            </div>


                            <div class="md:col-span-2 space-y-2">
                                <x-form.textarea model="educations.{{ $index }}.description_id"
                                    label="Deskripsi (ID)" name="educations[{{ $index }}][description_id]"
                                    :rules="$rules" placeholder="Deskripsikan pendidikan Anda..." />
                            </div>


                            <div class="md:col-span-2 space-y-2">
                                <x-form.textarea model="educations.{{ $index }}.description_en"
                                    label="Description (EN)" name="educations[{{ $index }}][description_en]"
                                    :rules="$rules" placeholder="Describe your education..." />
                            </div>


                            <div class="space-y-2">
                                <x-form.date label="Tanggal Mulai {{ $index + 1 }}"
                                    model="educations.{{ $index }}.start_date" :rules="$rules"
                                    name="educations[{{ $index }}][start_date]" :max="now()->format('Y-m-d')" />
                            </div>


                            <div class="space-y-2">
                                <x-form.date label="Tanggal Selesai {{ $index + 1 }}"
                                    model="educations.{{ $index }}.end_date" :rules="$rules"
                                    name="educations[{{ $index }}][end_date]" :max="now()->format('Y-m-d')"
                                    :min="$educations[$index]['start_date'] ?? '2010-01-01'" />
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
                                @foreach ($education['education_details'] ?? [] as $detailIndex => $detail)
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
                    Belum ada pendidikan. Tambahkan pendidikan baru di bawah.
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
                        <x-form.input labelClass="sr-only" label="Institution ID" model="addEducationInstitutionId"
                            placeholder="Institusi (ID)" :rules="$rules" name="addEducationInstitutionId" />
                    </div>
                    <div class="space-y-2 flex-1 min-w-[150px]">
                        <x-form.input labelClass="sr-only" label="Institution EN" model="addEducationInstitutionEn"
                            placeholder="Institution (EN)" :rules="$rules" name="addEducationInstitutionEn" />
                    </div>
                    <div class="space-y-2 flex-1 min-w-[150px]">
                        <x-form.input labelClass="sr-only" label="Degree" model="addEducationDegree"
                            placeholder="Gelar" :rules="$rules" name="addEducationDegree" />
                    </div>

                    <div class="space-y-3 flex items-end">
                        <x-form.button action="store" :btnFunc="'addEducationButton'" label="Tambah" />
                    </div>
                </div>
            </div>
        </div>
    @endif
</form>
