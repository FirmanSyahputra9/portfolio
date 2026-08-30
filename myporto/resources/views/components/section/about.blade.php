    <section id="about" class="section-anchor min-h-[calc(100vh-4rem)]">
        <h2 class="text-2xl font-bold tracking-tight mb-6 flex items-center gap-3">
            <span class="text-accent text-2xl">/</span> About
        </h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-4 text-secondary-text leading-relaxed">
                <p>I'm a Senior Software Engineer with a passion for clean code, distributed systems, and
                    developer tooling. Over the last decade, I've worked with startups and enterprises across
                    fintech, logistics, and edtech.</p>
                <p>I believe great engineering is a blend of simplicity, robustness, and empathy for the people
                    using the software. I lead teams, mentor juniors, and still get my hands dirty with code
                    every day.</p>
                <p>When I'm not building, I write about system design, contribute to open source, and tinker
                    with embedded systems.</p>
            </div>
            <div>
                <p class="text-sm font-medium text-secondary-text/80 mb-3">Technologies I work with</p>
                <div class="grid grid-cols-2 sm:grid-cols-2 gap-2.5">
                    @forelse ($technologies as $technology)
                        <span
                            class="bg-card border border-border rounded-full px-4 py-1.5 text-sm text-secondary-text badge-hover transition-colors cursor-default"><i
                                class="{{ strtolower($technology['icon']) }} mr-2"></i>
                            {{ $technology['technology'] }}</span>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
