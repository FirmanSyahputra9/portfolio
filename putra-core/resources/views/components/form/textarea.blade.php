@props([
    'label' => '',
    'model' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'rules' => [],
])
@php
    preg_match('/max:(\d+)/', $rules[$model] ?? '', $matches);
    $maxLength = $matches[1] ?? null;
@endphp

<label class="block text-xs font-medium text-secondary-text/70">{{ $label }}</label>
<div x-data="{ length: {{ strlen($value ?? '') }} }" class="relative">
    <textarea wire:model.live="{{ $model }}" name="{{ $name }}" maxlength="{{ $maxLength }}"
        x-on:input="length = $event.target.value.length"
        class="w-full bg-surface border border-border rounded-lg  px-4 py-2.5 pr-20 text-sm text-primary-text outline-none"
        placeholder="{{ $placeholder }}">{{ $value }}</textarea>

    @if ($maxLength)
        <div class="absolute top-1/2 right-3 -translate-y-1/2 text-xs text-secondary-text/50">
            <span x-text="$wire.{{ $model }}?.length ?? 0"></span>/{{ $maxLength }}
        </div>
    @endif

    @error($model)
        <x-form.error-input :message="$message" />
    @enderror
</div>
