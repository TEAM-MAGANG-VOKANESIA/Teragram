<x-landing.app>
    <div class="flex-1 lg:mx-[250px]">
        <nav class="px-4 py-2 border-b shadow-md border-gray-300">
            <div class="flex items-center justify-between">
                <a href="/" class="md:hidden">
                    <img class="w-[90px]" src="{{ asset('assets/images/teragram.png') }}" alt="Logo Teragram">
                </a>
                <input type="text" class="border p-2 rounded-lg shadow-md hidden md:block" placeholder="Search">
                <div class="items-center border p-3 rounded-full shadow-md hidden md:flex space-x-2"
                    onclick="my_modal_1.showModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    <button>Create New Post</button>
                </div>
                <details class="dropdown dropdown-end md:hidden block">
                    <summary class="btn border-0 rounded-full">
                        <div class="border p-3 rounded-full shadow-md md:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                            </svg>
                        </div>
                    </summary>
                    <ul class="p-2 shadow-2xl menu dropdown-content z-[1] rounded-box w-52 bg-white">
                        <li class="hover:bg-gray-200 rounded-xl"><a>Home</a></li>
                        <li class="hover:bg-gray-200 rounded-xl"><a>Explore</a></li>
                        <li class="hover:bg-gray-200 rounded-xl"><a>Message</a></li>
                        <li class="hover:bg-gray-200 rounded-xl"><a>Setting</a></li>
                        <li class="hover:bg-gray-200 rounded-xl"><a>Your activity</a></li>
                        <li class="hover:bg-gray-200 rounded-xl"><a>Report a problem</a></li>
                        <li class="hover:bg-gray-200 rounded-xl" onclick="my_modal_1.showModal()"><a>Create New Post</a></li>
                    </ul>
                </details>
            </div>
        </nav>
        <div class="p-6">
            <div class="mb-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl">Stories</h1>
                    <div class="flex items-center space-x-2">
                        <h2>Next</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center space-x-5 text-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
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
                            src="https://upload.wikimedia.org/wikipedia/commons/3/3f/Jamal_Edwards%2C_2019.png"
                            alt="not found">
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
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-xl">Feeds</h1>
                <div class="flex items-center space-x-2">
                    <div class="border rounded-full p-1 pl-4 pr-4 bg-gray-100 shadow-md">Latest</div>
                    <div class="border rounded-full p-1 pl-4 pr-4 bg-gray-100 shadow-md">Popular</div>
                </div>
            </div>

            @forelse ($posts as $post)
                <div class="bg-white shadow-md border rounded-xl md:p-6 p-4 my-10">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center space-x-3">
                                <img class="h-14 w-14 object-cover rounded-full"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzHQv_th9wq3ivQ1CVk7UZRxhbPq64oQrg5Q&usqp=CAU"
                                    alt="profile">
                                <div>
                                    <h1 class="font-bold">{{$post->user->name}}</h1>
                                    <p>Indoensia, East Java</p>
                                </div>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <img class="rounded-xl mb-3 object-cover mx-auto"
                                src="{{asset("storage/post/$post->image")}}"
                                alt="">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                    <a href="">2.234</a>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                    </svg>
                                    <a href="">10</a>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                    </svg>
                                    <a href="">1.211</a>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                    <a href="">3</a>
                                </div>
                            </div>
                        </div>

                        <hr class="w-full h-px my-5 bg-gray-300  dark:bg-gray-500">

                        <div>
                            <p class="ml-3">{{$post->caption}}</p>
                        </div>
                    </div>
                </div>
            @empty
                No Post
            @endforelse

        </div>
    </div>
    <dialog id="my_modal_1" class="modal">
        <form id="UploadForm" enctype="multipart/form-data" class="modal-box bg-white flex flex-col items-center">
            @csrf
            <h3 class="font-bold text-xl mb-10">Create new post</h3>
            <div class="border-4 border-gray-300 rounded-full p-4 w-max shadow-2xl">
                <img src="{{ asset('assets/images/create-new-post-icon.png') }}" class="w-[70px]" alt="not found">
            </div>
            <p class="py-4 text-gray-800 text-xl">Drag photos and videos here</p>
            <input type="file" name="file" id="file-submit" hidden>
            <label for="file-submit">
                <input type="file" name="file" class="file:hidden my-5 text-center">
            </label>
            <button type="submit" onclick="my_modal_2.showModal()"
                class="bg-yellow-300 hover:bg-yellow-500 text-white p-3 rounded-xl btn">Unggah
                File</button>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#UploadForm').submit(function(event) {
                    event.preventDefault();

                    let formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: '/store/image',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success) {
                                var imageUrl = "{{ asset('storage/post/') }}/" + response.image;
                                $('#postImage').html('<img src="' + imageUrl +
                                    '" class="h-full w-full object-cover rounded-b-xl">');
                                $('#postId').html('<input type="text" name="postId" value="' +
                                    response.postId + '" hidden>');
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengunggah file.');
                        }
                    });
                });
            });
        </script>
    </dialog>
    <dialog id="my_modal_2" class="modal md:px-10 px-7 py-5 w-full overflow-y-auto">
        <form method="post" action="{{ route('store.caption') }}"
            class="rounded-xl bg-white flex flex-col items-center">
            @csrf
            <div class="border-b-2 border-gray-300 text-xl w-full flex items-center justify-between py-5 px-5">
                <div onclick="my_modal_1.showModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </div>
                <div class="flex item-center">
                    <p>Create New Post</p>
                    <p class="text-sky-400 mx-5">Share</p>
                </div>
            </div>
            <div class="md:flex">
                <div class="" id="postImage"></div>
                <div id="postId"></div>
                <div class="md:w-1/2 py-3 px-3">
                    <div class="items-center space-x-4 mb-5 hidden md:flex">
                        <div>
                            <img class="w-16 h-16 mb-2 rounded-full object-cover border-2 border-[#ff00e5] shadow-xl"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzHQv_th9wq3ivQ1CVk7UZRxhbPq64oQrg5Q&usqp=CAU"
                                alt="">
                        </div>
                        <div class="text-xl">
                            <p>itsMendax</p>
                        </div>
                    </div>
                    <textarea name="caption" class="rounded-xl border-0 w-full h-[300px] mb-5" placeholder="write a caption.."></textarea>
                    <div class="flex items-center justify-between">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                            </svg>
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-yellow-300 hover:bg-yellow-500 text-white p-3 rounded-xl btn">Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </dialog>
    <x-landing.right-sidebar></x-landing.right-sidebar>
</x-landing.app>
