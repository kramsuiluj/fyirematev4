<header class="bg-white border-b border-gray-300 fixed w-full top-0 z-10 border-t-4 pb-1">
    <div class="flex justify-between px-4 py-4">
        <a href="{{ route('dashboard') }}" class="font-black font-daysone text-gray-700">
            <span class="text-orange-500">FYIRE</span><span class="text-blue-900">MATE</span>
        </a>

        <section x-data="{ show: false }" class="font-barlowcondensed text-slate-700 relative">
            <button @click="show = !show" @click.away="show = false" type="button" class="flex items-center space-x-1">
                <span class="">{{ auth()->user()->firstname ?? '' }}</span>

                <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <div x-show="show" class="absolute bg-white w-20 right-2 text-left border rounded-bl rounded-br shadow mt-2">
                <ul class="">
                    <li class="cursor-pointer hover:bg-gray-100 px-2 py-0.5 hover:font-semibold">
                        <a href="#" @click.prevent="document.getElementById('logout').submit()">Log out</a>

                        <form id="logout" action="{{ route('sessions.destroy') }}" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</header>
