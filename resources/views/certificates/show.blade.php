<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold">CERTIFICATES</span>
            <x-icon name="right-arrow"/>
            <span class="cursor-pointer font-barlowcondensed underline">NO. R{{ $certificate->fsic_id }}</span>
        </x-containers.sub-header>

        <x-containers.content>
            <section class="flex">
                <h3 class="font-barlowcondensed text-slate-700 col-span-6 bg-gray-200 rounded py-2 px-5 border-b">
                    Certificate Status
                </h3>

                <div class="form-labels">
                    <label for="">Type</label>
                    <label for="">Occupancy</label>
                    <label for="">Valid Until</label>
                    <label for="">Status</label>
                </div>

                <div class="w-full space-y-2.5 p-5">
                    <input type="text" value="{{ $certificate->issuance_type }}" class="text-field bg-gray-200" disabled>
                    <input type="text" value="{{ $certificate->occupancy_type }}" class="text-field" disabled>
                    <input type="text" value="{{ date('F j, Y', strtotime($certificate->valid_until)) }}" class="text-field w-44" disabled>
                    <div x-data="{ show: false }" class="w-1/3 relative">
                        <button @click="show = !show" @click.away="show = false" class="dropdown-trigger" type="button">
                            <span id="occupancy_label" class="font-barlow">{{ old('occupancy_label') ?? 'Occupancy Type' }}</span>

                            <x-icon name="down-arrow"></x-icon>
                        </button>
                        <!-- Dropdown menu -->
                        <div x-show="show" style="display: none" class="z-10 absolute bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
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
                </div>
            </section>
        </x-containers.content>
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
