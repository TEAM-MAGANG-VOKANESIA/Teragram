<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/58956920f1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="h-screen bg-gray-100 flex flex-col justify-center items-center">
        <div class="bg-white mb-3 border border-gray-300 w-80 pt-8 pb-4 flex flex-col items-center">
            <img src="{{ asset('assets/images/teragram.png') }}" width="150px" height="150px" alt="teragram">

            {{-- ADD EMAIL & PASSWORD FOR LOGIN TERAGRAM --}}
            <form class="w-64 flex flex-col gap-1 mt-8" method="post" action="{{ route('signup.post') }}">
                @csrf
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

                {{-- LOGIN TERAGRAM --}}
                <button
                    class="mt-2 text-sm text-center bg-blue-600 hover:bg-blue-400 text-white py-1 rounded-lg font-medium">Sign
                    up</button>
                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-64 h-px my-5 bg-gray-200 border-0 dark:bg-gray-500">
                    <span
                        class="absolute px-3 font-medium text-xs text-gray-500 -translate-x-1/2 bg-white left-1/2">OR</span>
                </div>

                {{-- LOGIN WITH FACEBOOK --}}
                <a href="#" class="text-xs font-medium text-blue-600 ml-2 text-center"><i
                        class="fa-brands fa-facebook mr-1" style="color: #0c5ddf;"></i>Login With Facebook</a>
        </div>

        {{-- CREATE ACCOUNT --}}
        <div class="bg-white border border-gray-300 w-80 h-4 pt-6 pb-8 flex flex-col items-center">
            <h1 class="text-center text-xs font-medium mb-2">
                Sudah punya akun?<a href="/" class="text-xs font-medium text-blue-700 ml-1 mb-2">Login</a>
            </h1>
        </div>
</body>

</html>
