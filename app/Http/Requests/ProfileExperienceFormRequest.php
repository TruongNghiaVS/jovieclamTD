<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileExperienceFormRequest extends Request
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
                        "title" => "required",
                        "company" => "required",
                        "country_id" => "required",
                        "state_id" => "required",
                        "city_id" => "required",
                        "date_start" => "required",
                        "date_end" => "required_if:is_currently_working,0",
                        "is_currently_working" => "required",
                        "description" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'title.required' => __('Please enter title.'),
            'company.required' => __('Please enter company.'),
            'description.required' => __('Please enter description.'),
            'country_id.required' => __('Please select country.'),
            'state_id.required' => __('Please select state.'),
            'city_id.required' => __('Please select city.'),
            'date_start.required' => __('Please set start date.'),
            'date_end.required_if' => __('Please set end date.'),
            'is_currently_working.required' => __('Are you currently working here?'),
            'description.required' => __('Please enter experience description.'),
        ];
    }

}
