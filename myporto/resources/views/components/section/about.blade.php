<section id="{{ __('about') }}" class="section-anchor min-h-[calc(100vh-4rem)]">
    <x-section-title title="about" />
    <div class="grid md:grid-cols-2 gap-8">
        <div class="space-y-4 text-secondary-text leading-relaxed">
            @php
                $description = $about['about_description'] ?? '';
                $sentences = array_filter(array_map('trim', explode('.', $description)));
            @endphp

            @foreach ($sentences as $sentence)
                <p>{{ $sentence }}.</p>
            @endforeach
        </div>
        <div>
            <p class="text-sm font-medium text-secondary-text/80 mb-3">{{ __("Technologies I work with") }}</p>
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
