<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Teragram</title>
</head>

<body>
    <x-landing.homepage.sidebar>
        {{-- Main Content --}}
        <div class="md:w-5/6">
            {{-- Navbar --}}
            <nav class="p-4 border-b shadow-md border-gray-300">
                <div class="flex items-center justify-between">
                    <input type="text" class="border p-2 rounded-lg shadow-md" placeholder="Search">
                    <div class="flex items-center border p-2 rounded-full shadow-md hidden md:flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <p>Create New Post</p>
                    </div>
                    <div class="border p-3 rounded-full shadow-md md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                        </svg>
                    </div>
                </div>
            </nav>
            <div class="p-8 bg-[#f2f2f2]}">
                {{-- Stories --}}
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-xl">Stories</h1>
                        <div class="flex items-center space-x-2">
                            <h2>Next</h2>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex space-x-8 text-center">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-16 h-16 border-2 border-[#ff00e5] rounded-full mx-auto shadow-md mb-2 p-4 bg-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <p class="text-xs">Add story</p>
                        </div>
                        <div>
                            <img class="w-16 h-16 mb-2 rounded-full object-cover border-2 border-[#ff00e5] shadow-xl"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzHQv_th9wq3ivQ1CVk7UZRxhbPq64oQrg5Q&usqp=CAU"
                                alt="">
                            <p class="text-xs">itsMendax</p>
                        </div>
                        <div>
                            <img class="w-16 h-16 mb-2 rounded-full object-cover border-2 border-[#ff00e5] shadow-xl"
                                src="" alt="not found">
                            <p class="text-xs">JadenSmith</p>
                        </div>
                        <div>
                            <img class="w-16 h-16 mb-2 rounded-full object-cover border-2 border-[#ff00e5] shadow-xl"
                                src="https://marketplace.canva.com/EAE8zj3M8P8/1/0/1600w/canva-pink-and-maroon-modern-illustrated-japan-influencer-twitch-logo-gvo_hbtMHKI.jpg"
                                alt="">
                            <p class="text-xs">justaMix</p>
                        </div>
                    </div>
                </div>

                {{-- Feeds --}}
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl">Feeds</h1>
                    <div class="flex items-center space-x-2">
                        <div class="border rounded-full p-1 pl-4 pr-4 bg-gray-100 drop-shadow">Latest</div>
                        <div class="border rounded-full p-1 pl-4 pr-4 bg-gray-100 drop-shadow">Popular</div>
                    </div>
                </div>

                {{-- Content --}}
                {{ $slot }}
            </div>
        </div>
    </x-landing.homepage.sidebar>
</body>

</html>
