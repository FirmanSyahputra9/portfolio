@props([
    'label' => '',
    'type' => 'text',
    'model' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'maxlength' => null,
    'rules' => [],
    'p' => 'px-4 py-2.5',
    'disabled' => false,
    'labelClass' => '',
    'modelType' => null,
])
@php
    preg_match('/max:(\d+)/', $rules[$model] ?? '', $matches);
    $maxLength = $matches[1] ?? null;

    // dd($disabled ? 'disabled' : '');

@endphp


<label for="{{ $model }}"
    class="block text-xs font-medium text-secondary-text/70 {{ $labelClass }}">{{ $label }}</label>
<div class="relative input-focus bg-surface border border-border rounded-lg overflow-hidden">
    <input id="{{ $model }}" type="{{ $type }}"
        @if ($modelType) wire:model.live="{{ $model }}" @else wire:model="{{ $model }}" @endif
        name="{{ $name }}" {{ $disabled ? 'disabled' : '' }} value="{{ $value }}"
        placeholder="{{ $placeholder }}" @if ($maxLength) maxlength="{{ $maxLength }}" @endif
        class="w-full bg-transparent {{ $p }} text-sm text-primary-text outline-none" />

    @if ($maxLength)
        <div class="absolute top-1/2 right-3 -translate-y-1/2 text-xs text-secondary-text/50">
            <span x-text="$wire.{{ $model }}?.length ?? 0"></span>/{{ $maxLength }}
        </div>
    @endif

    @error($model)
        <x-form.error-input :message="$message" />
    @enderror
</div>
