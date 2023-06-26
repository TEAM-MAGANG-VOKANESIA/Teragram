<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Teragram</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="flex h-screen">
        {{-- Sidebar --}}
        <div class="w-[250px] h-screen border-r-2 border-gray-200 hidden lg:block fixed bg-white top-0">
            {{-- Logo --}}
            <div class="mt-3">
                <a href="/">
                    <img src="{{ asset('assets/images/teragram.png') }}" alt="Logo Teragram"
                        class="w-[160px] h-[80px] mx-auto">
                </a>
            </div>

            {{-- Profile --}}
            <div class="mt-6 text-center">
                {{-- Profile Picture --}}
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6CUfQ9uPaBGxqoYL1r0_gWoH0aELe86-XaQ&usqp=CAU"
                    alt="Profile Image"
                    class="w-[90px] h-[90px] border-[#ff00e5] border-2 rounded-full mx-auto object-cover">
                {{-- Profile Name --}}
                <p class="font-bold text-lg">Metaverse5694</p>
                <p class="text-base">{{ Auth::user()->email }}</p>
            </div>

            {{-- Statistic --}}
            <div class="flex justify-center text-xs text-center space-x-2 font-bold mt-5">
                <div>
                    <div>3</div>
                    <div>POST</div>
                </div>
                <div>
                    <div>333</div>
                    <div>FOLLOWING</div>
                </div>
                <div>
                    <div>333</div>
                    <div>FOLLOWER</div>
                </div>
            </div>

            <hr class="w-full h-px my-5 bg-gray-300  dark:bg-gray-500">

            <div class="flex justify-center">
                <ul class="text-xl space-y-5 relative">
                    <li class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <a href="/">Home</a>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                        <a href="/explore">
                            Explore
                        </a>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                        </svg>
                        <button id="notificationButton">
                            <a>
                                Notification
                            </a>
                        </button>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                        <a href="/message">
                            Message
                        </a>
                    </li>
                    <li class="flex items-center space-x-4 space-y-5">
                        <div class="inline-block text-left">
                            <ul class="absolute bg-white w-max shadow-2xl rounded-xl hidden border top-0"
                                id="moreMenus">
                                <a href="/settings">
                                    <li
                                        class="p-2 text-sm rounded-xl hover:bg-gray-100 w-full flex items-center space-x-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <h1>Settings</h1>
                                    </li>
                                    <li
                                        class="p-2 text-sm rounded-xl hover:bg-gray-100 w-full flex items-center space-x-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h1>Your activity</h1>
                                    </li>
                                    <li
                                        class="p-2 text-sm rounded-xl hover:bg-gray-100 w-full flex items-center space-x-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                        </svg>
                                        <h1>Saved</h1>
                                    </li>
                                    <li
                                        class="p-2 text-sm rounded-xl hover:bg-gray-100 w-full flex items-center space-x-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                        </svg>
                                        <h1>Switch apperiance</h1>
                                    </li>
                                    <li
                                        class="p-2 text-sm rounded-xl hover:bg-gray-100 w-full flex items-center space-x-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                        <h1>Report a problem</h1>
                                    </li>
                                </a>
                            </ul>
                            <button type="button" id="moreButton" class="flex items-center space-x-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                </svg>
                                <a>
                                    More
                                </a>
                            </button>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        {{-- Notifications --}}
        <div id="notificationMenu" class="w-[529px] h-[844px] fixed ml-[250px] overflow-y-auto hidden">
            <div class="w-[529px] h-[832px] left-0 top-0 absolute bg-neutral-50 shadow"></div>
            <div class="w-[360px] h-[52px] left-[27px] top-[28px] absolute text-black text-[32px] font-bold">
                Notifications</div>
            <div class="w-[98px] h-[30px] left-[27px] top-[100px] absolute text-black text-[26px] font-semibold">Today
            </div>
            <div class="w-[159px] h-[30px] left-[28px] top-[405px] absolute text-black text-[26px] font-semibold">This
                week</div>
            <img class="w-16 h-16 left-[27px] top-[147px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <img class="w-16 h-16 left-[28px] top-[452px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <img class="w-16 h-16 left-[28px] top-[616px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <img class="w-16 h-16 left-[28px] top-[698px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <img class="w-16 h-16 left-[28px] top-[780px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <img class="w-16 h-16 left-[28px] top-[534px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <img class="w-16 h-16 left-[27px] top-[227px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <img class="w-16 h-16 left-[27px] top-[307px] absolute rounded-full shadow"
                src="https://via.placeholder.com/64x64" />
            <div class="w-[94px] h-[19px] left-[109px] top-[167px] absolute text-black text-[18px] font-semibold">Zor0_
            </div>
            <div class="w-[94px] h-[19px] left-[110px] top-[472px] absolute text-black text-[18px] font-semibold">lord_
            </div>
            <div class="w-[94px] h-[19px] left-[109px] top-[636px] absolute text-black text-[18px] font-semibold">mane
            </div>
            <div class="w-[531px] h-[0px] border border-white"></div>
            <div class="w-[232px] h-11 left-[110px] top-[706px] absolute"><span
                    style="text-black text-[18px] font-semibold">LoRdenemy </span><span
                    style="text-black text-[18px] font-normal">Started following you. 1w</span></div>
            <div class="w-[94px] h-[19px] left-[110px] top-[800px] absolute text-black text-[18px] font-semibold">lord_
            </div>
            <div class="w-[238px] h-11 left-[110px] top-[544px] absolute"><span
                    style="text-black text-[18px] font-semibold">Ek--y </span><span
                    style="text-black text-[18px] font-normal">Mentioned you in comment: </span><span
                    style="text-sky-300 text-[18px] font-normal">@aghtnzz</span><span
                    style="text-black text-[18px] font-normal"> hahah</span></div>
            <div class="w-[94px] h-[19px] left-[109px] top-[247px] absolute text-black text-[18px] font-semibold">hArk0
            </div>
            <div class="w-[94px] h-[19px] left-[109px] top-[327px] absolute text-black text-[18px] font-semibold">Hanz_
            </div>
            <div class="w-[173px] h-[26px] left-[169px] top-[167px] absolute text-black text-[18px] font-normal">
                Started following you. 2h</div>
            <div class="w-[177px] h-[26px] left-[161px] top-[472px] absolute text-black text-[18px] font-normal">
                Started following you. 1w</div>
            <div class="w-[177px] h-[26px] left-[161px] top-[636px] absolute text-black text-[18px] font-normal">
                Started following you. 1w</div>
            <div class="w-[181px] h-[26px] left-[161px] top-[800px] absolute text-black text-[18px] font-normal">
                Started following you. 1w</div>
            <div class="w-[150px] h-[26px] left-[169px] top-[247px] absolute text-black text-[18px] font-normal">
                Started following you. 3h</div>
            <div class="w-[169px] h-[26px] left-[169px] top-[327px] absolute text-black text-[18px] font-normal">
                Started following you. 3h</div>
            <div class="w-[120px] h-[34px] left-[382px] top-[161px] absolute bg-sky-400 rounded-md shadow">
                <button
                    class="w-[90px] h-5 left-[397px] top-[166px] absolute text-center text-white text-[18px] font-medium">
                    Follow
                </button>
            </div>
            <div class="w-[120px] h-[34px] left-[383px] top-[466px] absolute bg-sky-400 rounded-md shadow"></div>
            <div class="w-[120px] h-[34px] left-[383px] top-[630px] absolute bg-sky-400 rounded-md shadow"></div>
            <div class="w-[120px] h-[34px] left-[383px] top-[712px] absolute bg-sky-400 rounded-md shadow"></div>
            <div class="w-[120px] h-[34px] left-[383px] top-[794px] absolute bg-sky-400 rounded-md shadow"></div>
            <div class="w-[120px] h-[34px] left-[382px] top-[241px] absolute bg-zinc-300 rounded-md shadow"></div>
            <div class="w-[120px] h-[34px] left-[382px] top-[321px] absolute bg-sky-400 rounded-md shadow"></div>
            <button
                class="w-[90px] h-5 left-[397px] top-[166px] absolute text-center text-white text-[18px] font-medium">
                Follow</button>
            <button
                class="w-[90px] h-5 left-[398px] top-[471px] absolute text-center text-white text-[18px] font-medium">
                Follow</button>
            <button
                class="w-[90px] h-5 left-[398px] top-[635px] absolute text-center text-white text-[18px] font-medium">
                Follow</button>
            <button
                class="w-[90px] h-5 left-[398px] top-[717px] absolute text-center text-white text-[18px] font-medium">
                Follow</button>
            <button
                class="w-[90px] h-5 left-[398px] top-[799px] absolute text-center text-white text-[18px] font-medium">
                Follow</button>
            <button
                class="w-[90px] h-5 left-[397px] top-[246px] absolute text-center text-neutral-800 text-[18px] font-medium">
                Following</button>
            <button
                class="w-[90px] h-5 left-[397px] top-[326px] absolute text-center text-white text-[18px] font-medium">
                Follow</button>
            <img class="w-[68px] h-16 left-[407px] top-[534px] absolute rounded-sm"
                src="https://via.placeholder.com/68x64" />
        </div>
        {{ $slot }}
    </div>
    <script>
        var moreButton = document.getElementById('moreButton');
        var moreDropdownMenu = document.getElementById('moreMenus');
        var moreIsDropdownVisible = false;

        moreButton.addEventListener('click', function() {
            if (moreIsDropdownVisible) {
                moreDropdownMenu.classList.add('hidden');
                moreIsDropdownVisible = false;
            } else {
                moreDropdownMenu.classList.remove('hidden');
                moreIsDropdownVisible = true;
            }
        })
    </script>
</body>

</html>
