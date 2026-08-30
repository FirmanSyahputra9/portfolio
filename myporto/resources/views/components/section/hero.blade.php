<section id="hero" class="section-anchor pt-4 min-h-[calc(100vh-4rem)]">
    <div class="space-y-4">
        <p class="text-sm font-medium text-accent/80 tracking-wide">Hi, I'm</p>
        <h2 class="text-4xl sm:text-5xl xl:text-6xl font-bold tracking-tight leading-[1.1]">
            {{ $hero['name'] ?? '-' }}
        </h2>
        <p class="text-xl sm:text-2xl font-medium text-secondary-text/90">
            {{ $hero['role'] ?? '-' }}
        </p>
        <div class="max-w-xl space-y-3 text-secondary-text text-base leading-relaxed">
            @php
                $bio = $hero['role_description'] ?? '';
                $sentences = array_filter(array_map('trim', explode('.', $bio)));
            @endphp

            @foreach ($sentences as $sentence)
                <p>{{ $sentence }}.</p>
            @endforeach
        </div>
        <div class="flex flex-wrap gap-4 pt-2">
            @forelse ($hero['hero_buttons'] ?? [] as $button)
                {{-- {{ dd($button['action']) }} --}}
                <a href="{{ $button['url'] }}" @if ($button['action'] === 'download') download="download" @endif
                    class="inline-block bg-accent/20 hover:bg-accent/30 text-accent font-medium px-6 py-2.5 rounded-full border border-accent/20 transition-all text-sm">{{ $button['label'] }}</a>
            @empty
            @endforelse

        </div>
    </div>
</section>
