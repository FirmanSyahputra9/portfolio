<form wire:submit.prevent="saveContact" method="POST"
    class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <x-form.save label="Contact" name="Save Contact" toggle :show="$show" />
    @if ($show)
        <div class="space-y-3 ml-10">

            <div class="grid md:grid-cols-2 gap-5">
                <div class="space-y-3">
                    <x-form.input model="contact_title_id" label="Judul (ID)" type="text" name="contact_title_id"
                        :rules="$rules" placeholder="Judul Kontak (Indonesia)" />
                </div>
                <div class="space-y-3">
                    <x-form.input model="contact_title_en" label="Title (EN)" type="text" name="contact_title_en"
                        :rules="$rules" placeholder="Contact Title (English)" />
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div class="space-y-3">
                    <x-form.textarea model="contact_description_id" label="Deskripsi (ID)" name="contact_description_id"
                        :rules="$rules" placeholder="Deskripsi kontak dalam bahasa Indonesia..." rows="3" />
                </div>
                <div class="space-y-3">
                    <x-form.textarea model="contact_description_en" label="Description (EN)"
                        name="contact_description_en" :rules="$rules" placeholder="Contact description in English..."
                        rows="3" />
                </div>
            </div>


            <div class="mt-6">
                <h3 class="text-sm font-medium text-secondary-text mb-3">Platform Kontak</h3>

                @forelse ($contactDetails as $index => $detail)
                    <div wire:key="contact-detail-{{ $detail['id'] }}"
                        class="flex items-center gap-3 bg-surface/50 border border-border rounded-xl p-3 mb-2">
                        <div class="flex-1 grid grid-cols-4 gap-3">
                            <div>
                                <span class="text-xs text-secondary-text">Platform</span>
                                <p class="text-sm">{{ $detail['platform'] }}</p>
                            </div>
                            <div>
                                <span class="text-xs text-secondary-text">Nama</span>
                                <p class="text-sm">{{ $detail['name'] }}</p>
                            </div>
                            <div>
                                <span class="text-xs text-secondary-text">Icon</span>
                                <p class="text-sm">{{ $detail['icon'] }}</p>
                            </div>
                            <div>
                                <span class="text-xs text-secondary-text">URL</span>
                                <p class="text-sm truncate">{{ $detail['url'] }}</p>
                            </div>
                        </div>
                        <button type="button" wire:click="removeContactDetail({{ $index }})"
                            class="text-red-500 hover:text-red-700 transition px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @empty
                    <div
                        class="text-center py-4 text-secondary-text text-sm border border-dashed border-border rounded-xl">
                        Belum ada platform kontak. Tambahkan di bawah.
                    </div>
                @endforelse


                <div class="flex gap-3 items-end mt-4 flex-wrap">
                    <div class="flex-1 min-w-[150px]">
                        <x-form.input labelClass="sr-only" label="Platform" model="addContactPlatform"
                            placeholder="Platform (GitHub, LinkedIn, etc)" :rules="$rules"
                            name="addContactPlatform" />
                    </div>
                    <div class="flex-1 min-w-[150px]">
                        <x-form.input labelClass="sr-only" label="Name" model="addContactName"
                            placeholder="Nama Tampilan" :rules="$rules" name="addContactName" />
                    </div>
                    <div class="flex-1 min-w-[120px]">
                        <x-form.input labelClass="sr-only" label="Icon" model="addContactIcon"
                            placeholder="Icon (fa-brands fa-github)" :rules="$rules" name="addContactIcon" />
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <x-form.input labelClass="sr-only" label="URL" model="addContactUrl"
                            placeholder="https://..." :rules="$rules" name="addContactUrl" />
                    </div>
                    <div class="space-y-3 flex items-end">
                        <x-form.button action="store" :btnFunc="'addContactDetail'" label="Tambah Platform" />
                    </div>
                </div>
            </div>
        </div>
    @endif
</form>
