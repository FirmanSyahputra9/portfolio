<section id="{{ __('experiences') }}" class="section-anchor min-h-[calc(100vh-4rem)]">
    <x-section-title title="experiences" />
    <div class="space-y-6">

        @forelse ($showAllExperiences ? $experiences : collect($experiences)->take(2) as $index => $experience)
            <article class="bg-card/40 border border-border rounded-xl p-5 hover:bg-card/70 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-6">
                    <div class="w-40 shrink-0 flex flex-col items-center justify-center">
                        <img src="{{ $experience['image'] }}" alt="{{ $experience['company'] }}" loading="lazy"
                            decoding="async" width="144" height="144" class="w-36 h-36 rounded-md object-cover">

                        <span class="mt-2 text-xs font-mono text-secondary-text/60 whitespace-nowrap text-center capitalize">
                            {{ $experience['start_date'] }} - {{ $experience['end_date'] ?? __('present') }}
                        </span>
                    </div>
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
        @if (count($experiences) > 2)
            <div class="mt-8">
                <button wire:click="toggleExperiences"
                    class="w-full inline-flex cursor-pointer items-center justify-center gap-2 px-6 py-2.5 rounded-full
                       border border-accent/20 bg-accent/20
                       text-accent font-medium text-sm
                       hover:bg-accent/30 transition-all">
                    @if ($showAllExperiences)
                        <span class="inline-block capitalize">
                            {{ __('hide') }}
                        </span>
                        <i class="fas fa-chevron-up text-xs"></i>
                    @else
                        <span class="inline-block capitalize">
                            {{ __('show all') }}
                        </span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    @endif
                </button>
            </div>
        @endif
    </div>
</section>
