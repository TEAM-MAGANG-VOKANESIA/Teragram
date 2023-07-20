<x-landing.app>
    <div class="flex-1 lg:ml-[250px]">
        <x-sidebar-setting>
            <div class="sm:w-full md:3/4 lg:w-3/4 border  py-6 px-3">
                <form class="bg-white">
                    <div class="flex">
                        <div class="w-full md:p-14 p-5">
                            {{-- Change photo --}}
                            <div class="flex md:flex-row flex-col items-center md:space-x-10">
                                <div class="w-[150px] flex md:flex-row flex-col md:justify-end items-center">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6CUfQ9uPaBGxqoYL1r0_gWoH0aELe86-XaQ&usqp=CAU"
                                        class="w-[90px] h-[90px] rounded-full" alt="">
                                </div>
                                <div class="flex-1">
                                    <p class="text-base font-medium">{{ Auth::user()->email }}</p>
                                    <p class="text-blue-600 font-medium">Change profile photo</p>
                                </div>
                            </div>
                            {{-- Edit Link Website --}}
                            <div class="mt-14 text-gray-800 flex md:flex-row flex-col md:space-x-10">
                                <div class="md:w-[150px] flex md:justify-end mb-5">
                                    <p class="text-xl font-bold">Website</p>
                                </div>
                                <div class="flex-1">
                                    <input type="text" class="border border-gray-500 rounded w-full text-gray-600"
                                        placeholder="https://example.com">
                                    <p class="text-sm mt-3">Editing your links is only avaible on mobile. Visit in
                                        Instagram app and edit your profile to change the websites in your bio.</p>
                                </div>
                            </div>
                            {{-- BIO --}}
                            <div class="mt-14 flex md:flex-row flex-col md:space-x-10 text-gray-800">
                                <div class="md:w-[150px] flex md:justify-end mb-5">
                                    <p class="text-xl font-bold">Bio</p>
                                </div>
                                <div class="flex-1">
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="border border-gray-500 rounded p-2 w-full text-gray-600" placeholder="prov.them.wrong"></textarea>
                                    <p class="mt-0.5 text-xs font-medium text-gray-600">1 / 150</p>
                                </div>
                            </div>
                            {{-- Gender --}}
                            <div class="text-gray-800 mt-14 flex md:flex-row flex-col md:space-x-10">
                                <div class="md:w-[150px] flex md:justify-end mb-5">
                                    <p class="text-xl font-bold">Gender</p>
                                </div>
                                <div class="flex-1">
                                    <select name="" id=""
                                        class="w-full border rounded border-gray-500 px-2 py-1">
                                        <option value="" class="">Male</option>
                                        <option value="">Laki Laki</option>
                                        <option value="">Perempuan</option>
                                    </select>
                                    <p class="text-sm mt-3">The wont's be part of your public power</p>
                                </div>
                            </div>
                            {{-- Privacy And Safety --}}
                            <div class="flex md:flex-row flex-col items-center mt-14 md:space-x-10 space-y-5 p-5 text-gray-800">
                                <div class="md:w-[150px]">
                                    <p class="text-xl font-bold">Show account suggestions on profile</p>
                                </div>
                                <div class="md:w-[100px] flex justify-center">
                                    <svg class="items-center text-center justify-center"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4L9.55 18Z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="px-3 font-bold text-base">Chosse wheter people can see similar
                                        account
                                        sugestions on your profile, and whether your account can be sugested on
                                        other profiles. <span class="text-blue-600">[?]</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </x-sidebar-setting>
    </div>
</x-landing.app>
