<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <x-containers.sub-header>
            <span class="font-bold font-100">DASHBOARD</span>
        </x-containers.sub-header>

        <x-containers.content class="bg-transparent shadow-none">
            <section class="flex gap-2 mb-5">
                <div class="border space-y-5 p-2 bg-blue-500 rounded font-barlow text-white flex-1">
                    <div class="flex justify-between items-center w-11/12">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>

                        <h1 class="text-4xl">{{ $total_certificates }}</h1>
                    </div>

                    <p class="">Total Number of Certificates</p>
                </div>

                <div class="border space-y-5 p-2 bg-green-500 rounded font-barlow text-white flex-1">
                    <div class="flex justify-between items-center w-11/12">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>

                        <h1 class="text-4xl">{{ $certificates_today }}</h1>
                    </div>

                    <p class="">Certificates Processed Today</p>
                </div>

                <div class="border space-y-5 p-2 bg-orange-500 rounded font-barlow text-white flex-1">
                    <div class="flex justify-between items-center w-11/12">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>

                        <h1 class="text-4xl">{{ $monthly_certificates }}</h1>
                    </div>

                    <p class="">Certificates Processed this Month</p>
                </div>
            </section>
        </x-containers.content>

{{--        <section class="w-11/12 mx-auto flex space-x-5">--}}
{{--            <section class="w-1/2 bg-white p-3 rounded shadow">--}}
{{--                <canvas id="allCertificates"></canvas>--}}
{{--            </section>--}}

{{--            <section class="w-1/2 bg-white p-3 rounded shadow">--}}
{{--                <canvas id="monthlyCertificates"></canvas>--}}
{{--            </section>--}}
{{--        </section>--}}

        <section class="w-11/12 mx-auto flex space-x-5 mt-5">
            <section class="w-2/3 mx-auto bg-white p-3 rounded shadow">
                <canvas id="yearlyCertificates"></canvas>
            </section>
        </section>

{{--        <div id="statistics1"--}}
{{--             style="display: none"--}}
{{--             data-total-certificates="{{ $total_certificates }}"--}}
{{--             data-total-completed="{{ $total_completed }}"--}}
{{--             data-total-incomplete="{{ $total_incomplete }}"--}}
{{--             data-total-expired="{{ $total_expired }}"--}}
{{--        >--}}
{{--        </div>--}}

{{--        <div id="statistics2"--}}
{{--             style="display: none"--}}
{{--             data-monthly-certificates="{{ $monthly_certificates }}"--}}
{{--             data-monthly-completed-certificates="{{ $monthly_completed_certificates }}"--}}
{{--        >--}}
{{--        </div>--}}

        <div id="statistics3"
             style="display: none"
             data-january="{{ $monthly_count['01'] }}"
             data-february="{{ $monthly_count['02'] }}"
             data-march="{{ $monthly_count['03'] }}"
             data-april="{{ $monthly_count['04'] }}"
             data-may="{{ $monthly_count['05'] }}"
             data-june="{{ $monthly_count['06'] }}"
             data-july="{{ $monthly_count['07'] }}"
             data-august="{{ $monthly_count['08'] }}"
             data-september="{{ $monthly_count['09'] }}"
             data-october="{{ $monthly_count['10'] }}"
             data-november="{{ $monthly_count['11'] }}"
             data-december="{{ $monthly_count['12'] }}"
        >
        </div>
    </x-containers.main>

    @include('_flash')

    <script>
        // const ctx1 = document.getElementById('allCertificates').getContext('2d');
        // const ctx2 = document.getElementById('monthlyCertificates').getContext('2d');
        const ctx3 = document.getElementById('yearlyCertificates').getContext('2d');
        // const statistics1 = document.getElementById('statistics1').dataset;
        // const statistics2 = document.getElementById('statistics2').dataset;
        const statistics3 = document.getElementById('statistics3').dataset;
        // const stats1 = Object.values(Object.assign({}, statistics1));
        // const stats2 = Object.values(Object.assign({}, statistics2));
        const stats3 = Object.values(Object.assign({}, statistics3));
        // console.log(stats1);
        // console.log(stats2);
        console.log(stats3);

        // const allCertificates = new Chart(ctx1, {
        //     type: 'bar',
        //     data: {
        //         labels: ['Total Certificates', 'Completed Certificates', 'Incomplete Certificates', 'Expired Certificates'],
        //         datasets: [{
        //             label: ['# of Certificates'],
        //             data: stats1,
        //             backgroundColor: [
        //                 '#3B82F6',
        //                 '#22C55E',
        //                 '#6B7280',
        //                 '#EF4444'
        //             ],
        //             borderColor: [
        //                 '#3B82F6',
        //                 '#22C55E',
        //                 '#6B7280',
        //                 '#EF4444'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         plugins: {
        //             legend: {
        //                 position: "right",
        //                 display: false
        //             }
        //         },
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //                 ticks: {
        //                     precision: 0
        //                 }
        //             }
        //         }
        //     }
        // });

        // const monthlyCertificates = new Chart(ctx2, {
        //     type: 'bar',
        //     data: {
        //         labels: ['Total Certificates this Month', 'Completed Certificates this Month'],
        //         datasets: [{
        //             label: ['# of Certificates'],
        //             data: stats2,
        //             backgroundColor: [
        //                 '#3B82F6',
        //                 '#22C55E',
        //                 '#6B7280',
        //                 '#EF4444'
        //             ],
        //             borderColor: [
        //                 '#3B82F6',
        //                 '#22C55E',
        //                 '#6B7280',
        //                 '#EF4444'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         plugins: {
        //             legend: {
        //                 position: "right",
        //                 display: false
        //             }
        //         },
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //                 ticks: {
        //                     precision: 0
        //                 }
        //             }
        //         }
        //     }
        // });

        const yearlyCertificates = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: ['# of Certificate(s)'],
                    data: stats3,
                    backgroundColor: [
                        '#3B82F6',
                        '#22C55E',
                        '#6B7280',
                        '#EF4444'
                    ],
                    borderColor: [
                        '#3B82F6',
                        '#22C55E',
                        '#6B7280',
                        '#EF4444'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: "top",
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });


    </script>
</x-layout>
