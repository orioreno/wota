@php
if (isset($attributes['name']) && !isset($attributes['id'])) $attributes['id'] = $attributes['name'];
if (!$attributes['id']) $attributes['id'] = uniqid();
@endphp
<div class="form-check">
    <input {{ $attributes->merge(['type' => 'checkbox', 'class' => 'form-check-input']) }}>
    @isset($slot)
    <label class="form-check-label" @isset($attributes['id']) for="{{ $attributes['id'] }}" @endisset>
        {{ $slot }}
    </label>
    @endisset
</div>
