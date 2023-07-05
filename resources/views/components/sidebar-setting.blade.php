<div class="w-auto  my-3 bg-white shadow-md border  mx-6  flex">
    <div class="w-1/4   border py-3 hidden md:flex flex-col">
        <div class="mx-6">
            <a href="/setting/edit-profile">
                <h1 class="md:text-md lg:text-lg my-6">Edit Profile</h1>
            </a>
            <a href="/setting/email-notification">
                <h1 class="md:text-md lg:text-lg my-6">Email Notifications</h1>
            </a>
            <a href="/setting/push-notification">
                <h1 class="md:text-md lg:text-lg my-6">Push Notifications</h1>
            </a>
            <a href="/setting/privacy">
                <h1 class="md:text-md lg:text-lg my-6">Privacy </h1>
            </a>
            <a href="/setting/help">
                <h1 class="md:text-md lg:text-lg my-6">Help</h1>
            </a>
        </div>
    </div>
    {{-- Content --}}
    {{ $slot }}
    {{-- End Content --}}
</div>
