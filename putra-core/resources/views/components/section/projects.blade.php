  <form action="/api/projects" method="POST" class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
      <div class="flex items-center justify-between mb-5">
          <h2 class="text-lg font-semibold flex items-center gap-2">
              <span class="text-accent">✦</span> Projects
          </h2>
          <button type="submit"
              class="bg-accent/20 hover:bg-accent/30 text-accent px-5 py-2 rounded-full text-sm font-medium transition-all border border-accent/20">Save
              Projects</button>
      </div>

      <!-- Featured -->
      <div class="bg-surface/50 border border-border rounded-xl p-4 mb-5 hover:border-accent/30 transition-all">
          <div class="flex items-center gap-2 text-xs text-accent/70 mb-3">
              <span class="bg-accent/10 px-3 py-0.5 rounded-full border border-accent/20">⭐ Featured</span>
          </div>
          <div class="grid md:grid-cols-2 gap-4">
              <!-- Judul - Indonesia -->
              <div class="space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Judul Project
                      (Indonesia)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="featured_title_id" value="Kronos · Workflow Orchestration"
                          class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                  </div>
              </div>
              <!-- Judul - English -->
              <div class="space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Project Title
                      (English)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="featured_title_en" value="Kronos · Workflow Orchestration"
                          class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                  </div>
              </div>

              <div class="space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">URL Gambar</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="featured_image"
                          value="https://placehold.co/600x400/172033/38BDF8?text=Kronos+Platform"
                          class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                  </div>
              </div>

              <!-- Deskripsi - Indonesia -->
              <div class="md:col-span-2 space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                      (Indonesia)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="featured_desc_id"
                          value="Mesin workflow distributed open-source yang dibangun dengan Go. Menangani jutaan task dengan durability dan observability."
                          class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                  </div>
              </div>
              <!-- Deskripsi - English -->
              <div class="md:col-span-2 space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Description
                      (English)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="featured_desc_en"
                          value="Open-source distributed workflow engine built in Go. Handles millions of tasks with durability and observability."
                          class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                  </div>
              </div>

              <div class="md:col-span-2 space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Tech Stack
                      (koma)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="featured_stack" value="Go, Temporal, React, gRPC"
                          class="w-full bg-transparent px-3 py-2 text-sm text-primary-text outline-none" />
                  </div>
              </div>
          </div>
      </div>

      <!-- Grid projects -->
      <div class="grid md:grid-cols-3 gap-4">
          <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
              <div class="space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Judul (ID)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_title_id[]" value="Insight Dashboard"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Judul (EN)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_title_en[]" value="Insight Dashboard"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                      (ID)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_desc_id[]" value="Analitik real-time untuk tim produk."
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                      (EN)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_desc_en[]" value="Real-time analytics for product teams."
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Stack</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_stack[]" value="Laravel, Livewire, Tailwind"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
              </div>
          </div>

          <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
              <div class="space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Judul (ID)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_title_id[]" value="Edge Gateway"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Judul (EN)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_title_en[]" value="Edge Gateway"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                      (ID)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_desc_id[]"
                          value="API gateway performansi tinggi dengan autentikasi JWT."
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                      (EN)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_desc_en[]"
                          value="High-performance API gateway with JWT auth."
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Stack</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_stack[]" value="Rust, Tokio, Redis"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
              </div>
          </div>

          <div class="bg-surface/40 border border-border rounded-xl p-4 hover:border-accent/30 transition-all">
              <div class="space-y-2">
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Judul (ID)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_title_id[]" value="DevOps Toolbox"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Judul (EN)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_title_en[]" value="DevOps Toolbox"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                      (ID)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_desc_id[]"
                          value="Alat CLI untuk otomatisasi infrastruktur dan monitoring."
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Deskripsi
                      (EN)</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_desc_en[]"
                          value="CLI tools for infra automation and monitoring."
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
                  <label class="block text-[10px] uppercase tracking-wider text-secondary-text/60">Stack</label>
                  <div class="input-focus bg-background border border-border rounded-lg overflow-hidden">
                      <input type="text" name="project_stack[]" value="Python, Ansible, Docker"
                          class="w-full bg-transparent px-3 py-1.5 text-sm outline-none" />
                  </div>
              </div>
          </div>
      </div>
  </form>
