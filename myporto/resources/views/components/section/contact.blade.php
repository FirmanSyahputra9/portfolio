<section id="{{ __('contacts') }}" class="section-anchor min-h-[calc(100vh-4rem)]">
    <x-section-title title="contacts" />
    <div class="bg-card/50 border border-border rounded-2xl p-8">
        <h3 class="text-2xl font-bold tracking-tight">{{ $contacts['contact_title'] ?? '-' }}</h3>
        <p class="text-secondary-text text-sm leading-relaxed mt-2">
            {{ $contacts['contact_description'] ?? '-' }}
        </p>
        <a @if ($contacts) href="mailto:{{ $contacts['email']['url'] }}" @endif
            class="inline-block mt-5 bg-accent/20 hover:bg-accent/30 text-accent font-medium px-6 py-2.5 rounded-full border border-accent/20 transition-all text-sm">
            Say Hello
        </a>
        <div class="flex gap-5 mt-6 text-sm text-secondary-text">

            @forelse ($contacts['platforms'] ?? [] as $contactItem)
                <a href="{{ $contactItem['url'] }}" target="_blank" class="hover:text-accent transition-colors">
                    <i class="{{ $contactItem['icon'] }}"></i>
                    {{ $contactItem['platform'] }}
                </a>
            @empty
                <span class="text-secondary-text">No contact data available.</span>
            @endforelse
        </div>
    </div>
</section>
