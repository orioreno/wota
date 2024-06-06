@php
if (!isset($attributes['type'])) $attributes['type'] = 'button';
@endphp
<button {{ $attributes->merge(['class' => 'btn'.($attributes['type'] == 'submit' ? ' btn-primary' : '')]) }}>
    {{ $slot }}
</button>
