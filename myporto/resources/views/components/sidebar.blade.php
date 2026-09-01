<aside class="lg:sticky lg:top-6 lg:self-start lg:w-[300px] xl:w-[340px] flex-shrink-0">
    <div class="bg-surface/80 backdrop-blur-sm rounded-2xl p-6 border border-border shadow-xl ">

        <div class="w-24 h-24 rounded-full bg-accent/20 border-2 border-accent/30 overflow-hidden mb-5 mx-auto">

            <img @if ($hero && $hero['image']) src="{{ $hero['image'] }}" @endif alt="Firman Syahputra profile photo"
                class="w-full h-full object-cover" loading="lazy" width="96" height="96" />

        </div>


        <h1 class="text-2xl font-bold tracking-tight text-primaryText">{{ $hero['name'] ?? 'Firman Syahputra' }}</h1>
        <p class="text-sm font-medium text-accent/90 mt-0.5">{{ $hero['role'] ?? 'Fullstack Web Developer' }}</p>


        <p class="text-secondary-text text-sm leading-relaxed mt-3 max-w-xs">
            @php
                $summary = $hero['summary'] ?? '';
                $sentences = array_filter(array_map('trim', explode('.', $summary)));
            @endphp

            @foreach ($sentences as $sentence)
                <span class="inline-block">{{ $sentence }}.</span>
            @endforeach
        </p>

        <div class="mt-5 flex items-center gap-2">
            <button type="button" wire:click="changeLanguage('id')"
                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors
        {{ app()->getLocale() === 'id'
            ? 'bg-accent text-white'
            : 'text-secondary-text hover:text-accent border border-border' }}">
                ID
            </button>

            <button type="button" wire:click="changeLanguage('en')"
                class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors
        {{ app()->getLocale() === 'en'
            ? 'bg-accent text-white'
            : 'text-secondary-text hover:text-accent border border-border' }}">
                EN
            </button>
        </div>

        <nav aria-label="Main navigation" class="mt-6 border-t border-border pt-5 capitalize">
            <ul class="space-y-2.5 text-sm font-medium">
                <li><a href="#{{ __('about') }}"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors "><span
                            class="text-accent/70 text-xs">#</span> {{ __('about') }}</a></li>
                <li><a href="#{{ __('experiences') }}"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors "><span
                            class="text-accent/70 text-xs">#</span> {{ __('experiences') }}</a></li>
                <li><a href="#{{ __('projects') }}"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs ">#</span> {{ __('projects') }}</a></li>
                <li><a href="#{{ __('educations') }}"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors "><span
                            class="text-accent/70 text-xs">#</span> {{ __('educations') }}</a></li>
                <li><a href="#{{ __('skills') }}"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs ">#</span> {{ __('skills') }}</a></li>
                <li><a href="#{{ __('certificates') }}"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs ">#</span> {{ __('certificates') }}</a></li>
                <li><a href="#{{ __('contacts') }}"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs ">#</span> {{ __('contacts') }}</a></li>
            </ul>
        </nav>


        <div class="mt-6 pt-5 border-t border-border flex items-center gap-4 flex-wrap">

            @forelse ($contacts['platforms'] ?? [] as $contactItem)
                <a href="{{ $contactItem['url'] }}" target="_blank"
                    class="text-secondary-text hover:text-accent transition-colors text-sm">
                    <i class="{{ $contactItem['icon'] }}"></i>
                    {{ $contactItem['platform'] }}
                </a>
            @empty
                <span class="text-secondary-text">No contact data available.</span>
            @endforelse
        </div>


        <x-footer />
    </div>
</aside>
