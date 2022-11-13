@if(session()->has('success'))
    <div class="mx-auto absolute bottom-0 right-0 mb-5 mr-5">
        <p
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="bg-blue-500 text-white py-2 px-4 rounded-xl text-sm flex justify-center text-center
                items-center space-x-2"
        >
            <x-icon name="info"/>

            <span>{{ session('success') }}</span>
        </p>
    </div>
@endif
