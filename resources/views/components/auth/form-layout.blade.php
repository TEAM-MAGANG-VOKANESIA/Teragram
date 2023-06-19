<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teragram</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/58956920f1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="h-screen bg-gray-100 flex flex-col justify-center items-center">
        <div class="bg-white mb-3 border border-gray-300 w-80 pt-8 pb-4 flex flex-col items-center">
            <img src="{{ asset('assets/images/teragram.png') }}" width="150px" height="150px" alt="teragram">
            {{ $slot }}
            {{-- LOGIN TERAGRAM --}}
            <div class="inline-flex items-center justify-center w-full">
                <hr class="w-64 h-px my-5 bg-gray-200 border-0 dark:bg-gray-500">
                <span
                    class="absolute px-3 font-medium text-xs text-gray-500 -translate-x-1/2 bg-white left-1/2">OR</span>
            </div>

            {{-- LOGIN WITH FACEBOOK --}}
            <a href="#" class="text-xs font-medium text-blue-600 ml-2 text-center"><i
                    class="fa-brands fa-facebook mr-1" style="color: #0c5ddf;"></i>Login With Facebook</a>

            {{-- FORGOT PASSWORD --}}
            <div class="mt-3 text-center">
                <a href="#" class="text-gray-950 text-xs text-center">Forgot Password?</a>
            </div>
        </div>
        {{-- CREATE ACCOUNT --}}
        <div class="bg-white border border-gray-300 w-80 p-4 flex items-center justify-center">
            <h1 class="text-center text-xs font-medium">
                {{ $linkTitle }}<a href="{{ $link }}"
                    class="text-xs font-medium text-blue-700 ml-1 mb-2">{{ $linkAction }}</a>
            </h1>
        </div>
        <div class="flex flex-col items center mt-4">
            <h1 class="text-medium text-sm">Dapatkan Aplikasi</h1>
        </div>

        {{-- LOGO GOOGLE PLAY & MICROSOFT --}}
    </div>
</body>

</html>
