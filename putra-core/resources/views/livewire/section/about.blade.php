<form wire:submit.prevent="saveAbout" method="POST"
    class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <x-form.save label="About" name="Save About" toggle :show="$show" />
    @if ($show)
        <div class="space-y-3">
            <div class="grid md:grid-cols-2 gap-5">

                <div class="space-y-3">
                    <x-form.textarea model="about_description_id" label="Deskripsi (ID)" name="about_description_id"
                        :rules="$rules" placeholder="Tentang Anda dalam bahasa Indonesia..." rows="6" />
                </div>


                <div class="space-y-3">
                    <x-form.textarea model="about_description_en" label="Description (EN)" name="about_description_en"
                        :rules="$rules" placeholder="About you in English..." rows="6" />
                </div>
            </div>
        </div>
    @endif
</form>
