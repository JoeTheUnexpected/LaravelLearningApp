<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carBodies = CarBody::factory()->count(4)->create();
        $carClasses = CarClass::factory()->count(4)->create();
        $carEngines = CarEngine::factory()->count(4)->create();

        Car::factory()
            ->count(20)
            ->sequence(fn ($sequence) => [
                'car_body_id' => mt_rand(1, 100) <= 50 ? null : $carBodies->random(),
                'car_class_id' => $carClasses->random(),
                'car_engine_id' => $carEngines->random(),
                ])
            ->create();
    }
}
