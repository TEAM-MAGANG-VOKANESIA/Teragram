<x-auth.form-layout>
        <x-slot:linkTitle>Sudah punya akun?</x-slot:linkTitle>
        <x-slot:link>/</x-slot:link>
        <x-slot:linkAction>Login</x-slot:linkAction>
        <form class="w-64 flex flex-col gap-1 mt-8" method="post" action="{{ route('signup.post') }}">
            @csrf
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
            <button class="mt-2 text-sm text-center bg-blue-600 hover:bg-blue-400 text-white py-1 rounded-lg font-medium">Signup</button>
        </form>
</x-auth.form-layout>
