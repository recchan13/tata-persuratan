<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSignerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'code' => __('model.signer.code'),
            'name' => __('model.signer.name'),
            'description' => __('model.signer.description'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', Rule::unique('signers')->ignore($this->id)],
            'name' => ['required'],
            'description'=> ['nullable'],
        ];
    }
}
