<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RSBSAStatusFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'document_id' => ['required', 'string','max:255'],
            'province_id' => ['required','integer'],
            'municipality_id' => ['required','integer'],
            'storage_id' => ['required','integer'],
            'no_forms' => ['nullable','integer'],

            'receivedfrom_id' => ['required','integer'],
           'distributedby_id' => ['nullable','string','max:255'],
           'encodedby_id' => ['nullable','string','max:255'],
            'returnedto_id' => ['nullable','string','max:255']
        ];
    }
}
