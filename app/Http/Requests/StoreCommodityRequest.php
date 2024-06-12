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
            'name' => ['required','string'],
            'code' => ['required','string'],
            'group_id' => ['required','integer'],
            'min_change' => [
                'required',
                'regex:/^\d{1,3}(\.\d{1,2})?$/',
                'numeric',
            ],
            'max_change' => [
                'required',
                'regex:/^\d{1,3}(\.\d{1,2})?$/',
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
            'min_change.required' => 'Isian tidak boleh kosong.',
            'min_change.regex' => 'Isian tidak sesuai format.',
            'max_change.required' => 'Isian tidak boleh kosong.',
            'max_change.regex' => 'Isian tidak sesuai format.',
        ];
    }
}
