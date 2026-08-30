<div class="space-y-3">
    <div class="group relative">
        <div class="relative overflow-hidden rounded-2xl bg-slate-950 shadow-2xl transition-all duration-300">
            <div class="relative p-6">
                <div class="group/dropzone mx-auto max-w-[800px]">
                    <div
                        class="relative rounded-xl border-2 border-dashed border-slate-700 bg-slate-900/50 p-6 transition-colors hover:border-cyan-500/50 flex flex-col items-center justify-center text-center">
                        <x-form.input-photo model="tempPhoto" accept="image/*" :photo="$photo" label="Photo"
                            rounded="rounded-full" :tempPhoto="$tempPhoto" confirmAction="confirmUpdatePhoto" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
