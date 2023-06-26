<div class="w-[250px] h-screen border-l-2 border-gray-200 flex flex-col items-center hidden lg:block fixed right-0">
    {{-- Menu --}}
    <div class="flex items-center justify-center space-x-3 mt-6 mb-4">
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
        <div class="relative inline-block text-left">
            <button type="button" class="border p-3 rounded-full shadow-md" id="myButton">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
            </button>
            <ul class="absolute right-5 mt-3 bg-white shadow-2xl rounded-xl hidden w-max text-sm" id="dropdownMenus">
                <a href="/swith-account">
                    <li class="p-2 w-full rounded-xl hover:bg-gray-100 w-[150px]">
                        Swicth Account
                    </li>
                </a>
                <a href="/logout">
                    <li class="p-2 w-full rounded-xl hover:bg-gray-100 w-[150px]">
                        Log out
                    </li>
                </a>
            </ul>
        </div>
        <script>
            var button = document.getElementById('myButton');
            var dropdownMenu = document.getElementById('dropdownMenus');
            var isDropdownVisible = false;

            button.addEventListener('click', function() {
                if (isDropdownVisible) {
                    dropdownMenu.classList.add('hidden');
                    isDropdownVisible = false;
                } else {
                    dropdownMenu.classList.remove('hidden');
                    isDropdownVisible = true;
                }
            })
        </script>
    </div>

    {{-- Trending Section --}}
    <div class="p-4 flex flex-col items-center">
        <h1 class="text-xl mb-3 mr-8">Trending Feeds</h1>
        <div class="grid grid-cols-2 gap-1">
            <div class="border"><img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHsFfe-vd1jIp0Wl2M_9-y6NQeeS19t3Ca_g&usqp=CAU"
                    class="h-[80px] w-[80px] object-cover" alt="post"></div>
            <div class="border"><img
                    src="https://wiki.warthunder.com/images/thumb/c/cb/ArtImage_M24.png/800px-ArtImage_M24.png"
                    class="h-[80px] w-[80px] object-cover" alt="post"></div>
            <div class="border"><img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFExwfzM2dZykLGL2-4G6_yl1z9u1uoo8rYw&usqp=CAU"
                    class="h-[80px] w-[80px] object-cover" alt="post"></div>
            <div class="border"><img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFExwfzM2dZykLGL2-4G6_yl1z9u1uoo8rYw&usqp=CAU"
                    class="h-[80px] w-[80px] object-cover" alt="post"></div>
        </div>
    </div>

    {{-- Suggestion Section --}}
    <div class="p-4 flex flex-col items-center">
        <h1 class="text-xl mb-3">Suggestion for you</h1>
        <div class="space-y-3">
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
