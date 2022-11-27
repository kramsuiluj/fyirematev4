<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">LOCATION</span>

            <x-slot name="actions">
                <div class="absolute right-0 -mt-2 mr-4">
                    <div x-data="{ show: false }" class="space-y-2 relative">
                        <input type="hidden" name="position" id="position" value="">

                        <div class="flex space-x-2">
                            <a href="{{ route('locations.create') }}" class="text-white bg-blue-500
                            hover:bg-blue-800
                            focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center flex justify-between
                        items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="1
                                                                              .5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>

                                <span>Set Location</span>
                            </a>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-containers.sub-header>

        <x-containers.content>
            <section>
                <div>
                    <p class="p-2 font-barlow text-slate-700" style="font-weight: 500">
                        The system location is set to {{ \Yajra\Address\Entities\Region::firstWhere('region_id',
                        $location->region)->name }}, {{ \Yajra\Address\Entities\Province::firstWhere('province_id',
                        $location->province)->name }}, {{ \Yajra\Address\Entities\City::firstWhere('city_id',
                        $location->city)->name }}.
                    </p>
                </div>
            </section>
        </x-containers.content>

        <x-containers.content>
            <section>
                <div>
                    <h2 class="p-2 text-white border-b bg-gray-900 rounded">List of Barangays</h2>
                </div>

                <ul class="grid grid-cols-6 mt-2 p-2 text-slate-700">
                    @foreach($barangays as $barangay)
                        <li class="px-5 py-1">{{ $barangay->name }}</li>
                    @endforeach
                </ul>
            </section>
        </x-containers.content>

    </x-containers.main>

    @include('_flash')

</x-layout>
