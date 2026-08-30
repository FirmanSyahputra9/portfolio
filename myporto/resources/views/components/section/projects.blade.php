<section id="projects" class="section-anchor min-h-[calc(100vh-4rem)]">
    <h2 class="text-2xl font-bold tracking-tight mb-6 flex items-center gap-3">
        <span class="text-accent text-2xl">/</span> Projects
    </h2>

    <article class="bg-card border border-border rounded-2xl overflow-hidden card-hover mb-10">
        <div class="flex flex-col md:flex-row">
            <!-- image -->
            <div class="md:w-2/5 bg-surface/70 p-4 flex items-center justify-center">
                <img src="https://placehold.co/600x400/172033/38BDF8?text={{ $featuredProject['title'] ?? 'Project' }}"
                    alt="{{ $featuredProject['title'] ?? 'Project' }}"
                    class="w-full h-auto rounded-xl object-cover border border-border/50" loading="lazy" width="600"
                    height="400" />
            </div>
            <!-- content -->
            <div class="p-6 md:p-8 md:w-3/5 flex flex-col justify-center">
                <span
                    class="inline-block bg-accent/15 text-accent text-xs font-semibold px-3 py-1 rounded-full border border-accent/20 self-start mb-3">Featured</span>
                <h3 class="text-xl font-bold tracking-tight">{{ $featuredProject['title'] ?? 'Project' }}</h3>
                <p class="text-secondary-text text-sm leading-relaxed mt-2">{{ $featuredProject['introduction'] ?? 'No introduction available.' }}</p>
                <div class="flex flex-wrap gap-2 mt-3">
                    @forelse ($featuredProject['technologies'] ?? [] as $technology)
                        <span
                            class="bg-card border border-border rounded-full px-3 py-1 text-xs text-secondary-text flex items-center gap-2">
                            <i class="{{ $technology['icon'] ?? 'ri-code-s-slash-line' }}"></i>
                            {{ $technology['technology'] }}
                        </span>

                    @empty
                    @endforelse
                </div>
                <div class="flex gap-4 mt-4">
                    <x-action label="GitHub" href="{{ $featuredProject['source_code'] ?? '#' }}" />
                    <x-action label="Live" href="{{ $featuredProject['demo'] ?? '#' }}" />
                </div>
            </div>
        </div>
    </article>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-{{ count($projects) > 2 ? '3' : '2' }} gap-5">

        @forelse ($projects as $project)
            <article class="bg-card border border-border rounded-xl p-5 card-hover flex flex-col">
                <div class="bg-surface/50 rounded-lg p-3 mb-4 border border-border/40">
                    <img src="https://placehold.co/600x400/172033/38BDF8?text={{ $project['title'] ?? 'Project' }}"
                        alt="{{ $project['title'] ?? 'Project' }}"
                        class="w-full h-auto rounded-xl object-cover border border-border/50" loading="lazy"
                        width="600" height="400" />
                </div>
                <h4 class="font-semibold text-base">{{ $project['title'] ?? 'Project' }}</h4>
                <p class="text-secondary-text text-xs leading-relaxed mt-1 flex-1">{{ $project['introduction'] ?? 'No introduction available.' }}</p>
                <div class="flex flex-wrap gap-1.5 mt-3">
                    @forelse ($project['technologies'] ?? [] as $technology)
                        <span
                            class="bg-surface border border-border rounded-full px-2.5 py-0.5 text-[10px] text-secondary-text">
                            <i class="{{ $technology['icon'] ?? 'ri-code-s-slash-line' }}"></i>
                            {{ $technology['technology'] }}
                        </span>
                    @empty
                    @endforelse
                </div>
                <div class="flex gap-3 mt-3 text-xs">
                    <x-action label="GitHub" href="{{ $project['source_code'] ?? '#' }}" />
                    <x-action label="Live" href="{{ $project['demo'] ?? '#' }}" />
                </div>
            </article>
        @empty
            <p class="text-secondary-text text-sm">No projects available.</p>
        @endforelse
    </div>
</section>
