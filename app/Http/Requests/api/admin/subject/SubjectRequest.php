<?php

namespace App\Http\Requests\api\admin\subject;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required'],
            'expired_date' => ['required'],
            'semester' => ['required'],
            'status' => ['required'],
            'expired_date' => ['date'],
            'semester' => ['in:first,second']
        ];
    }
}
