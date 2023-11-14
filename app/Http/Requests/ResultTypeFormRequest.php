<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResultTypeFormRequest extends Request
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
                    $result_type_unique = '';
                    if ($id > 0) {
                        $result_type_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "", "lang" => "required", "result_type" => "required", "is_default" => "required", "result_type_id" => "required_if:is_default,0", "is_active" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'lang.required' => 'Trường ngôn ngữ là bắt buộc/ Language is required',
            'result_type.required' => 'Trường hình thức đánh giá là bắt buộc/ Result type is required',
            'is_default.required' => 'Mặc định/ Default is required',
            'result_type_id.required_if' => 'Trường hình thức đánh giá là bắt buộc/ Result type is required',
            'is_active.required' => 'Trường trạng thái là bắt buộc/ Status is required',
        ];


    }

}
