<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">LOCATION</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Set Location</span>
        </x-containers.sub-header>

        <x-containers.content>
            <div class="grid grid-cols-6 px-10 py-5">
                <section id="labels" class="font-barlowcondensed text-slate-700 grid grid-rows-6 gap-3 col-span-2">
                    <div>
                        <label class="flex h-12">Region</label>

                        @error('region')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Province</label>

                        @error('province')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">City</label>

                        @error('city')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Postal Code</label>

                        @error('postal_code')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                </section>

                <section x-data="{ show: false }" id="fields" class="grid grid-rows-6 gap-3 col-span-4">
                    <div x-data="{ show: false }" class="w-1/3 relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{ old('occupancy_label') ?? 'Select Region'
                            }}</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" style="display: none" class="z-10 absolute w-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                @foreach($regions as $region)
                                    <li>
                                        <a id="business" href="#" class="block py-2 px-4 hover:bg-gray-100
                                        dark:hover:bg-gray-600 dark:hover:text-white">{{ $region->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div x-data="{ show: false }" class="w-1/3 relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{ old('occupancy_label') ?? 'Select
                            Province'
                            }}</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" style="display: none" class="z-10 absolute w-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                <li>
                                    <a id="business" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Business</a>
                                </li>
                                <li>
                                    <a id="private" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Private</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div x-data="{ show: false }" class="w-1/3 relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{ old('occupancy_label') ?? 'Select
                            City/Municpality' }}</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" style="display: none" class="z-10 absolute w-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                <li>
                                    <a id="business" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Business</a>
                                </li>
                                <li>
                                    <a id="private" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Private</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <input type="text" name="fsic_id" class="text-field w-1/4" value="{{ old('fsic_id') }}" placeholder="" form="fill-certificate" required>

                    <button type="submit" class="grid justify-center text-white bg-blue-500 hover:bg-blue-800
                    focus:outline-none
                    focus:ring-4
                 focus:ring-blue-300 font-semibold font-barlow rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2
                  w-1/3" form="create-personnel">Submit</button>
                </section>


            </div>
        </x-containers.content>

        <form action="{{ route('admin.personnel.chiefs.store') }}" method="POST" style="display:none;"
              id="create-personnel">
            @csrf
        </form>
    </x-containers.main>

    <script>
        var selected = document.getElementById('selected-position');
        var position = document.getElementById('position');

        function select(e) {
            selected.innerHTML = e.target.innerHTML;
            position.value = selected.innerHTML;
            console.log(position.value);
        }
    </script>
</x-layout>
