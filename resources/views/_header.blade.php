<header class="bg-white shadow w-full z-10 fixed top-0 border-t-4 border-orange-500">
    <section class="flex justify-between items-center px-5 py-4">
        <a href="{{ route('dashboard') }}" class="font-bold font-silkscreen text-lg">
            <span class="text-orange-500">FYIRE</span><span class="text-blue-900">MATE</span>
        </a>

        <div x-data="{ show: false }" class="relative">
            <button @click="show = !show" class="flex items-center space-x-2">
                <span class="font-varela text-gray-600">{{ auth()->user()->firstname ?? '' }}</span>

                <x-icon name="down-arrow" class="text-gray-600"></x-icon>
            </button>

            <ul
                x-show="show"
                @click.away="show = false"
                style="display: none"
                class="absolute bg-white text-md right-0 w-full text-center font-varela text-gray-600 border rounded-md"
            >
                <li class="hover:bg-gray-100 border-b py-1">
                    <a href="#">Profile</a>
                </li>
                <li class="hover:bg-gray-100 py-1">
                    <a href="#" @click.prevent="document.getElementById('logout').submit()">Logout</a>

                    <form action="{{ route('sessions.destroy') }}" method="POST" id="logout">
                        @csrf
                        @method('DELETE')
                    </form>
                </li>
            </ul>
        </div>
    </section>
</header>
