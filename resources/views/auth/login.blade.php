<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-2 space-y-4 md:space-y-6 sm:p-8">
                    <div>                          
                        <img src="logo-teragram.png" width="200" alt="" class="text-center">
                        <h2 class="text-center">Zidan</h2>
                    </div>
                    <form class="space-y-4 md:space-y-6" action="{{ url('login-proses') }}" method="post">
                        @csrf
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium text-gray-900"></label>
                            <input autofocus type="email" name="email" id="email" value="{{ Session::get('email') }}" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm  focus:border-black block w-full p-2.5  @error('username') is-invalid @enderror" placeholder="Nomor telepon, nama pengguna, atau email" required="">
                            @error('email')
                                <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</div>
                            @enderror
                           
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900"></label>
                            <input type="password" name="password" id="password" placeholder="Kata Sandi" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm  block w-full p-2.5 @error('password') is-invalid @enderror" required="">
                            @error('password')
                                <div class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                  <label for="remember" class="text-gray-500 dark:text-gray-300 font">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600">Sign in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-50">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
     

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>