@php $attributes['id'] = $name; @endphp
<x-form.group :label="$attributes['label'] ?? ''"  :subtext="$attributes['subtext'] ?? ''" :for="$attributes['id'] ?? ''">
    @php if(isset($attributes['label'])) unset($attributes['label']) @endphp
    @php if(isset($attributes['subtext'])) unset($attributes['subtext']) @endphp
    @php
    if(isset($attributes['value'])) {
        $value = $attributes['value'];
        unset($attributes['value']);
    }
    @endphp
    <textarea {{ $attributes->merge(['class' => 'form-control']) }}>{{ $value ?? '' }}</textarea>
</x-form.group>
