<?php

namespace Domain\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

   protected function prepareForValidation()
   {
       $this->merge(['code' => $this->code]);
   }

    public function rules(): array
    {
        return [
            'code' => 'exists:products,code'
        ];
    }

    public function messages(): array
    {
        return [
            'code.exists' => 'Ops! O código informado não existe'
        ];
    }
}
