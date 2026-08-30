@props([
    'label' => '',
    'model' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'rules' => [],
    'p' => 'px-4 py-2.5',
    'disabled' => false,
    'labelClass' => '',
])

@php
    preg_match('/max:(\d+)/', $rules[$model] ?? '', $matches);
    $maxLength = $matches[1] ?? null;
@endphp

<label for="{{ $model }}" class="block text-xs font-medium text-secondary-text/70 {{ $labelClass }}">
    {{ $label }}
</label>

<div class="relative input-focus bg-surface border border-border rounded-lg overflow-hidden">

    <select id="{{ $model }}" wire:model="{{ $model }}" name="{{ $name }}"
        {{ $disabled ? 'disabled' : '' }}
        class="w-full appearance-none bg-transparent {{ $p }} pr-10 text-sm text-primary-text outline-none cursor-pointer">
        @if ($placeholder)
            <option value="">
                {{ $placeholder }}
            </option>
        @endif

        {{ $slot }}
    </select>

    {{-- Arrow --}}
    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
        <svg class="w-4 h-4 text-secondary-text/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6" />
        </svg>
    </div>

    @error($model)
        <x-form.error-input :message="$message" />
    @enderror
</div>
