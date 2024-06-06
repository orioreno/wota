@php
if (isset($attributes['icon'])) {
    $icon = $attributes['icon'];
    unset($attributes['icon']);
}
if (isset($attributes['title'])) {
    $title = $attributes['title'];
    unset($attributes['title']);
}
@endphp
<div {{ $attributes->merge(['class' => 'card']) }}>
    @isset($icon)
    <div class="card-header fs-4">
        <i class="fa fa-{{ $icon }}"></i>
    </div>
    @endisset
    <div class="card-body">
        <div class="d-flex justify-content-between">
            @isset($title)
            <h3 class="mb-4">
                {{ $title }}
            </h3>
            @endisset
            @isset($action)
            <div>
                {{ $action }}
            </div>
            @endisset
        </div>

        {{ $slot }}
    </div>
</div>
