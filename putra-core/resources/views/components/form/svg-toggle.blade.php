@props(['toggle' => true, 'show' => false, 'toggleFunc' => 'toggle'])




@if ($toggle && $show)
    <button type="button" wire:click="{{ $toggleFunc }}" wire:loading.attr="disabled"
        class="flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>
@else
    <button type="button" wire:click="{{ $toggleFunc }}" wire:loading.attr="disabled"
        class="flex items-center justify-center">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>
@endif
