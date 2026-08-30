@props([
    'model' => '',
    'message' => '',
])

<div x-data="{ expanded: false, visible: true }" x-init="setTimeout(() => expanded = true, 150);
setTimeout(() => expanded = false, 4000);
setTimeout(() => visible = false, 4700);
setTimeout(() => $el.remove(), 5200);" x-show="visible" class="absolute top-0 right-2 z-50">
    <div class="overflow-hidden rounded-full bg-red-500/20 text-red-400 backdrop-blur-sm"
        :class="expanded ? 'max-w-[500px]' : 'max-w-8'"
        style="transition: max-width 700ms cubic-bezier(0.4, 0, 0.2, 1);">
        <span class="flex h-8 items-center gap-1 px-2 text-xs font-medium whitespace-nowrap">
            <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span x-show="expanded" x-transition:enter="transition-all ease-out duration-500 delay-200"
                x-transition:enter-start="opacity-0 translate-x-2" x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0 translate-x-2">
                {{ $message }}
            </span>
        </span>
    </div>
</div>
