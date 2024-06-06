@php
$attributes['id'] = $name;
if (!isset($attributes['type'])) $attributes['type'] = 'text';
@endphp
<x-form.group :label="$attributes['label'] ?? ''"  :subtext="$attributes['subtext'] ?? ''" :name="$name">
    @php if(isset($attributes['label'])) unset($attributes['label']) @endphp
    @php if(isset($attributes['subtext'])) unset($attributes['subtext']) @endphp
    <input {{ $attributes->merge(['class' => 'form-control']) }}>
</x-form.group>
