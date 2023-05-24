<?php

namespace App\Http\ApiV1\Modules\List\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLIstRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /*
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'desk_id' => 'required|int',
            'description' => 'required|text'
        ];
    }
}