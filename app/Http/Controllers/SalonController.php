<?php

namespace App\Http\Controllers;

use App\Services\SalonsClientService;
use Illuminate\Support\Facades\Cache;

class SalonController extends Controller
{
    public function index(SalonsClientService $salonsClientService)
    {
        try {
            $salons = Cache::tags(['salons'])->remember('salons', now()->addHour(), function () use ($salonsClientService) {
                return $salonsClientService->getSalons();
            });
        } catch (\Exception $e) {
            $salons = collect();
            return view('pages.salons.index', compact('salons'))->withErrors(['custom_error' => $e->getMessage()]);
        }

        return view('pages.salons.index', compact('salons'));
    }
}
