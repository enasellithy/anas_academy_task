<?php

namespace App\Http\Requests\API\Product;

use App\SOLID\Traits\JsonTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddProductRequest extends FormRequest
{
    use JsonTrait;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:100',
            ],
            'price' => [
                'required',
            ],
            'category_id' => [
                'required',
                'numeric'
            ],
            'quantity' => [
                'required',
                'min:1',
                'numeric'
            ],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $err = $validator->errors()->first();
        throw new HttpResponseException($this->whenError($err));
    }
}
