<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true" @isset($static) data-bs-backdrop="static" data-bs-keyboard="false" @endisset>
    <div class="modal-dialog @isset($size) modal-{{ $size }} @endisset">
        @isset($form)
        <form class="modal-content" @isset($method) method="{{ $method }}" @endisset @isset($action) action="{{ $action }}" @endisset>
        @else
        <div class="modal-content">
        @endisset
            @isset($title)
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                @if(isset($attribute['hide-close-button']))
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                @endif
            </div>
            @endisset
            <div class="modal-body">
                {{ $slot }}
            </div>
            @isset($footer)
            <div class="modal-footer">
                {{ $footer }}
            </div>
            @endisset
        @isset($form)
        </form>
        @else
        </div>
        @endisset
    </div>
</div>
