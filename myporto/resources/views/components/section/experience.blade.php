<section id="experience" class="section-anchor min-h-[calc(100vh-4rem)]">
    <h2 class="text-2xl font-bold tracking-tight mb-6 flex items-center gap-3">
        <span class="text-accent text-2xl">/</span> Experience
    </h2>
    <div class="space-y-6">

        @forelse ($experiences as $experience)
            <article class="bg-card/40 border border-border rounded-xl p-5 hover:bg-card/70 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-6">
                    <span class="text-xs font-mono text-secondary-text/60 whitespace-nowrap">
                        {{ $experience['start_date'] }} - {{ $experience['end_date'] }}
                    </span>
                    <div>
                        <h3 class="text-lg font-semibold leading-tight">{{ $experience['position'] }}</h3>
                        <p class="text-accent/80 text-sm font-medium">{{ $experience['company'] }} ·
                            {{ $experience['location'] }}</p>
                        <p class="text-secondary-text text-sm leading-relaxed mt-2 max-w-2xl">
                            {{ $experience['description'] }}
                        </p>
                        <div class="flex flex-wrap gap-1.5 mt-2.5">
                            @foreach ($experience['technologies'] as $technology)
                                <span
                                    class="bg-card border border-border rounded-full px-3 py-0.5 text-xs text-secondary-text">

                                    <i class="{{ strtolower($technology['icon']) }} mr-2"></i>
                                    {{ $technology['technology'] }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <p class="text-secondary-text text-sm leading-relaxed mt-2 max-w-2xl">No experience data available.</p>
        @endforelse
        <!-- item 2 -->
    </div>
</section>
