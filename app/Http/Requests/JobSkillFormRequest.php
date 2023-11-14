<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobSkillFormRequest extends Request
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
                    $job_skill_unique = '';
                    if ($id > 0) {
                        $job_skill_unique = ',id,' . $id;
                    }
                    return [
                        'job_skill' => 'required|unique:job_skills' . $job_skill_unique,
                        'job_skill_id' => 'required_if:is_default,0',
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
            'job_skill.required'=>'Nhập kỹ năng làm việc/ Please enter Job Skill.',
            'job_skill_id.required_if'=>'Chọn kỹ năng làm việc mặc định/dự phòng/ Please select default/fallback Job Skill.',
            'is_default.required'=>'Mặc định?/ Is this Job Skill default?',
            'is_active.required'=>'Chọn trạng thái/ Please select status.',
            'lang.required'=>'Lựa chọn ngôn ngữ/ Please select language.',
            'job_skill.unique'=>'Kỹ năng làm việc đã tồn tại/ Job Skill already exists.',
        ];
    }

}
