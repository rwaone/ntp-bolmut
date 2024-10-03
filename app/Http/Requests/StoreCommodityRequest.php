<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommodityRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'group_id' => ['required', 'integer'],
            'min_price' => [
                'required',
                'numeric',
            ],
            'max_price' => [
                'required',
                'numeric',
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong.',
            'code.required' => 'Kode tidak boleh kosong.',
            'group_id.required' => 'Kelompok Komoditas tidak boleh kosong.',
            'min_price.required' => 'Isian tidak boleh kosong.',
            'min_price.regex' => 'Isian tidak sesuai format.',
            'max_price.required' => 'Isian tidak boleh kosong.',
            'max_price.regex' => 'Isian tidak sesuai format.',
        ];
    }
}
