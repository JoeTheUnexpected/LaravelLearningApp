<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createFixed();
    }

    // Создать структуру как в изначальной верстке
    private function createFixed()
    {
        Category::create([
            'name' => 'Легковые',
            'slug' => 'light',
            'sort' => 1,

            'children' => [
                [
                    'name' => 'Седаны',
                    'slug' => 'sedans',
                    'sort' => 1,
                ],
                [
                    'name' => 'Хетчбеки',
                    'slug' => 'hatchbacks',
                    'sort' => 2,
                ],
                [
                    'name' => 'Универсалы',
                    'slug' => 'universals',
                    'sort' => 3,
                ],
                [
                    'name' => 'Купе',
                    'slug' => 'coupes',
                    'sort' => 4,
                ],
                [
                    'name' => 'Родстеры',
                    'slug' => 'roadsters',
                    'sort' => 5,
                ],
            ],
        ]);

        Category::create([
            'name' => 'Внедорожники',
            'slug' => 'suv',
            'sort' => 2,

            'children' => [
                [
                    'name' => 'Рамные',
                    'slug' => 'frames',
                    'sort' => 1,
                ],
                [
                    'name' => 'Пикапы',
                    'slug' => 'pickups',
                    'sort' => 2,
                ],
                [
                    'name' => 'Кроссоверы',
                    'slug' => 'crossovers',
                    'sort' => 3,
                ],
            ],
        ]);

        Category::create([
            'name' => 'Раритетные',
            'slug' => 'rare',
            'sort' => 3,
        ]);

        Category::create([
            'name' => 'Распродажа',
            'slug' => 'sale',
            'sort' => 4,
        ]);

        Category::create([
            'name' => 'Новинки',
            'slug' => 'new',
            'sort' => 5,
        ]);
    }

    // Создать рандомную структуру
    private function createRandom()
    {
        $categories = Category::factory()
            ->count(10)
            ->create();

        $categories->each(function ($category) {
            $this->appendNodes($category);
        });
    }

    private function appendNodes($category)
    {
        if (mt_rand(1, 100) <= 70) {
            $subcategories = Category::factory()->count(mt_rand(0, 3))->create()->each(function ($subcategory) use ($category) {
                $category->appendNode($subcategory);
            });

            $subcategories->each(function ($subcategory) {
                if (mt_rand(1, 100) <= 70) {
                    $this->appendNodes($subcategory);
                }
            });
        }
    }
}
