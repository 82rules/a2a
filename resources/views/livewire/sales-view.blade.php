<main class="mx-auto max-w-5xl" x-data="{results: $wire.entangle('results'), selected: $wire.entangle('selected').live}">
    <div class="relative pt-16">
        <!-- Secondary navigation -->
        <header class="pb-4 pt-6 sm:pb-6">
            <div class="mx-auto flex max-w-7xl justify-between">
                <div class="flex  flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
                    <h1 class="text-base font-semibold leading-7 text-gray-900">Movie Sales</h1>
                    <div class="order-last flex w-full gap-x-8 text-sm font-semibold leading-6 sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
                        <button  class="{{ $timeframe === 7 ? 'text-indigo-600' : 'text-gray-700' }}" wire:click="setTimeframe(7)">Last 7 days</button>
                        <button  class="{{ $timeframe === 30 ? 'text-indigo-600' : 'text-gray-700' }}" wire:click="setTimeframe(30)">Last 30 days</button>
                        <button  class="{{ $timeframe === null ? 'text-indigo-600' : 'text-gray-700' }}" wire:click="setTimeframe(null)">All-time</button>
                    </div>
                    <span>On Day</span>
                    <input type="date" class="bg-zinc-100 rounded-lg px-2 py-1 " wire:model.live.debounce="date" />
                </div>
                <div>
                    <input wire:model.live.debounce="search"  type="text" class="p-3 rounded-lg border border-zinc-200 w-full" placeholder="Movie Search..">
                    <div class="relative">
                        <div x-show="results && results.length > 0" class="absolute z-100 w-full bg-white shadow divide-y space-y-2 rounded-lg p-4 border max-h-[400px] overflow-y-auto" @click.outside="results = []">
                            <template x-for="result in results" >
                                <button class="text-left px-2 py-1 hover:bg-zinc-200" @click="selected= result.id" x-text="result.title"></button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @if(!empty($movie))
            <button @click="selected = null" class="bg-zinc-700 text-white px-8 py-2 rounded-xl flex gap-4">
                <span>{{$movie->title}}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        @endif

        <!-- Stats -->
        <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
            <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 lg:px-2 xl:px-0">
                <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Revenue</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">${{ number_format($stats->revenue / 100,2) }}</dd>
                </div>
                <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Sales</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ ($stats->sales) }}</dd>
                </div>
                <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-l lg:border-t-0 xl:px-8">
                    <dt class="text-sm font-medium leading-6 text-gray-500">Seats Sold</dt>
                    <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">{{ ($stats->seats) }}</dd>
                </div>
            </dl>
        </div>

        <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
            <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
        </div>
    </div>
    <canvas id="chart" class="w-full h-96 mx-auto p-4 rounded-lg bg-white shadow-lg my-12" ></canvas>
    @script
    <script>
        let movieChart;
        $wire.on('chart', function(updated) {
            if(movieChart) {
                movieChart.destroy();
            }
            movieChart = new Chart(document.getElementById('chart'), {
                type: 'bar',
                data: updated[0],
                options: {
                    plugins: {
                        title: {
                            display: false,
                        },
                    },
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        });
    </script>
    @endscript
    <div class="space-y-16 py-16 xl:space-y-20">
        <!-- Recent activity table -->
        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Recent activity</h2>
            </div>
            <div class="mt-6 overflow-hidden border-t border-gray-100">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                        <table class="w-full text-left">
                            <thead class="sr-only">
                            <tr>
                                <th>Amount</th>
                                <th class="hidden sm:table-cell">Client</th>
                                <th>More details</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($movies as $movie)
                                 <tr>
                                     <td class="relative py-5 pr-6">
                                         <div class="flex gap-x-6">
                                             <svg class="hidden h-6 w-5 flex-none text-gray-400 sm:block" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                                 <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm-.75-4.75a.75.75 0 0 0 1.5 0V8.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0L6.2 9.74a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z" clip-rule="evenodd" />
                                             </svg>
                                             <div class="flex-auto">
                                                 <div class="space-y-3">
                                                     <div class="text-sm leading-6 text-gray-900">{{$movie->title }}</div>
                                                     <span class="text-xs">{{ $movie->synopsis }}</span>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                                         <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                                     </td>
                                     <td class="hidden py-5 pr-6 sm:table-cell">
                                         <div class="text-sm font-medium leading-6 text-gray-900">${{number_format($movie->revenue /100, 2)}}</div>
                                         <div class="mt-1 text-xs leading-5 text-gray-500">{{ $movie->count }} sales</div>
                                     </td>
                                     <td class="py-5 text-right">
                                         <div class="mt-1 text-xs leading-5 text-gray-500">Total People <span class="text-gray-900">{{ $movie->sales }}</span></div>
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
</main>
