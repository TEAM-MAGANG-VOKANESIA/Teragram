<x-landing.app>
    <div class="flex-1 lg:ml-[250px]">
        <x-sidebar-setting>
            <div class="sm:w-full md:3/4 lg:w-3/4 border  py-6 px-3">
                <form class="bg-white">
                    <div class="p-4 w-full">
                        <div class="flex">
                            <div class="flex flex-col  items-end w-2/3 p-5 px-9">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6CUfQ9uPaBGxqoYL1r0_gWoH0aELe86-XaQ&usqp=CAU"
                                    class="w-[90px] h-[90px] rounded-full" alt="">

                                <p class="mt-8 text-xl font-bold">Website</p>
                                <p class="mt-24 text-xl font-bold">Bio</p>
                                <p class="mt-32 text-xl font-bold">Gender</p>
                                <p class="mt-20 font-bold text-base text-end">Show account sugestions on <br>profiles
                                </p>
                            </div>
                            <div class="flex flex-col w-full p-4">
                                <div class="mt-6">
                                    <p class="text-base font-medium">{{ Auth::user()->email }}</p>
                                    <p class="text-blue-600 font-medium">Change profile photo</p>
                                </div>
                                <div class="mt-14 text-gray-800">
                                    <p class="text-base font-medium">Website</p>
                                    <p class="text-sm mt-3">Editing your links is only avaible on mobile. Visit in
                                        Instagram app and edit your profile to change the websites in your bio.</p>
                                </div>
                                <div class="mt-9">
                                    <textarea name="" id="" cols="30" rows="3"
                                        class="border border-gray-500 rounded p-2 w-full text-gray-600" placeholder="prov.them.wrong"></textarea>
                                    <p class="mt-0.5 text-xs font-medium text-gray-600">1 / 150</p>
                                </div>
                                <div class="text-gray-800 mt-10">
                                    <select name="" id=""
                                        class="w-full border rounded border-gray-500 px-2 py-1">
                                        <option value="" class="">Male</option>
                                        <option value="">Laki Laki</option>
                                        <option value="">Perempuan</option>
                                    </select>
                                    <p class="text-sm mt-3">The wont's be part of your public power</p>
                                </div>

                                <div class="flex mt-9">
                                    <div class="w-1/3">
                                        <svg class="items-center text-center justify-center"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4L9.55 18Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="px-3 font-bold text-base">Chosse wheter people can see similar account
                                            sugestions on your profile, and whether your account can be sugested on
                                            other profiles. <span class="text-blue-600">[?]</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            </div>
    </x-sidebar-setting>
    </div>
</x-landing.app>
