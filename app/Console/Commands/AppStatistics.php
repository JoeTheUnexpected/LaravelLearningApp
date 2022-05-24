<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AppStatistics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Вывод статистики приложения';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $carsCount = DB::table('cars')->count();
        $newsCount = DB::table('news')->count();
        $tagWithMostNews = Tag::withCount('news')->orderByDesc('news_count')->first();
        $longestNews = DB::table('news')->selectRaw('title, id, LENGTH(title) as title_length')->orderByRaw('title_length desc')->first();
        $shortestNews = DB::table('news')->selectRaw('title, id, LENGTH(title) as title_length')->orderByRaw('title_length')->first();
        $averageTagNews = Tag::withCount('news')->having('news_count', '>', 0)->avg('news_count');
        $mostTaggedNews = DB::table('news as n')->select(DB::raw('n.title, n.id, (select count(*) from tags inner join taggables t on t.tag_id = tags.id where t.taggable_id = n.id and t.taggable_type = ?) as tags_count'))->setBindings([News::class])->orderByDesc('tags_count')->first();

        $this->table(
            ['Описание', 'Значение'],
            [
                ['Общее количество машин', $carsCount],
                ['Общее количество новостей', $newsCount],
                ['Тег, у которого больше всего новостей на сайте', "название: $tagWithMostNews->name, id: $tagWithMostNews->id, количество новостей: $tagWithMostNews->news_count"],
                ['Самая длинная новость', "название: $longestNews->title, id: $longestNews->id, длина новости в символах: $longestNews->title_length"],
                ['Самая короткая новость', "название: $shortestNews->title, id: $shortestNews->id, длина новости в символах: $shortestNews->title_length"],
                ['Средние количество новостей у тега', $averageTagNews],
                ['Самая тегированная новость', "название: $mostTaggedNews->title, id: $mostTaggedNews->id, количество тегов: $mostTaggedNews->tags_count"],
            ]);

        return 0;
    }
}
