<x-layout>
    @include('_header')
    @include('_side-nav')

    <x-containers.main>
        <div id="statistics"
             style="display: none"
             data-total-certificates="{{ $total_certificates }}"
             data-total-completed="{{ $total_completed }}"
             data-total-incomplete="{{ $total_incomplete }}"
             data-total-expired="{{ $total_expired }}"
        >
        </div>

        <x-containers.sub-header>
            <span class="font-bold font-100">DASHBOARD</span>
        </x-containers.sub-header>

        <x-containers.content class="bg-transparent">
            <section class="grid grid-cols-4 gap-2 mb-5">
                <div class="border space-y-5 p-2 bg-blue-500 rounded font-barlow text-white">
                    <div class="flex justify-between items-center w-11/12">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>

                        <h1 class="text-4xl">{{ $total_certificates }}</h1>
                    </div>

                    <p class="">Total Number of Certificates</p>
                </div>

                <div class="border space-y-5 p-2 bg-green-500 rounded font-barlow text-white">
                    <div class="flex justify-between items-center w-11/12">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

                        <h1 class="text-4xl">{{ $total_completed }}</h1>
                    </div>

                    <p>Total Number of Completed Certific`ates</p>
                </div>

                <div class="border space-y-5 p-2 bg-gray-500 text-white rounded font-barlow">
                    <div class="flex justify-between items-center w-11/12">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>

                        <h1 class="text-4xl">{{ $total_incomplete }}</h1>
                    </div>

                    <p>Total Number of For Inspection Certificates</p>
                </div>

                <div class="border space-y-5 p-2 bg-red-500 text-white rounded font-barlow">
                    <div class="flex justify-between items-center w-11/12">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>

                        <h1 class="text-4xl">{{ $total_expired }}</h1>
                    </div>

                    <p>Total Number of Expired Certificates</p>
                </div>
            </section>
        </x-containers.content>

        <x-containers.content>
            <section class="w-11/12 mx-auto p-5">
                <canvas id="myChart"></canvas>
            </section>
        </x-containers.content>
    </x-containers.main>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const statistics = document.getElementById('statistics').dataset;
        const stats = Object.values(Object.assign({}, statistics));
        console.log(stats);



        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Certificates', 'Completed Certificates', 'Incomplete Certificates', 'Expired Certificates'],
                datasets: [{
                    label: ['# of Certificates'],
                    data: stats,
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
                      position: "right",
                      display: false
                  }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-layout>
