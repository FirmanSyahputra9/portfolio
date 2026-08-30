<form action="/api/skills" method="POST" class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
    <div class="flex items-center justify-between mb-5">
        <h2 class="text-lg font-semibold flex items-center gap-2">
            <span class="text-accent">✦</span> Skills
        </h2>
        <button type="submit"
            class="bg-accent/20 hover:bg-accent/30 text-accent px-5 py-2 rounded-full text-sm font-medium transition-all border border-accent/20">Save
            Skills</button>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
            <label class="block text-xs font-medium text-secondary-text/70">Programming Languages</label>
            <div class="input-focus bg-background border border-border rounded-lg overflow-hidden mt-1">
                <input type="text" name="skills_languages" value="TypeScript, Go, Python, Rust"
                    class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
            </div>
        </div>
        <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
            <label class="block text-xs font-medium text-secondary-text/70">Frontend</label>
            <div class="input-focus bg-background border border-border rounded-lg overflow-hidden mt-1">
                <input type="text" name="skills_frontend" value="React, Livewire, Tailwind, Alpine"
                    class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
            </div>
        </div>
        <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
            <label class="block text-xs font-medium text-secondary-text/70">Backend</label>
            <div class="input-focus bg-background border border-border rounded-lg overflow-hidden mt-1">
                <input type="text" name="skills_backend" value="Laravel, Node.js, Spring"
                    class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
            </div>
        </div>
        <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
            <label class="block text-xs font-medium text-secondary-text/70">Database</label>
            <div class="input-focus bg-background border border-border rounded-lg overflow-hidden mt-1">
                <input type="text" name="skills_database" value="PostgreSQL, MySQL, MongoDB, Redis"
                    class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
            </div>
        </div>
        <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
            <label class="block text-xs font-medium text-secondary-text/70">Tools &amp; Cloud</label>
            <div class="input-focus bg-background border border-border rounded-lg overflow-hidden mt-1">
                <input type="text" name="skills_cloud" value="AWS, Docker, K8s, Terraform"
                    class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
            </div>
        </div>
        <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
            <label class="block text-xs font-medium text-secondary-text/70">Other</label>
            <div class="input-focus bg-background border border-border rounded-lg overflow-hidden mt-1">
                <input type="text" name="skills_other" value="System Design, CI/CD, Agile"
                    class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
            </div>
        </div>
    </div>
</form>
