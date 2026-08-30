@props(['label', 'href'])

<a href="{{ $href }}" target="_blank" rel="noopener noreferrer"
    class="text-sm text-secondary-text hover:text-accent transition-colors">
    {{ $label }}
</a>
