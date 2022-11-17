<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">INSPECTION ORDERS</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">NO. R{{ $certificate->fsic_id }}</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">Create Inspection Order</span>
        </x-containers.sub-header>

        <x-containers.content>
            <section class="grid grid-cols-6">
                <div class="col-span-2 grid gap-5 font-barlowcondensed text-slate-700 p-5">
                    <label for="io_number">Inspection Order Number</label>
                    @error('io_number')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="processed_at">Date</label>
                    @error('processed_at')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="io_to">TO:</label>
                    @error('io_to')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="proceed">PROCEED:</label>
                    @error('proceed')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="purpose">PURPOSE:</label>
                    @error('purpose')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="duration">DURATION:</label>
                    @error('duration')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror

                    <label for="description">REMARKS OR ADDITIONAL INSTRUCTION/S:</label>
                    @error('description')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-fields">
                    <input name="io_number" type="number" class="text-field w-1/6" form="create-io" value="{{ old
                    ('io_number') }}">
                    <input name="processed_at" type="date" class="text-field w-1/6" form="create-io" value="{{ old
                    ('processed_at') }}">
                    <input name="io_to" type="text" class="text-field w-2/3" form="create-io" value="{{ old
                    ('io_to') }}">
                    <input name="proceed" type="text" class="text-field w-2/3" form="create-io" value="{{ old
                    ('proceed') }}">
                    <input name="purpose" type="text" class="text-field w-2/3" form="create-io" value="{{ old
                    ('purpose') }}">
                    <input name="duration" type="text" class="text-field w-2/3" form="create-io" value="{{ old
                    ('duration') }}">
                    <input name="remarks" type="text" class="text-field" form="create-io" value="{{ old
                    ('remarks') }}">
                </div>
            </section>
        </x-containers.content>

        <x-containers.content>
            <section class="flex p-5 space-x-4 font-barlowcondensed text-slate-700">
                <div class="w-1/2 space-y-3">
                    <label for="chief" style="font-weight: 500">RECOMMEND APPROVAL</label>
                    <input type="text" class="text-field bg-gray-300" value="{{ $certificate->chief }}"
                            disabled>
                    <input type="hidden" name="chief" value="{{ $certificate->chief }}" form="create-io">
                    <p class="text-sm">CHIEF, Fire Safety Enforcement Section</p>

                    @error('chief')
                        <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-1/2 space-y-3">
                    <label for="chief" style="font-weight: 500">APPROVED</label>
                    <input type="text" class="text-field bg-gray-300" value="{{ $certificate->marshal
                    }}" disabled>
                    <input type="hidden" name="marshal" value="{{ $certificate->marshal }}" form="create-io">
                    <p class="text-sm">CITY/MUNICIPAL FIRE MARSHAL</p>
                    @error('marshal')
                    <p class="absolute mt-5 text-xs font-varela text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </section>
        </x-containers.content>

        <form action="{{ route('ios.store', $certificate->id) }}" method="POST" id="create-io">
            @csrf
            <input type="hidden" name="certificate_id" value="{{ $certificate->id }}">
        </form>

        <div class="w-11/12 mx-auto pb-5">
            <button class="bg-blue-900 w-full text-white font-barlow font-semibold rounded-full py-2 shadow
            tracking-wider" form="create-io">SUBMIT</button>
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
