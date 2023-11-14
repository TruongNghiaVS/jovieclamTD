<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileProjectFormRequest extends Request
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
                        "name" => "required",
                        //"image" => "required",
                        //"url" => "required",
                        "date_start" => "required",
                        "date_end" => "required_if:is_on_going,0",
                        "is_on_going" => "required",
                        "description" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('Please enter project name'),
            'image.required' => __('Only images can be uploaded.'),
            'url.required' => __('Please enter project url'),
            'date_start.required' => __('Please set start date.'),
            'date_end.required_if' => __('Please set end date.'),
            'is_on_going.required' => __('Is this project ongoing?'),
            'description.required' => __('Please enter project description.'),
        ];
    }

}
