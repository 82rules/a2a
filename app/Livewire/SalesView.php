<?php

namespace App\Livewire;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesView extends Component
{

    public $timeframe;
    public $search;

    public function mount()
    {
        $this->timeframe = 7;
        $this->trends();
    }

    public function setTimeframe($amount)
    {
        $this->timeframe = $amount;
        $this->trends();
    }

    private function base() {
        $base = Sale::select(DB::raw('count(*) as sales'), DB::raw('sum(cost) as revenue'), DB::raw('sum(chairs) as seats'));
        if(!empty($this->search)){
            $base = $base->whereHas('showtime.movie', function($q){
                $q->where('movies.title', 'like', '%'.$this->search.'%');
            });
        }
        if(!empty($this->timeframe)) {
            $time = now()->sub($this->timeframe, 'day');
            $base =  $base->whereBetween('sales.created_at', [$time, now()]);
        }
        return $base;
    }
    private function trends()
    {
        $data = $this->base()->select(
            DB::raw('Date(created_at) as date'),
            DB::raw('count(*) as count'),
            DB::raw('sum(cost) as revenue'),
            DB::raw('sum(chairs) as sales')
        )->groupBy(
            DB::raw('Date(created_at)'),
        )->orderBy(DB::raw('Date(created_at)'))->get();


        $chartData = [
            'labels' => $data->pluck('date'), // You need to define your labels array here
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => $data->pluck('count'),
                ],
                [
                    'label' => 'People',
                    'data' => $data->pluck('sales'),
                ]
            ]
        ];
        $this->dispatch('chart', $chartData);
    }
    private function stats()
    {
        return $this->base()->first();
    }
    private function movieList()
    {
        return $this->base()
            ->join('showtimes', 'sales.showtime_id', 'showtimes.id')
            ->join('movies', 'showtimes.movie_id', 'movies.id')
            ->select(
                DB::raw('movies.title'),
                DB::raw('movies.synopsis'),
                DB::raw('count(*) as count'),
                DB::raw('sum(sales.cost) as revenue'),
                DB::raw('sum(sales.chairs) as sales')
            )
            ->groupBy('movies.id')
            ->orderByDesc('sales')
            ->get();
    }

    public function render()
    {
        $stats = $this->stats();

        $movies = $this->movieList();

        return view('livewire.sales-view', compact('stats',  'movies'));
    }
}