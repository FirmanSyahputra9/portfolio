<section id="certificates" class="section-anchor min-h-[calc(100vh-4rem)]">
    <h2 class="text-2xl font-bold tracking-tight mb-6 flex items-center gap-3">
        <span class="text-accent text-2xl">/</span> Certificates
    </h2>
    <div class="space-y-6">
        @forelse ($certificates as $certificate)
            <article class="bg-card/40 border border-border rounded-xl p-5 hover:bg-card/70 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-start gap-2 sm:gap-6">

                    <span class="text-xs font-mono text-secondary-text/60 whitespace-nowrap">
                        {{ $certificate['issued_date'] }}
                    </span>

                    <div class="flex-1">
                        <div class="flex justify-between w-full">

                            <h3 class="text-lg font-semibold leading-tight">
                                {{ $certificate['title'] }}
                            </h3>

                            <a href="{{ $certificate['credential_url'] }}" target="_blank"
                                class="inline-block bg-accent/20 hover:bg-accent/30 text-accent font-medium px-6 py-2.5 rounded-full border border-accent/20 transition-all text-sm">Cek</a>
                        </div>

                        <p class="text-accent/80 text-sm font-medium">
                            {{ $certificate['issuer'] }} · ID : {{ $certificate['credential_id'] }}
                        </p>

                        <p class="text-secondary-text text-sm leading-relaxed mt-2 max-w-2xl">
                            {{ $certificate['description'] }}
                        </p>

                        <div class="flex flex-wrap gap-1.5 mt-2.5">
                            @foreach ($certificate['technologies'] as $technology)
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
        @endforelse
    </div>
</section>
