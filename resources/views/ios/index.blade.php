<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <section class="flex items-center">
                <span class="font-bold">INSPECTION ORDERS</span>
                <x-icon name="right-arrow"/>
                <span class="cursor-pointer font-barlowcondensed underline">NO. R{{ $certificate->fsic_id }}</span>
            </section>

            <x-slot name="actions">
                <div class="absolute right-0 mr-4">
                    <div x-data="{ show: false }" class="space-y-2 relative">
                        <div class="flex space-x-2">
                            <a href="{{ route('ios.create', $certificate->id) }}" class="text-white bg-blue-500
                            hover:bg-blue-800
                            focus:ring-4 focus:outline-none
                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1.5 text-center flex justify-between
                        items-center space-x-2">
                                <x-icon name="add"></x-icon>

                                <span>Create Inspection Order</span>
                            </a>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-containers.sub-header>

        <x-containers.content>
            @if (count($inspection_orders) == 0)
                <section class="flex items-center space-x-1 p-2 justify-between">
                    <div class="flex items-center space-x-1 p-2">
                        <div class="text-slate-500 mt-0.5">
                            <x-icon name="info"></x-icon>
                        </div>
                        <p class="text-sm text-slate-500 font-barlow">Currently, there are no <span
                                class="font-semibold">Inspection
                                Order/s</span>
                            associated with this Certificate .
                        </p>
                    </div>
                </section>
            @else
                <div class="w-full">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-auto">
                                    <table class="min-w-full">
                                        <thead class="border-b">
                                        <tr class="font-barlow text-slate-700">
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                Inspection Order NO.
                                            </th>
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                IO TO
                                            </th>
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                Proceed
                                            </th>
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                Purpose
                                            </th>
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                Duration
                                            </th>
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                Remarks
                                            </th>
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                Date Released
                                            </th>
                                            <th scope="col" class="text-sm px-6 py-4 text-left">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($inspection_orders as $io)
                                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100
                                    text-left font-barlowcondensed">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700">
                                                    {{ $io->io_number }}
                                                </td>
                                                <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                    {{ $io->io_to }}
                                                </td>
                                                <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                    {{ $io->proceed }}
                                                </td>
                                                <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                    {{ $io->purpose }}
                                                </td>
                                                <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                    {{ $io->duration }}
                                                </td>
                                                <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                    {{ $io->remarks }}
                                                </td>
                                                <td class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap">
                                                    {{ date('F j, Y, g:i a', strtotime($io->processed_at)) }}
                                                </td>
                                                <td x-data="{ show: false }" class="text-sm text-slate-700 px-6 py-4 whitespace-nowrap
                                            flex space-x-2">
                                                    <a id="" href="{{ route('ios.print', [$certificate->id, $io->id]) }}"
                                                       class="text-cyan-700" target="_blank" title="Print">
                                                        <svg class="w-6 h-6 text-blue-500" fill="none"
                                                             stroke="currentColor"
                                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                                    </a>


                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
