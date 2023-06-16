<x-auth.form-layout>
    @csrf
    <x-slot:routeName>
        signup.post
    </x-slot:routeName>
    <x-slot:button>
        Sigup
    </x-slot:button>
    <x-slot:linkTitle>
        Sudah punya akun?
    </x-slot:linkTitle>
    <x-slot:link>
        /
    </x-slot:link>
    <x-slot:linkAction>
        Login
    </x-slot:linkAction>
    <div class="relative">
        <x-auth.form-component>
            <x-slot:name>name</x-slot>
                <x-slot:placeholder>Username</x-slot>
                    <x-slot:error>name</x-slot>
                        <x-slot:type>text</x-slot>
                            <x-slot:old>name</x-slot>
        </x-auth.form-component>
        @error('name')
            <p class="text-rose-600 text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="relative">
        <x-auth.form-component>
            <x-slot:name>email</x-slot>
                <x-slot:placeholder>Email</x-slot>
                    <x-slot:error>email</x-slot>
                        <x-slot:type>email</x-slot>
                            <x-slot:old>email</x-slot>
        </x-auth.form-component>
        @error('email')
            <p class="text-rose-600 text-xs">{{ $message }}</p>
        @enderror
    </div>
    <div class="relative">
        <x-auth.form-component>
            <x-slot:name>password</x-slot>
                <x-slot:placeholder>Password </x-slot>
                    <x-slot:error>password</x-slot>
                        <x-slot:type>password</x-slot>
                            <x-slot:old>password</x-slot>
        </x-auth.form-component>
        @error('password')
            <p class="text-rose-600 text-xs">{{ $message }}</p>
        @enderror
    </div>
</x-auth.form-layout>
