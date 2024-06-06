<x-layout.guest>
    <x-card class="col-10 col-sm-6 col-md-5 col-lg-4" icon="sign-in" title="Sign in">
        <form method="POST">
            @csrf
            <x-form.input type="email" name="email" label="Email" required></x-form.input>
            <x-form.input type="password" name="password" label="Password" required></x-form.input>
            <x-form.group>
                <a href="{{ route('forgot_password') }}">Forgot password?</a>
            </x-form.group>
            <x-form.action>
                <x-form.button type="submit" class="w-100 mb-3">Sign In</x-form.button>
            </x-form.action>
        </form>
    </x-card>
</x-layout.guest>
