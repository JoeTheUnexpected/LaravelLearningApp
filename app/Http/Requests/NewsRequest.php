<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'slug' => ['required', 'string', 'min:5', 'max:100'],
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'published_at' => ['nullable']
        ];

        $rules['slug'][] = request()->routeIs('news.store')
            ? 'unique:news'
            : Rule::unique('news')->ignore($this->news, 'slug');

        $rules['title'][] = request()->routeIs('news.store')
            ? 'unique:news'
            : Rule::unique('news')->ignore($this->news, 'title');

        return $rules;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug(request('title')),
            'published_at' => request('published') ? now() : null
        ]);
    }
}
