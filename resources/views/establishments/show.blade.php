<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">ESTABLISHMENTS</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">{{ $establishment->name }}</span>
        </x-containers.sub-header>

        <x-containers.content>
            <div class="grid grid-cols-6 px-10 py-5">
                <section id="labels" class="font-barlowcondensed text-slate-700 grid grid-rows-8 gap-3 col-span-2">
                    <div>
                        <label class="flex h-12">Date</label>

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
                        <label class="flex h-12">Name of Owner</label>

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
                        <label class="flex h-12">Name of Establishment</label>

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
                        <label class="flex h-12">Address</label>

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
                        <label class="flex h-12">OR Number</label>

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
                        <label class="flex h-12">OPS Number</label>

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
                        <label class="flex h-12">FSIC Number</label>

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
                        <label class="flex h-12">New / Renew</label>

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
                        <label class="flex h-12">Occupancy Type</label>

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
                        <input type="text" name="date" placeholder="" class="text-field w-1/4" value="{{ $establishment->date }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="owner" placeholder="Name of Owner" class="text-field w-5/6" value="{{ $establishment->owner }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="name" placeholder="Name of Establishment" class="text-field w-5/6" value="{{ $establishment->name }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="address" placeholder="Address" class="text-field w-5/6" value="{{ $establishment->address }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="amount_paid" placeholder="Amount Paid" class="text-field w-1/4" value="{{ $establishment->amount_paid }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="date_paid" placeholder="" class="text-field w-1/4" value="{{ $establishment->date_paid }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="or_number" placeholder="OR Number" class="text-field w-1/4" value="{{ $establishment->or_number }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="ops_number" placeholder="OPS Number" class="text-field w-1/4" value="{{ $establishment->ops_number }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="date_released" placeholder="" class="text-field w-1/4" value="{{ $establishment->date_released }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="fsic_number" placeholder="FSIC Number" class="text-field w-1/4" value="{{ $establishment->fsic_number }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="issuance" placeholder="FSIC Number" class="text-field w-1/4" value="{{ $establishment->issuance }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="occupancy" placeholder="FSIC Number" class="text-field w-1/4" value="{{ $establishment->occupancy }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="area" placeholder="Area SQ.M." class="text-field w-1/4" value="{{ $establishment->area }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="remarks" placeholder="Remarks" class="text-field w-2/3" value="{{ $establishment->remarks }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="inspection_date" placeholder="" class="text-field w-1/4" value="{{ $establishment->inspection_date }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="io_number" placeholder="IO Number" class="text-field w-1/4" value="{{ $establishment->io_number }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="realty_tax" placeholder="Realty Tax" class="text-field w-1/4" value="{{ $establishment->realty_tax }}" disabled>
                    </div>
                    <div>
                        <input type="text" name="amount" placeholder="Amount" class="text-field w-1/4" value="{{ $establishment->amount }}" disabled>
                    </div>
                </section>
            </div>

            <div class="flex justify-center pb-5">
                <a href="{{ url()->previous() }}" class="text-white text-center bg-gray-500 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold font-barlow rounded text-sm px-5 py-2.5 w-1/3 ml-5">Go Back</a>
            </div>

            <form action="{{ route('admin.users.store') }}" style="display: none" method="POST" id="create-user">
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
