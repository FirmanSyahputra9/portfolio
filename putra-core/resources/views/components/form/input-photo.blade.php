@props([
    'model' => '',
    'photo' => null,
    'label' => '',
    'tempPhoto' => null,
    'accept' => 'image/*',
    'size' => 'w-32 h-32',
    'confirmAction' => null,
    'rounded' => 'rounded-full',
])

@php
    $label = "upload $label";
@endphp

<input wire:model.live="{{ $model }}" type="file"
    class="absolute inset-0 z-10 h-full w-full cursor-pointer opacity-0" accept="{{ $accept }}" />
@error($model)
    <x-form.error-input :message="$message" />
@enderror
<div class="relative {{ $size }} {{ $rounded }}  overflow-hidden shadow-md mb-3 border-2 border-slate-700">
    <img src="{{ $tempPhoto ? $tempPhoto->temporaryUrl() : asset(config('app.storage_path') . '/' . $photo) }}"
        class="w-full h-full object-cover" alt="Current Photo">
</div>
<p class="text-sm text-slate-300 font-medium">{{ $photo ? 'Change Photo' : 'Upload Photo' }}</p>

@if ($tempPhoto && !$tempPhoto->temporaryUrl())
    <div class="mt-4 flex items-center gap-2 text-sm text-cyan-400">
        <svg class="animate-spin h-5 w-5 text-cyan-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        <span>Uploading...</span>
    </div>
@endif
@if ($tempPhoto && $confirmAction)
    <button type="button" wire:click="{{ $confirmAction }}"
        class="relative z-50 mt-3 inline-flex items-center justify-center rounded-full bg-emerald-500 p-2 text-white shadow-lg transition hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-400/50"
        title="Use this photo">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    </button>
@endif
