<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SalaryPeriodFormRequest extends Request
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
                    $salary_period_unique = '';
                    if ($id > 0) {
                        $salary_period_unique = ',id,' . $id;
                    }
                    return [
                        'salary_period' => 'required|unique:salary_periods' . $salary_period_unique,
                        'salary_period_id' => 'required_if:is_default,0',
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
            'salary_period.required' => 'Nhập kỳ trả lương/ Please enter salary period.',
            'salary_period.unique' => 'Kỳ trả lương đã tồn tại/ Salary period already exists.',
            'salary_period_id.required_if' => 'Chọn kỳ trả lương mặc định/ Please select default salary period.',
            'is_active.required' => 'Chọn trạng thái hiển thị/ Please select status.',
            'is_default.required' => 'Chọn trạng thái mặc định/ Please select default status.',
            'lang.required' => 'Chọn ngôn ngữ/ Please select language.',
        ];
    }

}
