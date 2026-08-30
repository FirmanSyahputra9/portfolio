<form wire:submit.prevent="saveHero" method="POST"
    class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <x-form.save label="Hero" name="Save Hero" toggle :show="$show" />
    @if ($show)
    <div class="space-y-3">
        <div class="grid md:grid-cols-2 gap-5">
            <div class="space-y-3">
                <x-form.input model="name_id" label="Name (ID)" type="text" name="hero_name_id" :rules="$rules"
                    placeholder="Nama (Indonesia)" />
            </div>
            <!-- Nama - English -->
            <div class="space-y-3">
                <x-form.input model="name_en" label="Name (EN)" type="text" name="hero_name_en" :rules="$rules"
                    placeholder="Name (English)" />
            </div>

        </div>
        <div class="grid md:grid-cols-2 gap-5 mt-5">
            <!-- Role - Indonesia -->
            <div class="space-y-3">
                <x-form.input model="role_id" label="Role / Title (ID)" type="text" name="hero_role_id"
                    :rules="$rules" />
            </div>
            <!-- Role - English -->
            <div class="space-y-3">
                <x-form.input model="role_en" label="Role / Title (EN)" type="text" name="hero_role_en"
                    :rules="$rules" />
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-5 mt-5">
            <!-- Summary - Indonesia -->
            <div class="space-y-3">
                <x-form.input model="summary_id" label="Summary (ID)" type="text" name="hero_summary_id"
                    :rules="$rules" />
            </div>
            <!-- Summary - English -->
            <div class="space-y-3">
                <x-form.input model="summary_en" label="Summary (EN)" type="text" name="hero_summary_en"
                    :rules="$rules" />
            </div>
        </div>
        <div class="grid md:grid-cols-1 gap-5 mt-5">

            <!-- Bio - Indonesia -->
            <div class="md:col-span-2 space-y-3">
                <x-form.textarea model="role_description_id" label="Bio (ID)" name="hero_role_description_id"
                    :rules="$rules" placeholder="Bio (Indonesia) - max 3 paragraf" />
            </div>
        </div>
        <div class="grid md:grid-cols-1 gap-5 mt-5">
            <!-- Bio - English -->
            <div class="md:col-span-2 space-y-3">
                <x-form.textarea model="role_description_en" label="Bio (EN)" name="hero_role_description_en"
                    :rules="$rules" placeholder="Bio (English) - max 3 paragraphs" />
            </div>
        </div>
    </div>
    @endif

</form>
