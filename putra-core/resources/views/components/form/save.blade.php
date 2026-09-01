@props([
    'label' => '',
    'type' => 'submit',
    'name' => '',
    'wireClick' => null,
    'show' => true,
    'toggle' => false,
])


<div class="sticky top-0 z-10 mb-5 backdrop-blur-md p-2  rounded-2xl">

    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <x-form.svg-toggle :show="$show" :toggle="$toggle"  />
            <h2 class=" text-lg font-semibold flex items-center gap-2">
                <span class="text-accent">✦</span> {{ $label }}
            </h2>
        </div>
        <div class="flex items-center">
            <button type="{{ $type }}" @if ($wireClick) wire:click="{{ $wireClick }}" @endif
                wire:loading.attr="disabled"
                class="bg-accent/20 hover:bg-accent/30 text-accent px-5 py-2 rounded-full text-sm font-medium transition-all border border-accent/20 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer">
                {{ $name }}
            </button>
        </div>
    </div>
</div>
