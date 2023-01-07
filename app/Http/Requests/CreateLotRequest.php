<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateLotRequest extends FormRequest
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

    public function messages()
    {
        return [
            'description.required.min' => 'The description has to contain at least 30 characters',
            'title.min' => 'The title has to contain at least 5 characters',
            'title.unique' => 'This Lot already exist, try another'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','string','min:5','max:60', Rule::unique('lots', 'title')],
            'description' => 'required|string|min:30',
            'category_id' => 'required|numeric'
        ];
    }
}
