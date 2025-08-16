<?php

namespace App\Http\Requests;
use App\Models\EncoderAccomplishment;
use Illuminate\Foundation\Http\FormRequest;

class EncoderAccomplishmentRequest extends FormRequest
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
            'upload_id' => ['null','string','max:50','unique:' . EncoderAccomplishment::class],
            'upload_year' => ['required','integer'],
            'upload_month' => ['required','string'],
            'uploader_id' => ['null','string']
        ];
    }
}
