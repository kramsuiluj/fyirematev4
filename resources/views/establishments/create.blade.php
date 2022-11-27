<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">ESTABLISHMENTS</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Add Establishment</span>
        </x-containers.sub-header>

        <x-containers.content>
            <div class="grid grid-cols-6 px-10 py-5">
                <section id="labels" class="font-barlowcondensed text-slate-700 grid grid-rows-8 gap-3 col-span-2">
                    <div>
                        <label class="flex h-12">Date &nbsp;<span class="text-red-500">*</span></label>

                        @error('date')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Name of Owner &nbsp;<span class="text-red-500">*</span></label>

                        @error('owner')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Name of Establishment &nbsp;<span class="text-red-500">*</span></label>

                        @error('name')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Address &nbsp;<span class="text-red-500">*</span></label>

                        @error('address')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Amount Paid</label>

                        @error('amount_paid')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Date Paid</label>

                        @error('date_paid')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">OR Number &nbsp;<span class="text-red-500">*</span></label>

                        @error('or_number')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">OPS Number &nbsp;<span class="text-red-500">*</span></label>

                        @error('ops_number')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Date Released</label>

                        @error('date_released')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">FSIC Number &nbsp;<span class="text-red-500">*</span></label>

                        @error('fsic_number')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">New / Renew &nbsp;<span class="text-red-500">*</span></label>

                        @error('issuance')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Occupancy Type &nbsp;<span class="text-red-500">*</span></label>

                        @error('occupancy')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Area</label>

                        @error('area')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Remarks</label>

                        @error('remarks')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Inspection Date</label>

                        @error('inspection_date')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Inspection Order Number</label>

                        @error('io_number')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Realty Tax</label>

                        @error('realty_tax')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="flex h-12">Amount</label>

                        @error('amount')
                        <div class="flex absolute items-center -mt-5 space-x-0.5">
                            <div class="text-red-500">
                                <x-icon name="warning"/>
                            </div>
                            <p class="text-xs text-red-400 font-barlow">{{ $message }}</p>
                        </div>
                        @enderror
                    </div>
                </section>

                <section x-data="{ show: false }" id="fields" class="grid grid-rows-8 gap-3 col-span-4">
                    <div>
                        <input type="date" name="date" placeholder="" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="owner" placeholder="Name of Owner" class="text-field w-5/6" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="name" placeholder="Name of Establishment" class="text-field w-5/6" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="address" placeholder="Address" class="text-field w-5/6" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="amount_paid" placeholder="Amount Paid" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="date" name="date_paid" placeholder="" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="or_number" placeholder="OR Number" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="ops_number" placeholder="OPS Number" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="date" name="date_released" placeholder="" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="fsic_number" placeholder="FSIC Number" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <div x-data="{ show: false }" class="w-1/3 relative">
                            <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="issuance_label"
                                  class="font-barlow">Select New/Renew</span>

                                <x-icon name="down-arrow"></x-icon>
                            </button>
                            <!-- Dropdown menu -->
                            <div x-show="show" style="display: none"
                                 class="z-10 absolute w-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                    <li class="cursor-pointer">
                                        <span id="new" onclick="setIssuance(document.getElementById('new'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">New</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <span id="renew" href="#" onclick="setIssuance(document.getElementById('renew'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Renew</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div x-data="{ show: false }" class="w-1/3 relative">
                            <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label"
                                  class="font-barlow">Select Type</span>

                                <x-icon name="down-arrow"></x-icon>
                            </button>
                            <!-- Dropdown menu -->
                            <div x-show="show" style="display: none"
                                 class="z-10 absolute w-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                    <li class="cursor-pointer">
                                        <span id="business" onclick="setOccupancy(document.getElementById('business'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Business</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <span id="educational" onclick="setOccupancy(document.getElementById('educational'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Educational</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <span id="health" onclick="setOccupancy(document.getElementById('health'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Health Care</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <span id="industrial" onclick="setOccupancy(document.getElementById('industrial'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Industrial</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <span id="mercantile" onclick="setOccupancy(document.getElementById('mercantile'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mercantile</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <span id="residential" onclick="setOccupancy(document.getElementById('residential'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Residential</span>
                                    </li>
                                    <li class="cursor-pointer">
                                        <span id="storage" onclick="setOccupancy(document.getElementById('storage'))"
                                           class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Storage</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="area" placeholder="Area SQ.M." class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="remarks" placeholder="Remarks" class="text-field w-2/3" form="add-establishment">
                    </div>
                    <div>
                        <input type="date" name="inspection_date" placeholder="" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="io_number" placeholder="IO Number" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="realty_tax" placeholder="Realty Tax" class="text-field w-1/4" form="add-establishment">
                    </div>
                    <div>
                        <input type="text" name="amount" placeholder="Amount" class="text-field w-1/4" form="add-establishment">
                    </div>
                </section>
            </div>

            <div class="flex justify-center pb-5">
                <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold font-barlow rounded text-sm px-5 py-2.5 w-1/3 ml-5" form="add-establishment">Submit</button>
            </div>

            <form action="{{ route('establishments.store') }}" style="display: none" method="POST" id="add-establishment">
                @csrf

                <input type="hidden" name="issuance" value="">
                <input type="hidden" name="occupancy" value="">
            </form>
        </x-containers.content>

    </x-containers.main>

    <script>
        const issuance = document.querySelector('[name="issuance"]');
        const issuanceLabel = document.getElementById('issuance_label');

        const occupancy = document.querySelector('[name="occupancy"]');
        const occupancyLabel = document.getElementById('occupancy_label');

        function setIssuance(e) {
            issuance.value = e.innerText;
            issuanceLabel.innerText = issuance.value;
        }

        function setOccupancy(e) {
            occupancy.value = e.innerText;
            occupancyLabel.innerText = occupancy.value;
        }

    </script>
</x-layout>
