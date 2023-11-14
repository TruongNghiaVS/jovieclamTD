<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobTypeFormRequest extends Request
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
                    $job_type_unique = '';
                    if ($id > 0) {
                        $job_type_unique = ',id,' . $id;
                    }
                    return [
                        'job_type' => 'required|unique:job_types' . $job_type_unique,
                        'job_type_id' => 'required_if:is_default,0',
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
            'job_type.required'=>'Nhập loại công việc/ Please enter Job Type.',
            'job_type_id.required_if'=>'Chọn loại công việc mặc định/dự phòng/ Please select default/fallback Job Type.',
            'is_default.required'=>'Mặc định?/ Is this Job Type default?',
            'is_active.required'=>'Chọn trạng thái/ Please select status.',
            'lang.required'=>'Lựa chọn ngôn ngữ/ Please select language.',
            'job_type.unique'=>'Loại công việc đã tồn tại/ Job Type already exists.',
        ];
    }

}
