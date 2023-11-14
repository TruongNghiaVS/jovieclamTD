<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FunctionalAreaFormRequest extends Request
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
                    $functional_area_unique = '';
                    if ($id > 0) {
                        $functional_area_unique = ',id,' . $id;
                    }
                    return [
                        'functional_area' => 'required|unique:functional_areas' . $functional_area_unique,
                        'functional_area_id' => 'required_if:is_default,0',
                        'is_active' => 'required',
                        'is_default' => 'required',
                        'lang' => 'required',
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'functional_area.required' => 'Nhập Bộ phận chức năng/ Please enter Functional Area.',
            'functional_area_id.required_if' => 'Chọn Bộ phận chức năng mặc định/ Dự phòng/ Please select default/fallback Functional Area.',
            'is_default.required' => 'Mặc định?/ Is this Functional Area default?',
            'is_active.required' => 'Chọn trạng thái/ Please select status.',
            'lang.required' => 'Lựa chọn ngôn ngữ/ Please select language.',
        ];
    }

}
