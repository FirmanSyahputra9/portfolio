<section id="{{ __('skills') }}" class="section-anchor min-h-[calc(100vh-4rem)]">
    <x-section-title title="skills" />
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($skills as $category => $technologies)
            <div class="bg-card border border-border rounded-xl p-4 hover:border-accent/50 transition-colors">
                <h4 class="text-sm font-semibold text-primaryText/90">{{ ucfirst($category) }}</h4>
                <div class="flex flex-wrap gap-1.5 mt-2">
                    @foreach ($technologies as $technology)
                        <span
                            class="bg-surface/60 border border-border rounded-full px-3 py-0.5 text-xs text-secondary-text"><i
                                class="{{ strtolower($technology['icon']) }} mr-2"></i>
                            {{ $technology['technology'] }}</span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
