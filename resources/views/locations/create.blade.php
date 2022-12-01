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

                <section id="fields" class="grid grid-rows-6 gap-3 col-span-4">
                    <div x-data="{ show: false }" class="w-1/3 relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{ \Yajra\Address\Entities\Region::firstWhere
                            ('region_id', request('region'))->name ??
                            'Select Region'
                            }}</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" style="display: none" class="z-10 absolute w-full bg-white rounded
                        divide-y divide-gray-100 shadow dark:bg-gray-700 h-32 overflow-y-auto mt-2">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                @foreach($regions as $region)
                                    <li>
                                        <a id="business" href="{{ request()->url() }}/?region={{ $region->region_id }}"
                                           class="block py-2
                                         px-4
                                        hover:bg-gray-100
                                        dark:hover:bg-gray-600 dark:hover:text-white">{{ $region->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @if(!request('region'))
                        <input type="text" class="text-field text-slate-500 w-1/3 h-10 bg-gray-300"
                               value="Please select a region first." disabled>
                    @else
                        <div x-data="{ show: false }" class="w-1/3 relative">
                            <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{
                            Yajra\Address\Entities\Province::firstWhere('province_id', request('province'))->name
                             ??
                            'Select
                            Province'
                            }}</span>

                                <x-icon name="down-arrow"></x-icon>
                            </button>
                            <!-- Dropdown menu -->
                            <div x-show="show" style="display: none" class="z-10 absolute w-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                    @foreach ($provinces as $province)
                                        <li>
                                            <a id="business"
                                               href="?{{ http_build_query(request()->except
                                           ('province')) . '&province=' . $province->province_id }}"
                                               class="block
                                        py-2 px-4
                                        hover:bg-gray-100
                                    dark:hover:bg-gray-600 dark:hover:text-white">{{ $province->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if(!request('province') || !request('region'))
                        <input type="text" class="text-field text-slate-500 w-1/3 h-10 bg-gray-300"
                               value="Please select a province first." disabled>
                    @else
                        <div x-data="{ show: false }" class="w-1/3 relative">
                            <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{ Yajra\Address\Entities\City::firstWhere
                            ('city_id', request('city'))->name
                             ?? 'Select
                            City/Municpality' }}</span>

                                <x-icon name="down-arrow"></x-icon>
                            </button>
                            <!-- Dropdown menu -->
                            <div x-show="show" style="display: none" class="z-10 absolute w-full bg-white rounded
                            divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200 h-44 overflow-y-auto">
                                    @foreach ($cities as $city)
                                        <li>
                                            <a id="business" href="?{{ http_build_query(request()->except
                                           ('city')) . '&city=' . $city->city_id }}"
                                               class="block
                                        py-2 px-4 hover:bg-gray-100
                                        dark:hover:bg-gray-600 dark:hover:text-white">{{ $city->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <input type="number" name="postal_code" class="text-field h-10 w-1/4" value="{{ old('postal_code')
                     }}"
                           placeholder="" form="set-location" required>

                    <button type="submit" class="grid justify-center text-white bg-blue-500 hover:bg-blue-800
                    focus:outline-none
                    focus:ring-4
                 focus:ring-blue-300 font-semibold font-barlow rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2
                  w-1/3" form="set-location">Submit</button>
                </section>


            </div>
        </x-containers.content>

        <form
            action="{{ route('locations.store') }}"
            method="POST"
            style="display:none;"
            id="set-location"
        >
            @csrf
            <input type="hidden" name="region" value="{{ request('region') }}">
            <input type="hidden" name="province" value="{{ request('province') }}">
            <input type="hidden" name="city" value="{{ request('city') }}">
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
