<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileEducationFormRequest extends Request
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
        switch ($this->method()) {
            case 'PUT':
            case 'POST': {
                    $id = (int) $this->input('id', 0);
                    return [
                        "degree_level_id" => "required",
                        // "degree_type_id" => "required",
                        // "degree_title" => "required",
                        // "major_subjects" => "required",
                        "country_id" => "required",
                        "state_id" => "required",
                        "city_id" => "required",
                        "institution" => "required",
                        "date_completion" => "required",
                        // "degree_result" => "required",
                        // "result_type_id" => "required",
                        // "details" => "required",

                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'degree_level_id.required' => __('Please select degree level.'),
            'degree_type_id.required' => __('Please select degree type.'),
            // 'degree_title.required' => __('Please enter degree title.'),
            'major_subjects.required' => __('Please select major subject.'),
            'country_id.required' => __('Please select country.'),
            'state_id.required' => __('Please select state.'),
            'city_id.required' => __('Please select city.'),
            'institution.required' => __('Please enter institution.'),
            'date_completion.required' => __('Please set completion date.'),
            // 'degree_result.required' => __('Please enter result.'),
            // 'result_type_id.required' => __('Please select result type.'),
        ];
    }

}
