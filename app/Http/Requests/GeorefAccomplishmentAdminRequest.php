<?php

namespace App\Http\Requests;
use App\Models\GeorefAccomplishment;
use Illuminate\Foundation\Http\FormRequest;

class GeorefAccomplishmentAdminRequest extends FormRequest
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
            'geo_status_id' => ['nullable','integer'],
            'remarks' => ['nullable','string']
        ];
    }
}
