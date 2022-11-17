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
                                                    <a id="edit-button" href="{{ route('ios.print', $certificate->id,
                                                     $io->id) }}"
                                                       class="text-cyan-700" target="_blank" title="Print">
                                                        <svg class="w-6 h-6 text-blue-500" fill="none"
                                                             stroke="currentColor"
                                                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                                    </a>

{{--                                                    <a id="edit-button" href="{{ route('admin.heads.edit', $head->id) }}" class="text-cyan-700">--}}
{{--                                                        <x-icon name="edit"></x-icon>--}}
{{--                                                    </a>--}}
{{--                                                    <a @click="show = !show" id="delete-button" href="#" class="text-red-700">--}}
{{--                                                        <x-icon name="delete"></x-icon>--}}

{{--                                                        <form id="delete-{{ $head->id }}" action="{{ route('admin.heads.destroy', $head->id) }}" method="POST" style="display: none">--}}
{{--                                                            @csrf--}}
{{--                                                            @method('DELETE')--}}
{{--                                                        </form>--}}
{{--                                                    </a>--}}

{{--                                                    <div x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">--}}
{{--                                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>--}}

{{--                                                        <div class="fixed inset-0 z-10 overflow-y-auto">--}}
{{--                                                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">--}}
{{--                                                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">--}}
{{--                                                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">--}}
{{--                                                                        <div class="sm:flex sm:items-start">--}}
{{--                                                                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">--}}
{{--                                                                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />--}}
{{--                                                                                </svg>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">--}}
{{--                                                                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete personnel</h3>--}}
{{--                                                                                <div class="mt-2">--}}
{{--                                                                                    <p class="text-sm text-gray-500">Are you sure you want to delete this personnel?</p>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">--}}
{{--                                                                        <button type="button" @click.prevent="document.getElementById('delete-{{ $head->id }}').submit()" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>--}}
{{--                                                                        <button type="button" @click="show = false" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
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
