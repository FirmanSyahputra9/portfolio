<section id="{{ __('projects') }}" class="section-anchor min-h-[calc(100vh-4rem)]">
    <x-section-title title="projects" />
    @if ($featuredProject)
        <article class="bg-card border border-border rounded-2xl overflow-hidden card-hover mb-10">
            <div class="flex flex-col md:flex-row">

                <div class="md:w-2/5 bg-surface/70 p-4 shrink-0 flex flex-col items-center justify-center">
                    <img src="{{ $featuredProject['image'] ?? 'https://placehold.co/600x400/172033/38BDF8?text=' . ($featuredProject['title'] ?? 'Project') }}"
                        alt="{{ $featuredProject['title'] ?? 'Project' }}"
                        class="w-full h-auto rounded-xl object-cover border border-border/50" loading="lazy"
                        width="600" height="400" />

                    <span
                        class="mt-2 text-xs font-mono text-secondary-text/60 whitespace-nowrap text-center capitalize">
                        {{ $featuredProject['start_date'] }} -
                        {{ $featuredProject['start_date'] && $featuredProject['completed_at'] ? $featuredProject['completed_at'] : __('present') }}
                    </span>
                </div>

                <div class="p-6 md:p-8 md:w-3/5 flex flex-col justify-center">
                    <span
                        class="inline-block bg-accent/15 text-accent text-xs font-semibold px-3 py-1 rounded-full border border-accent/20 self-start mb-3">Featured</span>
                    <h3 class="text-xl font-bold tracking-tight">{{ $featuredProject['title'] ?? 'Project' }}</h3>
                    <p class="text-secondary-text text-sm leading-relaxed mt-2">
                        {{ $featuredProject['introduction'] ?? 'No introduction available.' }}</p>
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
                        @if ($featuredProject['source_code'])
                            <x-action label="GitHub" href="{{ $featuredProject['source_code'] ?? '#' }}" />
                        @endif
                        @if ($featuredProject['demo'])
                            <x-action label="Live" href="{{ $featuredProject['demo'] ?? '#' }}" />
                        @endif
                    </div>
                </div>
            </div>
        </article>
    @else
        <p class="text-secondary-text text-sm leading-relaxed mt-2 max-w-2xl">No project data available.</p>
    @endif

    @if ($projects)
        <div class="relative">
            <div
                class="flex gap-5 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-4
                   scrollbar-thin scrollbar-thumb-border scrollbar-track-transparent">

                @forelse ($projects as $project)
                    <article
                        class="bg-card border border-border rounded-xl p-5 card-hover flex flex-col
                           flex-none w-[85%] sm:w-[60%] lg:w-[40%] snap-start">

                        <div
                            class="bg-surface/50 rounded-lg p-3 mb-4 border border-border/40 flex flex-col items-center justify-center">
                            <img src="{{ $project['image'] ?? 'https://placehold.co/600x400/172033/38BDF8?text=' . ($project['title'] ?? 'Project') }}"
                                alt="{{ $project['title'] ?? 'Project' }}"
                                class="w-full h-auto rounded-xl object-cover border border-border/50" loading="lazy"
                                width="600" height="400" />

                            <span
                                class="mt-2 text-xs font-mono text-secondary-text/60 whitespace-nowrap text-center capitalize">
                                {{ $project['start_date'] }} -
                                {{ $project['start_date'] && $project['completed_at'] ? $project['completed_at'] : __('present') }}
                            </span>
                        </div>

                        <h4 class="font-semibold text-base">
                            {{ $project['title'] ?? 'Project' }}
                        </h4>

                        <p class="text-secondary-text text-xs leading-relaxed mt-1 flex-1">
                            {{ $project['introduction'] ?? 'No introduction available.' }}
                        </p>

                        <div class="flex flex-wrap gap-1.5 mt-3">
                            @forelse ($project['technologies'] ?? [] as $technology)
                                <span
                                    class="bg-surface border border-border rounded-full px-2.5 py-0.5
                                       text-[10px] text-secondary-text flex items-center gap-1">
                                    <i class="{{ $technology['icon'] ?? 'ri-code-s-slash-line' }}"></i>
                                    {{ $technology['technology'] }}
                                </span>
                            @empty
                            @endforelse
                        </div>

                        <div class="flex gap-3 mt-3 text-xs">
                            @if ($project['source_code'])
                                <x-action label="GitHub" href="{{ $project['source_code'] ?? '#' }}" />
                            @endif
                            @if ($project['demo'])
                                <x-action label="Live" href="{{ $project['demo'] ?? '#' }}" />
                            @endif
                        </div>
                    </article>
                @empty
                    <p class="text-secondary-text text-sm">
                        No project data available.
                    </p>
                @endforelse

            </div>
        </div>
    @endif


</section>
