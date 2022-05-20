<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Tag;
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
        $tags = Tag::factory()->count(10)->create();

        $news = News::factory()
            ->count(5)
            ->sequence(fn ($sequence) => ['published_at' => Carbon::parse(mt_rand(strtotime('first day of this month 00:00'), time()))])
            ->create()
            ->merge(
                News::factory()
                    ->count(15)
                    ->create()
            );

        $news->each(function ($item) use ($tags) {
            $item->tags()->attach($tags->random(mt_rand(0, 5)));
        });
    }
}
