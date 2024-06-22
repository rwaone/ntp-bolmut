<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            // 'id' => ['integer'],
            'name' => ['string', 'required'],
            'type' => ['string', 'required'],
            'code' => ['string', 'required'],
        ];

        // If the request is for updating a record
        if ($this->isMethod('PUT')) {
            // Make the fields optional
            $rules = array_map(function ($rule) {
                return array_merge(['sometimes'], $rule);
            }, $rules);
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama dokumen tidak boleh kosong.',
            'type.required' => 'Tipe dokumen tidak boleh kosong.',
            'code.required' => 'Kode dokumen tidak boleh kosong.',
            'name.string' => '',
            'type.string' => '',
            'code.string' => '',
        ];
    }
}
