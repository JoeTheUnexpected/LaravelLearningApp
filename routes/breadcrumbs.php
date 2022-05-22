<?php

use App\Models\Car;
use App\Models\News;
use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;
use \Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Cache;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная страница', route('home'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О компании', route('about'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контактная информация', route('contact'));
});

Breadcrumbs::for('sales', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Условия продаж', route('sales'));
});

Breadcrumbs::for('financial', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Финансовый отдел', route('financial'));
});

Breadcrumbs::for('clients', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Для клиентов', route('clients'));
});

Breadcrumbs::for('news.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Все новости', route('news.index'));
});

Breadcrumbs::for('news.create', function (BreadcrumbTrail $trail) {
    $trail->parent('news.index');
    $trail->push('Создание новости', route('news.create'));
});

Breadcrumbs::for('news.show', function (BreadcrumbTrail $trail, $newsKey) {
    $news = Cache::tags(['news', 'tags'])->remember("news|key=$newsKey", now()->addHour(), function () use ($newsKey) {
        return News::where(News::make()->getRouteKeyName(), $newsKey)->with('tags')->firstOrFail();
    });

    $trail->parent('news.index');
    $trail->push($news->title, route('news.show', $newsKey));
});

Breadcrumbs::for('news.edit', function (BreadcrumbTrail $trail, $newsKey) {
    $trail->parent('news.show', $newsKey);
    $trail->push('Редактирование новости', route('news.edit', $newsKey));
});

Breadcrumbs::for('catalog.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog.index'));
});

Breadcrumbs::for('catalog.category', function (BreadcrumbTrail $trail, $categoryKey) {
    $trail->parent('catalog.index');

    $category = Cache::tags(['category'])->remember("category|key=$categoryKey", now()->addHour(), function () use ($categoryKey) {
        return Category::where(Category::make()->getRouteKeyName(), $categoryKey)->with('ancestors')->firstOrFail();
    });

    foreach ($category->ancestors as $ancestor) {
        $trail->push($ancestor->name, route('catalog.category', $ancestor->getRouteKey()));
    }

    $trail->push($category->name, route('catalog.category', $categoryKey));
});

Breadcrumbs::for('catalog.show', function (BreadcrumbTrail $trail, $carKey) {
    $car = Cache::tags(['cars'])->remember("car|key=$carKey", now()->addHour(), function () use ($carKey) {
        return Car::with('carBody', 'carClass', 'carEngine', 'category')->where(Car::make()->getRouteKeyName(), $carKey)->firstOrFail();
    });

    $trail->parent('catalog.category', $car->category->getRouteKey());
    $trail->push($car->name, route('catalog.show', $carKey));
});
