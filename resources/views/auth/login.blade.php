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

<body class="bg-gray-100 mt-16">
    <div class="h-screen bg-gray-100 flex flex-col justify-center items-center">
        <div class="bg-white mb-3 border border-gray-300 w-80 pt-8 pb-4 flex flex-col items-center">
            <img src="teragram.png" width="150px" height="150px" alt="teragram">

            {{-- ADD EMAIL & PASSWORD FOR LOGIN TERAGRAM --}}
            <form class="w-64 flex flex-col gap-1 mt-8">
                <div class="relative">
                    <input type="text" class="peer w-full border bg-gray-100 p-2 text-xs placeholder-transparent"
                        placeholder="Phone Number, username or email">
                    <label
                        class="absolute
                            transition-all
                            left-2
                            top-0
                            text-gray-400
                            text-xxs
                            peer-placeholder-shown:text-xs
                            peer-placeholder-shown:top-2
                            pointer-events-none">Phone
                        Number, username or email</label>
                </div>
                <div class="relative">
                    <input type="password" class="peer w-full border bg-gray-100 p-2 text-xs placeholder-transparent"
                        placeholder="Password">
                    <label
                        class="absolute
                            transition-all
                            left-2
                            top-0
                            text-gray-400
                            text-xxs
                            peer-placeholder-shown:text-xs
                            peer-placeholder-shown:top-2
                            pointer-events-none">Password</label>
                    <button
                        class="absolute
                            right-2
                            bottom-2
                            focus:text-gray-500 rounded text-sm font-semibold">show</button>
                </div>

                {{-- LOGIN TERAGRAM --}}
                <a href=""
                    class="mt-2 text-sm text-center bg-blue-600 hover:bg-blue-400 text-white py-1 rounded-lg font-medium">Login</a>
                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-64 h-px my-5 bg-gray-200 border-0 dark:bg-gray-500">
                    <span
                        class="absolute px-3 font-medium text-xs text-gray-500 -translate-x-1/2 bg-white left-1/2">OR</span>
                </div>

                {{-- LOGIN WITH FACEBOOK --}}
                <a href="#" class="text-xs font-medium text-blue-800 ml-2 text-center"><i
                        class="fa-brands fa-square-facebook" style="color: #153e84;"></i>Login With Facebook</a>

                {{-- FORGOT PASSWORD --}}
                <div class="mt-3 text-center">
                    <a href="#" class="text-gray-950 text-xs text-center">Forgot Password?</a>
                </div>
        </div>

        {{-- CREATE ACCOUNT --}}
        <div class="bg-white border border-gray-300 w-80 h-4 pt-6 pb-8 flex flex-col items-center">
            <h1 class="text-center text-xs font-medium mb-2">
                Tidak Punya Akun?<a href="#" class="text-xs font-medium text-blue-700 ml-1 mb-2">Buat Akun</a>
            </h1>
        </div>
        <div class="flex flex-col items center mt-4">
            <h1 class="text-medium text-sm">Dapatkan Aplikasi</h1>
        </div>
        {{-- LOGO GOOGLE PLAY & MICROSOFTt --}}
        <div class="inline flex-wrap mt-4">
            <img src="logostore.png" width="300" height="300" alt="logostore" />
        </div>

        {{-- FOOTER --}}
        <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
            <nav class="flex flex-wrap justify-center">
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Meta
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        About
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Blog
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Jobs
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Help
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        API
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Privacy
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Terms
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Top Accounts
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Locations
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Instagram Lite
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Contact Uploading & Non-Users
                    </a>
                </div>
                <div class="px-5 py-2">
                    <a href="#" class="text-xs leading-6 text-gray-500 hover:text-gray-900">
                        Meta Verified
                    </a>
                </div>
            </nav>
        </div>

        <div class="-mt-12 -ml-12 p-12 lg:sticky lg:top-4 lg:col-start-2">
        <select id="countries" class="text-xs bg-gray-100">
            <option selected>Choose a language</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
        </select>
        <span class="text-xs bg-gray-100">© 2023 Instagram from Meta</span>
        </div>
    </div>

</body>

</html>
