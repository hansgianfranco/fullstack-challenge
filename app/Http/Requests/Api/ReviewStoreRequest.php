<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'review_date' => 'required|date',
            'employee_id' => 'required',
            'productivity' => 'required|numeric|min:1|max:5',
            'knowledge' => 'required|numeric|min:1|max:5',
            'relationship' => 'required|numeric|min:1|max:5',
            'initiative' => 'required|numeric|min:1|max:5',
        ];
    }

    public function messages()
    {
        return [
            'review_date.required' => 'fecha es invalida',
            'employee_id.required' => 'usuario es invalido',
            'productivity.numeric' => 'numero permitido del 1 al 5',
            'knowledge.numeric' => 'numero permitido del 1 al 5',
            'relationship.numeric' => 'numero permitido del 1 al 5',
            'initiative.numeric' => 'numero permitido del 1 al 5',
        ];
    }
}
