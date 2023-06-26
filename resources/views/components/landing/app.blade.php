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
    <div class="flex">
        {{-- Sidebar --}}
        <div class="w-[250px] h-screen border-r-2 border-gray-200 hidden lg:block sticky top-0">
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

            <div>
                <ul class="text-xl space-y-4 p-9">
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
                        <a href="">
                            Message
                        </a>
                    </li>
                    <li class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                        </svg>
                        <a href="">
                            More
                        </a>
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
        var notificationButton = document.getElementById('notificationButton');
        var isNotificationShow = false;
        var notificationMenu = document.getElementById('notificationMenu');
        notificationButton.addEventListener('click', function() {
            if (isNotificationShow) {
                notificationMenu.classList.add('hidden');
                isNotificationShow = false;
            } else {
                notificationMenu.classList.remove('hidden');
                isNotificationShow = true;
            }
        })

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
