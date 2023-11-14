<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DegreeTypeFormRequest extends Request
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
                    $degree_type_unique = '';
                    if ($id > 0) {
                        $degree_type_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "", "lang" => "required", "degree_level_id" => "required", "degree_type" => "required|unique:degree_types$degree_type_unique", "is_default" => "required", "degree_type_id" => "required_if:is_default,0", "is_active" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'degree_type.required'=>'Nhập loại bằng cấp/ Please enter degree type.',
            'degree_type_id.required_if'=>'Chọn loại bằng cấp mặc định/ Please select default degree type.',
            'is_default.required'=>'Mặc định?/ Is this degree type default?',
            'is_active.required'=>'Chọn trạng thái/ Please select status.',
            'lang.required'=>'Lựa chọn ngôn ngữ/ Please select language.',
            'degree_type.unique'=>'Loại bằng cấp đã tồn tại/ Degree type already exists.',
         ];
    }

}
