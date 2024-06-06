@php $attributes['id'] = $name; @endphp
<x-form.group :label="$attributes['label'] ?? ''"  :subtext="$attributes['subtext'] ?? ''" :name="$name">
    @php
    if(isset($attributes['label'])) unset($attributes['label']);
    if(isset($attributes['subtext'])) unset($attributes['subtext']);
    $options = [];
    if(isset($attributes['options'])) {
        $options = $attributes['options'];
        unset($attributes['options']);
    }
    $value = [];
    if(isset($attributes['value'])) {
        $value = is_array($attributes['value']) ? $attributes['value'] : [$attributes['value']];
        unset($attributes['value']);
    }
    @endphp
    <select {{ $attributes->merge(['class' => 'selectpicker', 'data-live-search' => true]) }}>
        @foreach($options as $option_value => $option_text)
        <option value="{{ $option_value }}" @if(in_array($option_value, $value)) selected @endif>{{ $option_text }}</option>
        @endforeach
    </select>
</x-form.group>
