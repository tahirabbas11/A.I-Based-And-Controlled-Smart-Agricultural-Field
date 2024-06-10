<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:100',
            'status' => 'required|boolean',
            'featured' => 'boolean',
            'stock' => 'required|numeric',
            'price' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
            'category' => 'required|integer',
            'short_desc' => 'required'
        ];
        if (request()->isMethod('POST')) {
            $rules['image'] = 'mimes:jpeg,jpg,png,gif,webp|required';
        }
        return $rules;
    }
}
