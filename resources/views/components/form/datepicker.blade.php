@php
$attributes['id'] = $name;
if (!isset($attributes['type'])) $attributes['type'] = 'date';
if (isset($attributes['type'])) {
    if ($attributes['type'] == 'date') {
        $options['localization']['format'] = 'L';
        $options['display']['components']['hours'] = false;
        $options['display']['components']['minutes'] = false;
        $options['display']['components']['seconds'] = false;
    } else if ($attributes['type'] == 'time') {
        $options['localization']['format'] = 'LT';
        $options['display']['viewMode'] = 'clock';
        $options['display']['components']['decades'] = false;
        $options['display']['components']['year'] = false;
        $options['display']['components']['month'] = false;
        $options['display']['components']['date'] = false;
        $options['display']['components']['hours'] = false;
        $options['display']['components']['minutes'] = false;
    }
    unset($attributes['type']);
}
@endphp
<x-form.input {{ $attributes->merge(['class' => 'form-control', 'type' => 'text']) }}></x-form.input>

@push('scripts')
<script>
    datepickers['{{ $name }}'] = new tempusDominus.TempusDominus(document.getElementById('{{ $name }}'), @php echo json_encode($options) @endphp);
</script>
@endpush
