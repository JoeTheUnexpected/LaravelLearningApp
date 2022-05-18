<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = News::factory()
            ->count(5)
            ->sequence(fn ($sequence) => ['published_at' => Carbon::parse(mt_rand(strtotime('first day of this month 00:00'), time()))])
            ->create()
            ->merge(
                News::factory()
                    ->count(15)
                    ->create()
            );
    }
}
