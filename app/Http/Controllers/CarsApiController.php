<?php

namespace App\Http\Controllers;

use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\CreateCarService;
use App\Services\UpdateCarService;

class CarsApiController extends Controller
{
    public function index()
    {
        return response()->json(CarResource::collection(Car::all()));
    }

    public function store(CreateCarService $createCarService)
    {
        $car = $createCarService->create();

        return response()->json([
            'success' => true,
            'car_id' => $car->id
        ]);
    }

    public function update(Car $car, UpdateCarService $updateCarService)
    {
        $updateCarService->update($car);

        return response()->json([
            'success' => true,
            'car_id' => $car->id
        ]);
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return response()->json([
            'success' => true,
            'car_id' => $car->id
        ]);
    }
}
