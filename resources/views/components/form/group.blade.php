<div class="mb-3">
    @isset($label)
    <label @isset($name) for="{{ $name }}" @endisset class="form-label">{{ $label }}</label>
    @endisset
    {{ $slot }}
    @isset($subtext)
    <div class="form-text">{{ $subtext }}</div>
    @endisset
    @if (isset($name) && $errors->has($name))
    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
    @endif
</div>
