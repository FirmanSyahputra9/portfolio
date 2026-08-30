    <form action="/api/contact" method="POST" class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-lg font-semibold flex items-center gap-2">
                <span class="text-accent">✦</span> Contact &amp; Social
            </h2>
            <button type="submit"
                class="bg-accent/20 hover:bg-accent/30 text-accent px-5 py-2 rounded-full text-sm font-medium transition-all border border-accent/20">Save
                Contact</button>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="block text-xs font-medium text-secondary-text/70">Email</label>
                <div class="input-focus bg-surface border border-border rounded-lg overflow-hidden">
                    <input type="text" name="contact_email" value="hello@firman.dev"
                        class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none" />
                </div>
            </div>
            <div class="space-y-2">
                <label class="block text-xs font-medium text-secondary-text/70">GitHub</label>
                <div class="input-focus bg-surface border border-border rounded-lg overflow-hidden">
                    <input type="text" name="contact_github" value="github.com/firman"
                        class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none" />
                </div>
            </div>
            <div class="space-y-2">
                <label class="block text-xs font-medium text-secondary-text/70">LinkedIn</label>
                <div class="input-focus bg-surface border border-border rounded-lg overflow-hidden">
                    <input type="text" name="contact_linkedin" value="linkedin.com/in/firman"
                        class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none" />
                </div>
            </div>
            <div class="space-y-2">
                <label class="block text-xs font-medium text-secondary-text/70">Instagram</label>
                <div class="input-focus bg-surface border border-border rounded-lg overflow-hidden">
                    <input type="text" name="contact_instagram" value="@firman.dev"
                        class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none" />
                </div>
            </div>
        </div>
    </form>
