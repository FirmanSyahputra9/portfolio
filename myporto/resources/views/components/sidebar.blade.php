<aside class="lg:sticky lg:top-6 lg:self-start lg:w-[300px] xl:w-[340px] flex-shrink-0">
    <div class="bg-surface/80 backdrop-blur-sm rounded-2xl p-6 border border-border shadow-xl ">
        <!-- Profile photo -->
        <div class="w-24 h-24 rounded-full bg-accent/20 border-2 border-accent/30 overflow-hidden mb-5 mx-auto">

            <img src="{{ $hero['image'] }}" alt="Firman Syahputra profile photo" class="w-full h-full object-cover"
                loading="lazy" width="96" height="96" />
        </div>

        <!-- Name & role -->
        <h1 class="text-2xl font-bold tracking-tight text-primaryText">{{ $hero['name'] }}</h1>
        <p class="text-sm font-medium text-accent/90 mt-0.5">{{ $hero['role'] }}</p>

        <!-- short description -->
        <p class="text-secondary-text text-sm leading-relaxed mt-3 max-w-xs">
            {{ $hero['summary'] }}
        </p>

        <!-- Navigation (anchor links) -->
        <nav aria-label="Main navigation" class="mt-6 border-t border-border pt-5">
            <ul class="space-y-2.5 text-sm font-medium">
                <li><a href="#about"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs">#</span> About</a></li>
                <li><a href="#experience"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs">#</span> Experience</a></li>
                <li><a href="#projects"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs">#</span> Projects</a></li>
                <li><a href="#skills"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs">#</span> Skills</a></li>
                <li><a href="#certificates"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs">#</span> Certificates</a></li>
                <li><a href="#contacts"
                        class="nav-link flex items-center gap-2 text-secondary-text hover:text-accent transition-colors"><span
                            class="text-accent/70 text-xs">#</span> Contact</a></li>
            </ul>
        </nav>

        <!-- Social & email (simple) -->
        <div class="mt-6 pt-5 border-t border-border flex items-center gap-4 flex-wrap">

            @forelse ($contacts['platforms'] as $contactItem)
                <a href="{{ $contactItem['url'] }}" target="_blank"
                    class="text-secondary-text hover:text-accent transition-colors text-sm">
                    <i class="{{ $contactItem['icon'] }}"></i>
                    {{ $contactItem['platform'] }}
                </a>
            @empty
                <span class="text-secondary-text">No contact data available.</span>
            @endforelse
        </div>

        <!-- Footer kecil -->
        <x-footer />
    </div>
</aside>
