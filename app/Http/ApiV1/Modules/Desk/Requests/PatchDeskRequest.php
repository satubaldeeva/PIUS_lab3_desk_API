<?php

namespace App\Http\ApiV1\Modules\Desk\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatchDeskRequest extends FormRequest
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
            'name' => 'string',
        ];
    }
}