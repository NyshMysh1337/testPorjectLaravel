<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'duration_h' => 'required|integer',
            'materials' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'description.string' => 'Данные должны соответствовать строчному типу',
            'description.required' => 'Это поле необходимо для заполнения',
            'duration_h.required' => 'Это поле необходимо для заполнения',
            'duration_h.integer' => 'Данные должны соответствовать числовому типу',
        ];
    }
}
