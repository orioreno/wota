@php $request = request(); @endphp
<th>
    <a class="link-body-emphasis text-decoration-none" href="{{ $request->fullUrlWithQuery([
    'sortby' => $name,
    'sortdir' => $request->sortby == $name && $request->sortdir == 'asc' ? 'desc' : 'asc'
    ]) }}">
        {{ $slot }}
        <span class="ms-1">
            @if ($request->sortby == $name)
                <i class="fa {{ $request->sortdir == 'desc' ? 'fa-sort-up' : 'fa-sort-down' }}"></i>
            @else
                <i class="fa fa-sort opacity-25"></i>
            @endif
        </span>
    </a>
</th>
