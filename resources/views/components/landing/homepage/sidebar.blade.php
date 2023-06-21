<div class="flex">
    {{-- Sidebar --}}
    <div class="w-1/4 h-screen border-r-2 border-gray-200 hidden lg:block sticky top-0">
        {{-- Logo --}}
        <div class="mt-3">
            <img src="{{ asset('assets/images/teragram.png') }}" alt="Logo Teragram" class="w-[160px] h-[80px] mx-auto">
        </div>

        {{-- Profile --}}
        <div class="mt-6 text-center">
            {{-- Profile Picture --}}
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6CUfQ9uPaBGxqoYL1r0_gWoH0aELe86-XaQ&usqp=CAU"
                alt="Profile Image" class="w-[90px] h-[90px] border-[#ff00e5] border-2 rounded-full mx-auto object-cover">
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
                    <a href="">Home</a>
                </li>
                <li class="flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                    </svg>
                    <a href="">
                        Explore
                    </a>
                </li>
                <li class="flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                    </svg>
                    <a href="">
                        Notification
                    </a>
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

    {{ $slot }}

    {{-- Sidebar --}}
    <div class="w-1/4 h-screen border-l-2 border-gray-200 flex flex-col items-center hidden lg:block sticky top-0">
        {{-- Menu --}}
        <div class="flex justify-center space-x-3 mt-6 mb-4">
            <div class="border p-3 rounded-full shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
            </div>
            <div class="border p-3 rounded-full shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                </svg>
            </div>
            <div class="border p-3 rounded-full shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
            </div>
        </div>

        {{-- Trending Section --}}
        <div class="p-4 mb-3">
            <h1 class="text-xl mb-4">Trending Feeds</h1>
            <div class="grid grid-rows-2 grid-flow-col gap-4 flex justify-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHsFfe-vd1jIp0Wl2M_9-y6NQeeS19t3Ca_g&usqp=CAU"
                    class="w-[80px] h-[80px] rounded-md object-cover border shadow-lg" alt="post">
                <img src="https://wiki.warthunder.com/images/thumb/c/cb/ArtImage_M24.png/800px-ArtImage_M24.png"
                    class="w-[80px] h-[80px] rounded-md object-cover border shadow-lg" alt="post">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFExwfzM2dZykLGL2-4G6_yl1z9u1uoo8rYw&usqp=CAU"
                    class="w-[80px] h-[80px] rounded-md object-cover border shadow-lg" alt="post">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFExwfzM2dZykLGL2-4G6_yl1z9u1uoo8rYw&usqp=CAU"
                    class="w-[80px] h-[80px] rounded-md object-cover border shadow-lg" alt="post">
            </div>
        </div>

        {{-- Suggestion Section --}}
        <div class="p-4 mb-3">
            <h1 class="text-xl mb-3">Suggestion for you</h1>
            <div class="space-y-3 p-4">
                {{-- Sugestion Profile --}}
                <div class="flex items-center space-x-3">
                    <img class="rounded-full h-[50px] w-[50px] object-cover"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6CUfQ9uPaBGxqoYL1r0_gWoH0aELe86-XaQ&usqp=CAU"
                        alt="profile picture">
                    <div class="leading-none">
                        <p>lordklue4</p>
                        <p>hooman.</p>
                    </div>
                </div>
                {{-- Sugestion Profile --}}
                <div class="flex items-center space-x-3">
                    <img class="rounded-full h-[50px] w-[50px] object-cover"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzHQv_th9wq3ivQ1CVk7UZRxhbPq64oQrg5Q&usqp=CAU"
                        alt="profile picture">
                    <div class="leading-none">
                        <p>itsMendax</p>
                        <p>borntobelove</p>
                    </div>
                </div>
                {{-- Sugestion Profile --}}
                <div class="flex items-center space-x-3">
                    <img class="rounded-full h-[50px] w-[50px] object-cover"
                        src="https://marketplace.canva.com/EAE8zj3M8P8/1/0/1600w/canva-pink-and-maroon-modern-illustrated-japan-influencer-twitch-logo-gvo_hbtMHKI.jpg"
                        alt="profile picture">
                    <div class="leading-none">
                        <p>justaMix</p>
                        <p>i love dog :)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
