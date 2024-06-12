<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQualityRequest extends FormRequest
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
        return [
            //
            'id' => ['nullable', 'integer'],
            'code' => ['required', 'string'],
            'commodity_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'min_price' => [
                'required',
                // 'regex:/^\d{1,3}(\.\d{1,2})?$/',
                'numeric',
            ],
            'max_price' => [
                'required',
                // 'regex:/^\d{1,3}(\.\d{1,2})?$/',
                'numeric',
            ],
            'status' => ['required', 'string'],
        ];
    }
}
