<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string',
            'email' => 'email',
            'country' => 'string',
            'city' => 'string',
            'birthday' => 'date',
            'tiny_about' => 'nullable|string',
            'sex' => Rule::in(['none', 'male', 'female']),
            'car' => 'nullable|boolean',
            'lookfor' => Rule::in(['none', 'male', 'female']),
            'children' => Rule::in(['yes', 'no', 'together', 'apart', 'none']),
            'marital' => Rule::in(['yes', 'no', 'together', 'none']),
            'education' => Rule::in(['no', 'HighSchool', 'HigherEducationUniversity', 'MDPhD', 'none']),
        ];
    }
}
