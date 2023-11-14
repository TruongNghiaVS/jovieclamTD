<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobShiftFormRequest extends Request
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
                    $job_shift_unique = '';
                    if ($id > 0) {
                        $job_shift_unique = ',id,' . $id;
                    }
                    return [
                        'job_shift' => 'required|unique:job_shifts' . $job_shift_unique,
                        'job_shift_id' => 'required_if:is_default,0',
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
            'job_shift.required'=>'Nhập ca làm việc/ Please enter Job Shift.',
            'job_shift_id.required_if'=>'Chọn ca làm việc mặc định/dự phòng/ Please select default/fallback Job Shift.',
            'is_default.required'=>'Mặc định?/ Is this Job Shift default?',
            'is_active.required'=>'Chọn trạng thái/ Please select status.',
            'lang.required'=>'Lựa chọn ngôn ngữ/ Please select language.',
            'job_shift.unique'=>'Ca làm việc đã tồn tại/ Job Shift already exists.',
        ];
    }

}
