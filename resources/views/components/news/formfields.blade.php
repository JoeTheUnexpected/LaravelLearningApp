@props(['news'])
<x-input.group for="title_field" label="Название новости" :error="$errors->first('title')">
    <x-input.text id="title_field" name="title" value="{{ old('title', $news->title) }}" :error="$errors->first('title')"/>
</x-input.group>

<x-input.group for="description_field" label="Краткое описание новости" :error="$errors->first('description')">
    <x-input.text id="description_field" name="description" value="{{ old('description', $news->description) }}" :error="$errors->first('description')"/>
</x-input.group>

<x-input.group for="body_field" label="Детальное описание новости" :error="$errors->first('body')">
    <x-input.textarea id="body_field" name="body" value="{{ old('body', $news->body) }}" :error="$errors->first('body')"/>
</x-input.group>

<x-input.group for="tags_field" label="Теги" :error="$errors->first('tags')">
    <x-input.text id="tags_field" name="tags" value="{{ old('tags', $news->tags->pluck('name')->implode(',')) }}" :error="$errors->first('tags')"/>
</x-input.group>

<x-input.checkbox name="published" label="Опубликовать" checked="{{ old('published', $news->published_at) ? 'checked' : '' }}"/>
