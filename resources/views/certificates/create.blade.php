<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">CERTIFICATES</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Fire Safety Inspection Certificate (FSIC)</span>
        </x-containers.sub-header>

        <x-containers.content>
            <section class="grid grid-cols-6">
                <h3 class="font-barlowcondensed text-slate-700 col-span-6 bg-gray-100 rounded py-2 px-5 border-b" style="font-weight: 500">Certificate Details</h3>

                <div class="col-span-2 grid gap-5 font-barlowcondensed text-slate-700 p-5">
                    <label for="fsic_id">FSIC No.</label>
                    @error('fsic_id')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="filled_date">Date</label>
                    @error('filled_date')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="valid_until">Valid Until</label>
                    @error('valid_until')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="occupancy_type">Occupancy Type</label>
                    @error('occupancy_type')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="issuance_type">Issuance Type</label>
                    @error('issuance_type')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="others">Others <span class="text-xs">(Not required)</span></label>
                    @error('others')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="description">Description</label>
                    @error('description')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4 grid gap-5 p-5">
                    <input type="text" name="fsic_id" class="text-field w-1/4" value="{{ old('fsic_id') }}" placeholder="" form="fill-certificate" required>
                    <input type="date" name="filled_date" class="text-field w-1/4" value="{{ old('filled_date') }}" placeholder="" form="fill-certificate" required>
                    <input type="date" name="valid_until" class="text-field w-1/4" value="{{ old('valid_until') }}" placeholder="" form="fill-certificate" required>
                    <input type="hidden" name="occupancy_type" value="{{ old('occupancy_type') }}" placeholder="" form="fill-certificate" required>
                    <input type="hidden" name="issuance_type" value="{{ old('occupancy_type') }}" placeholder="" form="fill-certificate" required>

                    <div x-data="{ show: false }" class="w-1/3 relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{ old('occupancy_label') ?? 'Occupancy Type' }}</span>

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
                            <span id="issuance_label" class="font-barlow">{{ old('issuance_type') ?? 'Issuance Type' }}</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" id="dropdown" class="z-10 absolute w-full bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                <li>
                                    <a id="new" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">New</a>
                                </li>
                                <li>
                                    <a id="renewal" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Renewal</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <input type="text" name="others" class="text-field w-2/3" value="" placeholder="" form="fill-certificate">
                    <input type="text" name="description" class="text-field" value="" placeholder="ex. Lorem ipsum dolor sit amet." form="fill-certificate" required>
                </div>
            </section>
        </x-containers.content>

        <x-containers.content>
            <section class="grid grid-cols-6">
                <h3 class="font-barlowcondensed text-slate-700 col-span-6 bg-gray-100 rounded py-2 px-5 border-b" style="font-weight: 500">Applicant Details</h3>

                <div class="col-span-2 grid gap-5 font-barlowcondensed text-slate-700 p-5">
                    <label for="establishment">Establishment Name</label>
                    @error('establishment')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="firstname">First Name</label>
                    @error('firstname')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="middlename">Middle Name</label>
                    @error('middlename')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="lastname">Last Name</label>
                    @error('lastname')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="address">Address</label>
                    @error('address')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="postal_code">Postal Code</label>
                    @error('postal_code')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4 grid gap-5 p-5">
                    <input type="text" name="establishment" class="text-field w-2/3" value="" placeholder="Establishment Name" form="fill-certificate" required>
                    <input type="text" name="firstname" class="text-field w-2/4" value="" placeholder="First Name" form="fill-certificate" required>
                    <input type="text" name="middlename" class="text-field w-2/4" value="" placeholder="Middle Name" form="fill-certificate" required>
                    <input type="text" name="lastname" class="text-field w-2/4" value="" placeholder="Last Name" form="fill-certificate" required>
                    <input type="text" name="address" class="text-field" value="" placeholder="Address" form="fill-certificate" required>
                    <input type="number" name="postal_code" class="text-field w-1/4" value="" placeholder="" form="fill-certificate" required>
                </div>
            </section>
        </x-containers.content>

        <x-containers.content>
            <section class="grid grid-cols-6">
                <h3 class="font-barlowcondensed text-slate-700 col-span-6 bg-gray-100 rounded py-2 px-5 border-b" style="font-weight: 500">Payment Details</h3>

                <div class="col-span-2 grid gap-5 font-barlowcondensed text-slate-700 p-5">
                    <label for="amount">Amount Paid</label>
                    @error('amount')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="or_number">O.R. Number</label>
                    @error('or_number')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="payment_date">Payment Date</label>
                    @error('payment_date')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-4 grid gap-5 p-5">
                    <input type="number" name="amount" class="text-field w-1/4" value="" placeholder="" form="fill-certificate" required>
                    <input type="text" name="or_number" class="text-field w-1/4" value="" placeholder="" form="fill-certificate" required>
                    <input type="date" name="payment_date" class="text-field w-1/4" value="" placeholder="" form="fill-certificate" required>
                </div>
            </section>
        </x-containers.content>

        <x-containers.content>
            <section class="flex p-5 space-x-4 font-barlowcondensed text-slate-700">
                <div class="w-1/2 space-y-3">
                    <label for="chief" style="font-weight: 500">RECOMMEND APPROVAL</label>
                    <div x-data="{ show: false }" class="w-full relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="chief_label" class="font-barlowcondensed">Select Chief</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" id="dropdown" class="z-10 absolute w-full bg-blue-100 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 mt-1">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                @if(count($chiefs) == 0)
                                    <li>
                                        <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Currently, there are no Chief personnel in the system.
                                        </a>
                                    </li>
                                @else
                                    @foreach($chiefs as $chief)
                                        <li>
                                            <a @click.prevent="setPersonnel(document.getElementById('chief-{{ $chief->id }}'))" id="chief-{{ $chief->id }}" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $chief->fullname() }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <p class="text-sm">CHIEF, Fire Safety Enforcement Section</p>
                    @error('chief')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/2 space-y-3">
                    <label for="chief" style="font-weight: 500">APPROVED</label>
                    <div x-data="{ show: false }" class="w-full relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="marshal_label" class="font-barlowcondensed">Select Marshal</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" id="dropdown" class="z-10 absolute w-full bg-blue-100 rounded divide-y divide-gray-100 shadow dark:bg-gray-700 mt-2">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                @if(count($marshals) == 0)
                                    <li>
                                        <a class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Currently, there are no Marshal personnel in the system.
                                        </a>
                                    </li>
                                @else
                                    @foreach($marshals as $marshal)
                                        <li>
                                            <a @click.prevent="setPersonnel(document.getElementById('marshal-{{ $marshal->id }}'))" id="marshal-{{ $marshal->id }}" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $marshal->fullname() }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <p class="text-sm">CITY/MUNICIPAL FIRE MARSHAL</p>
                    @error('marshal')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </section>
        </x-containers.content>

        <form action="{{ route('certificates.store') }}" method="POST" id="fill-certificate">
            @csrf
            <input type="hidden" name="chief" value="" id="chief">
            <input type="hidden" name="marshal" value="" id="marshal">
        </form>

        <div class="w-11/12 mx-auto pb-5">
            <button class="bg-blue-900 w-full text-white font-barlow font-semibold rounded-full py-2 shadow tracking-wider" form="fill-certificate">SUBMIT</button>
        </div>
    </x-containers.main>

    <script>
        const business = document.getElementById('business');
        const privateItem = document.getElementById('private');
        const occupancy = document.querySelector('[name="occupancy_type"]');
        const occupancyLabel = document.getElementById('occupancy_label');

        const issuanceLabel = document.getElementById('issuance_label');
        const newItem = document.getElementById('new');
        const renewal = document.getElementById('renewal');
        const issuance = document.querySelector('[name="issuance_type"]');

        const chiefLabel = document.getElementById('chief_label');
        const chief = document.getElementById('chief');

        const marshalLabel = document.getElementById('marshal_label');
        const marshal = document.getElementById('marshal');

        business.addEventListener('click', (e) => {
            e.preventDefault();
            occupancy.value = business.innerText;
            occupancyLabel.innerText = occupancy.value;
        });

        privateItem.addEventListener('click', (e) => {
            e.preventDefault();
           occupancy.value = privateItem.innerText;
           occupancyLabel.innerText = occupancy.value;
        });

        newItem.addEventListener('click', (e) => {
           e.preventDefault();
           issuance.value = newItem.innerText;
           issuanceLabel.innerText = issuance.value;
        });

        renewal.addEventListener('click', (e) => {
           e.preventDefault();
           issuance.value = renewal.innerText;
           issuanceLabel.innerText = issuance.value;
        });

        function setPersonnel(e) {

            if (e.id.includes('chief')) {
                chief.value = e.innerText;
                chiefLabel.innerText = chief.value;
            }

            if (e.id.includes('marshal')) {
                marshal.value = e.innerText;
                marshalLabel.innerText = marshal.value;
            }
        }
    </script>
</x-layout>
