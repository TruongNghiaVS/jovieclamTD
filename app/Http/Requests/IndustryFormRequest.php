<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndustryFormRequest extends Request
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
                    $industry_unique = '';
                    if ($id > 0) {
                        $industry_unique = ',id,' . $id;
                    }
                    return [
                        'industry' => 'required|unique:industries' . $industry_unique,
                        'industry_id' => 'required_if:is_default,0',
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
            'industry.required' => 'Nhập ngành nghề/ Please enter Industry.',
            'industry_id.required_if' => 'Chọn ngành nghề mặc định/dự phòng/ Please select default/fallback Industry.',
            'is_default.required' => 'Mặc định?/ Is this Industry default?',
            'is_active.required' => 'Chọn trạng thái/ Please select status.',
            'lang.required' => 'Lựa chọn ngôn ngữ/ Please select language.',
            'industry.unique' => 'Ngành nghề đã tồn tại/ Industry already exists.',
        ];
    }

}
