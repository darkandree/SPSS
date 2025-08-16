<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrDetailsStoreRequest extends FormRequest
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
            'rsbsa_cr_no' => ['required','string'],
            'rsbsa_no' => ['required','string'],
            'fullname' => ['required','string'],
            'farmer_cat_id' => ['required','integer'],
            'province_id' => ['required','integer'],
            'municipality_id' => ['required','integer'],
            'barangay_id' => ['required','integer'],
        ];
    }
}
