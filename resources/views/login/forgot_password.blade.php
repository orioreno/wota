<x-layout.guest>
    <x-card class="col-10 col-sm-6 col-md-5 col-lg-4" icon="key" title="Forgot password">
        <form method="POST">
            @csrf
            <x-form.input type="email" name="email" label="Enter your email address" required></x-form.input>
            <x-form.group>
                <a href="{{ route('login') }}">Back to login page</a>
            </x-form.group>
            <x-form.action>
                <x-form.button type="submit" class="w-100">Send password reset link</x-form.button>
            </x-form.action>
        </form>
    </x-card>
</x-layout.guest>
