<x-card icon="filter" class="mb-3">
    <form>
        {{ $slot }}
        <x-form.action>
            <x-form.button type="submit" class="btn-secondary">Apply filter</x-form.button>
        </x-form.action>
        @isset(request()->sortby)
        <input type="hidden" name="sortby" value="{{ request()->sortby }}">
        @endisset
        @isset(request()->sortdir)
        <input type="hidden" name="sortdir" value="{{ request()->sortdir }}">
        @endisset
    </form>
</x-card>
