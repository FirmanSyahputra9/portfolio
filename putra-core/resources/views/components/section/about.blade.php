  <form action="/api/about" method="POST" class="admin-card bg-card/40 border border-border rounded-2xl p-6 mb-8">
      <div class="flex items-center justify-between mb-5">
          <h2 class="text-lg font-semibold flex items-center gap-2">
              <span class="text-accent">✦</span> About &amp; Tech Stack
          </h2>
          <button type="submit"
              class="bg-accent/20 hover:bg-accent/30 text-accent px-5 py-2 rounded-full text-sm font-medium transition-all border border-accent/20">Save
              About</button>
      </div>

      <div class="grid md:grid-cols-2 gap-5">
          <!-- Tentang diri - Indonesia -->
          <div class="space-y-3">
              <label class="block text-xs font-medium text-secondary-text/70">Tentang diri (Indonesia)</label>
              <div class="input-focus bg-surface border border-border rounded-lg overflow-hidden">
                  <textarea name="about_text_id" rows="4"
                      class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none resize-none">Saya seorang Senior Software Engineer dengan passion untuk clean code, distributed systems, dan developer tooling. Selama satu dekade terakhir, saya bekerja dengan startup dan enterprise di berbagai bidang fintech, logistik, dan edtech. Saya percaya bahwa rekayasa perangkat lunak yang baik adalah perpaduan antara kesederhanaan, ketahanan, dan empati terhadap pengguna.</textarea>
              </div>
          </div>
          <!-- Tentang diri - English -->
          <div class="space-y-3">
              <label class="block text-xs font-medium text-secondary-text/70">About Me (English)</label>
              <div class="input-focus bg-surface border border-border rounded-lg overflow-hidden">
                  <textarea name="about_text_en" rows="4"
                      class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none resize-none">I'm a Senior Software Engineer with a passion for clean code, distributed systems, and developer tooling. Over the last decade, I've worked with startups and enterprises across fintech, logistics, and edtech. I believe great engineering is a blend of simplicity, robustness, and empathy for the people using the software.</textarea>
              </div>
          </div>
      </div>

      <!-- Tech Stack - sama untuk semua bahasa -->
      <div class="mt-5">
          <label class="block text-xs font-medium text-secondary-text/70">Teknologi (pisahkan dengan koma)</label>
          <div class="input-focus bg-surface border border-border rounded-lg overflow-hidden">
              <input type="text" name="about_tech"
                  value="TypeScript, Laravel, React, Go, Python, Rust, AWS, Kubernetes, Tailwind, Livewire"
                  class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none" />
          </div>
          <div class="flex flex-wrap gap-2 mt-3">
              <span class="badge-pill">TypeScript</span>
              <span class="badge-pill">Laravel</span>
              <span class="badge-pill">React</span>
              <span class="badge-pill">Go</span>
              <span class="badge-pill">Python</span>
              <span class="badge-pill">Rust</span>
          </div>
      </div>
  </form>
