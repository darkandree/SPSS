<?php

namespace App\Http\Requests;

use App\Models\Form;
use App\Models\RSBSAForm;
use Illuminate\Foundation\Http\FormRequest;

class RSBSAFormRequest extends FormRequest
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
            //'document_id' => ['required', 'string', 'max:255', 'unique:' . RSBSAForm::class],
            'province_id' => ['required','integer'],
            'municipality_id' => ['required','integer'],
            'storage_id' => ['required','integer'],
            'no_forms' => ['required','integer'],
            'receivedfrom_id' => ['required','integer']
            //'file_location' => ['required','string']
        ];
    }
}
