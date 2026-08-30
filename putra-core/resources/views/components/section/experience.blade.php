<form action="/api/experience" method="POST" class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <div class="flex items-center justify-between mb-5">
        <h2 class="text-lg font-semibold flex items-center gap-2">
            <span class="text-accent">✦</span> Experience
        </h2>
        <button type="submit"
            class="bg-accent/20 hover:bg-accent/30 text-accent px-5 py-2 rounded-full text-sm font-medium transition-all border border-accent/20">Save
            Experience</button>
    </div>

    <div class="space-y-4">
        <!-- item 1 -->
        <div class="repeater-item bg-surface/50 border border-border rounded-xl p-4 pl-5 transition-all">
            <div class="grid md:grid-cols-2 gap-4">
                <!-- Periode - Indonesia -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Periode
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_period_id[]" value="2022 — sekarang"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Periode - English -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Period
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_period_en[]" value="2022 — present"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Posisi - Indonesia -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Posisi
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_position_id[]" value="Staff Software Engineer"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Posisi - English -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Position
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_position_en[]" value="Staff Software Engineer"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Perusahaan - Indonesia -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Perusahaan
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_company_id[]" value="Nexus Technologies · Remote"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Perusahaan - English -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Company
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_company_en[]" value="Nexus Technologies · Remote"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Deskripsi - Indonesia -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_desc_id[]"
                            value="Memimpin transformasi backend dari monolit ke microservices. Mendesain sistem event-driven dengan Go dan Kafka."
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Deskripsi - English -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Description
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_desc_en[]"
                            value="Leading backend transformation from monolith to microservices. Design event-driven systems with Go and Kafka."
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Stack - sama -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Stack
                        (koma)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_stack[]" value="Go, Kafka, AWS, Terraform"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
            </div>
        </div>

        <!-- item 2 -->
        <div class="repeater-item bg-surface/50 border border-border rounded-xl p-4 pl-5 transition-all">
            <div class="grid md:grid-cols-2 gap-4">
                <!-- Periode - Indonesia -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Periode
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_period_id[]" value="2019 — 2022"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Periode - English -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Period
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_period_en[]" value="2019 — 2022"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Posisi - Indonesia -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Posisi
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_position_id[]" value="Senior Full Stack Developer"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Posisi - English -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Position
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_position_en[]" value="Senior Full Stack Developer"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Perusahaan - Indonesia -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Perusahaan
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_company_id[]" value="Finlytics · Singapura"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Perusahaan - English -->
                <div class="space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Company
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_company_en[]" value="Finlytics · Singapore"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Deskripsi - Indonesia -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                        (Indonesia)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_desc_id[]"
                            value="Membangun platform analitik B2B yang menangani 10M+ event harian."
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
                <!-- Deskripsi - English -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Description
                        (English)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_desc_en[]"
                            value="Built a B2B analytics platform handling 10M+ daily events."
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>

                <!-- Stack - sama -->
                <div class="md:col-span-2 space-y-2">
                    <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Stack
                        (koma)</label>
                    <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                        <input type="text" name="exp_stack[]" value="React, Node.js, PostgreSQL, Docker"
                            class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
