<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'body' => ['required', 'string'],
            'price' => ['required', 'integer', 'numeric', 'min:1'],
            'old_price' => ['integer', 'numeric', 'min:1', 'nullable'],
            'salon' => ['string', 'nullable'],
            'kpp' => ['required', 'string'],
            'year' => ['required', 'integer', 'numeric', 'min:2000'],
            'color' => ['required', 'string'],
            'is_new' => ['boolean', 'nullable'],
            'car_body_id' => ['integer', 'numeric', 'exists:App\Models\CarBody,id', 'nullable'],
            'car_class_id' => ['integer', 'numeric', 'exists:App\Models\CarClass,id', 'nullable'],
            'car_engine_id' => ['integer', 'numeric', 'exists:App\Models\CarEngine,id', 'nullable'],
            'category_id' => ['integer', 'numeric', 'exists:App\Models\Category,id'],
        ];

        if (request()->isMethod('post')) {
            $rules['category_id'][] = 'required';
        }

        return $rules;
    }
}
