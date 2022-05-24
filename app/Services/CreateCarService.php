<?php

namespace App\Services;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class CreateCarService
{
    public function __construct(
        private CarRequest $carRequest
    ) {}

    public function create()
    {
        return DB::transaction(function () {
            return Car::create($this->carRequest->validated());
        });
    }
}