<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DegreeLevelFormRequest extends Request
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
                    $degree_level_unique = '';
                    if ($id > 0) {
                        $degree_level_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "", "lang" => "required", "degree_level" => "required|unique:degree_levels$degree_level_unique", "is_default" => "required", "degree_level_id" => "required_if:is_default,0", "is_active" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'degree_level.required'=>'Nhập bằng cấp/ Please enter degree level.',
            'degree_level_id.required_if'=>'Chọn bằng cấp mặc định/ Please select default degree level.',
            'is_default.required'=>'Mặc định?/ Is this degree level default?',
            'is_active.required'=>'Chọn trạng thái/ Please select status.',
            'lang.required'=>'Lựa chọn ngôn ngữ/ Please select language.',
            'degree_level.unique'=>'Bằng cấp đã tồn tại/ Degree level already exists.',
    ];
    }

}
