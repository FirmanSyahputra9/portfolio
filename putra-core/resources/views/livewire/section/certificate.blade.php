<form action="/api/experience" method="POST" class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <x-form.save label="Certificate" name="Save Certificate" toggle :show="$show" />
    @if ($show)
        <div class="space-y-3 ml-10">
            @forelse ($certificates as $index => $certificate)
                <div class="flex  gap-4 items-center">
                    <div>
                        <x-form.svg-toggle :show="$show2[$index] ?? false" :toggleFunc="'toggle2(' . $index . ')'" />
                    </div>
                    <div class="flex gap-4 flex-1 w-full">
                        <!-- Nama Sertifikat -->
                        <div class="space-y-2 flex-1 w-full">
                            <x-form.input disabled labelClass="sr-only" label="Nama Sertifikat (ID) {{ $index + 1 }}"
                                model="certificates.{{ $index }}.title_id" placeholder="Sertificate Name (ID)"
                                :rules="$rules" name="certificates[{{ $index }}][title_id]" />
                        </div>
                        <div class="space-y-2 flex-1 w-full">
                            <x-form.input disabled labelClass="sr-only" label="Issuer"
                                model="certificates.{{ $index }}.issuer.name" placeholder="Issuer"
                                :rules="$rules" :value="$certificate['issuer']['name']"
                                name="certificates[{{ $index }}][issuer][name]" />
                        </div>
                        <div class="space-y-2 flex-1 w-full">
                            <x-form.date disabled labelClass="sr-only" label="Tanggal Terbit {{ $index + 1 }}"
                                model="certificates.{{ $index }}.issued_date" :rules="$rules"
                                name="certificates[{{ $index }}][issued_date]" :max="now()->format('Y-m-d')"
                                :min="'2010-01-01'" />
                        </div>
                        <div class="space-y-3 flex items-end">
                            <x-form.button action="delete" :btnFunc="'removeCertificateButton(' . $index . ')'" label="Hapus" />
                        </div>
                    </div>
                </div>


                @if ($show2[$index] ?? false)
                    <div class="repeater-item bg-surface/50 border border-border rounded-xl p-4 pl-5 transition-all">
                        <div class="relative flex flex-col items-center mb-4">

                            <x-form.input-photo model="tempPhotos.{{ $index }}" accept="image/*"
                                :photo="$certificate['image'] ?? null" label="Photo" rounded="rounded-md" :tempPhoto="$tempPhotos[$index] ?? null"
                                confirmAction="confirmUpdatePhoto({{ $index }})" />

                        </div>
                        <div class="grid md:grid-cols-2 gap-4">

                            <!-- Nama Sertifikat -->
                            <div class="space-y-2">
                                <x-form.input label="Nama Sertifikat (ID) {{ $index + 1 }}"
                                    model="certificates.{{ $index }}.title_id"
                                    placeholder="Sertificate Name (ID)" :rules="$rules"
                                    name="certificates[{{ $index }}][title_id]" />
                            </div>
                            <div class="space-y-2">
                                <x-form.input label="Certificate Name (EN) {{ $index + 1 }}"
                                    model="certificates.{{ $index }}.title_en"
                                    placeholder="Certificate Name (EN)" :rules="$rules"
                                    name="certificates[{{ $index }}][title_en]" />
                            </div>


                            <!-- Deskripsi Indonesia -->
                            <div class="md:col-span-2 space-y-2">
                                <x-form.textarea model="certificates.{{ $index }}.description_id"
                                    label="Description (ID)" name="certificates[{{ $index }}][description_id]"
                                    :rules="$rules"
                                    placeholder="Certificate of completion for web application development using Laravel." />
                            </div>

                            <!-- Deskripsi English -->
                            <div class="md:col-span-2 space-y-2">
                                <x-form.textarea model="certificates.{{ $index }}.description_en"
                                    label="Description (EN)" name="certificates[{{ $index }}][description_en]"
                                    :rules="$rules"
                                    placeholder="Certificate of completion for web application development using Laravel." />
                            </div>


                            <div class="space-y-2">
                                <x-form.date label="Tanggal Terbit {{ $index + 1 }}"
                                    model="certificates.{{ $index }}.issued_date" :rules="$rules"
                                    name="certificates[{{ $index }}][issued_date]" :max="now()->format('Y-m-d')"
                                    :min="'2010-01-01'" />
                            </div>

                            <div class="space-y-2">
                                <x-form.date label="Tanggal Kadaluarsa{{ $index + 1 }}"
                                    model="certificates.{{ $index }}.expiration_date" :rules="$rules"
                                    name="certificates[{{ $index }}][expiration_date]" :max="now()->addYear(30)->format('Y-m-d')"
                                    :min="$certificates[$index]['issued_date']" />
                            </div>


                            <div class="space-y-2">
                                <x-form.input label="Credential Id"
                                    model="certificates.{{ $index }}.credential_id" placeholder="Credential Id"
                                    :rules="$rules" name="certificates[{{ $index }}][credential_id]" />
                            </div>

                            <div class="space-y-2">
                                <x-form.input label="Credential URL"
                                    model="certificates.{{ $index }}.credential_url"
                                    placeholder="Credential URL" :rules="$rules"
                                    name="certificates[{{ $index }}][credential_url]" />
                            </div>

                            <!-- Issuer -->
                            <div class="space-y-2">
                                <x-form.input label="Issuer" model="certificates.{{ $index }}.issuer.name"
                                    placeholder="Issuer" :rules="$rules"
                                    name="certificates[{{ $index }}][issuer][name]" />

                            </div>
                        </div>

                        <div class="space-y-3 md:col-span-2">

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

                            {{-- Data yang sudah ada --}}
                            <div class="flex flex-wrap gap-2">

                                @foreach ($certificate['certificate_details'] ?? [] as $detailIndex => $detail)
                                    <div
                                        class="inline-flex items-center gap-2 rounded-full border border-border bg-surface px-3 py-1.5 text-sm">
                                        <span>
                                            {{ $detail['technology']['name'] }}
                                        </span>

                                        <span class="text-muted-foreground">
                                            ·
                                        </span>

                                        <span class="text-muted-foreground">
                                            {{ $detail['category']['name'] }}
                                        </span>

                                        <button type="button"
                                            wire:click="removeTechnology({{ $index }}, {{ $detailIndex }})"
                                            class="hover:text-red-500">
                                            ×
                                        </button>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                @endif
            @empty
            @endforelse

            <div class="flex  gap-4 items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </div>
                <div class="flex gap-4 flex-1 w-full">
                    <!-- Nama Sertifikat -->
                    <div class="space-y-2 flex-1 w-full">
                        <x-form.input labelClass="sr-only" label="add CertificateTitleId"
                            model="addCertificateTitleId" placeholder="Judul sertifikat" :rules="$rules"
                            name="addCertificateTitleId" />
                    </div>
                    {{-- {{ dd($certificate['issuer']) }} --}}
                    <div class="space-y-2 flex-1 w-full">
                        <x-form.select labelClass="sr-only" label="Issuer" model="addCertificateIssuerId"
                            placeholder="Penerbit" :rules="$rules" name="addCertificateIssuerId">

                            @foreach ($issuers as $issuer)
                                <option class="bg-[#f5f5f5] text-gray-900" value="{{ $issuer['id'] }}">
                                    {{ $issuer['name'] }}</option>
                            @endforeach
                        </x-form.select>
                    </div>

                    <div class="space-y-2 flex-1 w-full">
                        <x-form.date labelClass="sr-only" label="Tanggal Terbit" model="addCertificateIssuedDate"
                            :rules="$rules" name="addCertificateIssuedDate" :max="now()->format('Y-m-d')" :min="'2010-01-01'" />
                    </div>
                    <div class="space-y-3 flex items-end">
                        <x-form.button action="store" :btnFunc="'addCertificateButton'" label="Tambah" />
                    </div>
                </div>
            </div>
        </div>
    @endif
</form>
