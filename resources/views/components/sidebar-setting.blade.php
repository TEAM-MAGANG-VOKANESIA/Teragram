<div class="w-auto  my-3 bg-white shadow-md border  mx-6  flex">
    <div class="w-1/4   border py-3 hidden md:flex flex-col">
        <div class="mx-6">
            <a href="">
                <h1 class="md:text-md lg:text-lg my-6">Edit Profile</h1>
            </a>
            <a href="">
                <h1 class="md:text-md lg:text-lg my-6">Email Notifications</h1>
            </a>
            <a href="">
                <h1 class="md:text-md lg:text-lg my-6">Push Notifications</h1>
            </a>
            <a href="">
                <h1 class="md:text-md lg:text-lg my-6">Privacy </h1>
            </a>
            <a href="">
                <h1 class="md:text-md lg:text-lg my-6">Help</h1>
            </a>
        </div>
    </div>
    {{-- Content --}}
    {{ $slot }}
    {{-- End Content --}}
</div>
