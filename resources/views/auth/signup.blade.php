<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/58956920f1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="h-screen bg-gray-100 flex flex-col justify-center items-center">
        <div class="bg-white mb-3 border border-gray w-80 pt-8 pb-4 flex flex-col items-center">
            <img src="{{ asset('assets/images/teragram.png') }}" width="150px" height="150px" alt="teragram">
            <a href="#" class="text-xs font-medium text-blue-600 ml-2 text-center"><i class="fa-brands fa-facebook mr-1"
                style="color:#0c5ddf;">Login With Facebook</i></a>

            {{-- SIGN UP EMAIL AND PASSWORD FOR SIGN UP TERAGRAM --}}
            <form class="w-64 flex flex-col gap-1 mt-8" method="post" action="{{ route('signup') }}">
                @csrf
                <div class="relative">
                    <input type="text" class="email"
                        class="peer w-full border bg-gray-100 p-2 text-xs placeholder-transparent"
                        placeholder="Phone Number, username or email">
                    <label
                        class="absolute
                            transition-all
                            left-2
                            top-0
                            text-gray-400
                            text-xxs
                            peer-placholder"></label>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
