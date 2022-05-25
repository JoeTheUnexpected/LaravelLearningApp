<?php

namespace App\View\Components;

use App\Services\SalonsClientService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Salons extends Component
{
    public Collection $salons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SalonsClientService $salonsClientService)
    {
        try {
            $this->salons = Cache::tags(['salons'])->remember('salons', now()->addHour(), function () use ($salonsClientService) {
                return $salonsClientService->getSalons();
            })->random(2);
        } catch (\Exception $e) {
            $this->salons = collect();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.panels.salons');
    }
}
