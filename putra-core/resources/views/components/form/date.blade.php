@props([
    'label' => '',
    'type' => 'date',
    'model' => '',
    'name' => '',
    'value' => '',
    'placeholder' => '',
    'min' => 'null',
    'max' => null,
    'maxlength' => null,
    'rules' => [],
    'p' => 'px-4 py-2.5',
    'disabled' => false,
    'labelClass' => ''
])


<label class="block text-xs {{ $labelClass }} font-medium text-secondary-text/70">{{ $label }}</label>
<div class="relative input-focus bg-surface border border-border rounded-lg overflow-hidden">
    <input type="{{ $type }}" @if ($model) wire:model.live="{{ $model }}" @endif
        name="{{ $name }}" min="{{ $min }}" max="{{ $max }}"
        class="w-full bg-transparent px-4 py-2.5 text-sm text-primary-text outline-none" />

    @error($model)
        <x-form.error-input :message="$message" />
    @enderror
</div>
