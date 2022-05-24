<?php

namespace App\Services;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class UpdateCarService
{
    public function __construct(
        private CarRequest $carRequest
    ) {}

    public function update(Car $car)
    {
        DB::transaction(function () use ($car) {
            $car->update($this->carRequest->validated());
        });
    }
}