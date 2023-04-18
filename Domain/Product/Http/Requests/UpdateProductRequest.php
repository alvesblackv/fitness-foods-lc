<?php

namespace Domain\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'exists:products,code',
            'url' => 'required|url',
            'creator' => 'required|max:255',
            'product_name' => 'required|max:255',
            'quantity' => 'required|max:255',
            'brands' => 'required',
            'categories' => 'required',
            'labels' => 'required',
            'cities' => 'required',
            'purchase_places' => 'required',
            'stores' => 'required',
            'ingredients_text' => 'required',
            'traces' => 'required',
            'serving_quantity' => 'required|max:255',
            'nutriscore_score' => 'required',
            'nutriscore_grade' => 'required|max:255',
            'main_category' => 'required|max:255',
            'image_url' => 'required|url'
        ];
    }

    public function messages(): array
    {
        return [
            'exists' => 'O código informado não é válido',
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute só é aceito no máximo :max caracteres',
            'url' => 'Ops! A URL informada não é valida',
            'decimal' => 'Ops! Esse campo não possui um tipo decimal válido'
        ];
    }
}
