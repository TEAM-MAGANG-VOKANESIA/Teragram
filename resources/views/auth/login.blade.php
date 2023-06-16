<x-auth.form-layout>
    <x-slot:routeName>
        signup.post
    </x-slot:routeName>
    <x-slot:button>
        Login
    </x-slot:button>
    <x-slot:linkTitle>
        Tidak punya akun?
    </x-slot:linkTitle>
    <x-slot:link>
        signup
    </x-slot:link>
    <x-slot:linkAction>
        Buat akun
    </x-slot:linkAction>
    <x-auth.form-component>
        <x-slot:name>email</x-slot>
            <x-slot:placeholder>Phone Number, username or email</x-slot>
                <x-slot:error>email</x-slot>
                    <x-slot:type>email</x-slot>
                        <x-slot:old>email</x-slot>
    </x-auth.form-component>
    @error('email')
        <p class="text-rose-600 text-xs">{{ $message }}</p>
    @enderror
    <x-auth.form-component>
        <x-slot:name>password</x-slot>
            <x-slot:placeholder>Password</x-slot>
                <x-slot:error>password</x-slot>
                    <x-slot:type>password</x-slot>
                        <x-slot:old>password</x-slot>
    </x-auth.form-component>
    @error('password')
        <p class="text-rose-600 text-xs">{{ $message }}</p>
    @enderror
</x-auth.form-layout>
