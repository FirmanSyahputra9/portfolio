@props([
    'btnFunc' => null,
    'label' => '',
    'class' => '',
    'action' => 'store',
])

@php
    $baseClass = 'w-[150px] px-5 py-2 rounded-full text-sm font-medium transition-all';

    if ($action == 'store' && $class == '') {
        $class = $baseClass . ' bg-accent/20 hover:bg-accent/30 text-accent border border-accent/20';
    }

    if ($action == 'delete' && $class == '') {
        $class = $baseClass . ' bg-red-500 hover:bg-red-600 text-white';
    }
@endphp


<button type="button" wire:click="{{ $btnFunc }}" class="{{ $class }}">
    {{ $label }}
</button>
