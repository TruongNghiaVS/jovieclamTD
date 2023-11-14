<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JobFormRequest extends Request
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
                    $job_unique = '';
                    if ($id > 0) {
                        $job_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "",
                        "company_id" => "required",
                        "title" => "required",
                        "description" => "required",
                        "skills" => "required",
                        "country_id" => "required",
                        "state_id" => "required",
                        "city_id" => "required",
                        //"is_freelance" => "required",
                        //"career_level_id" => "required",
                        //"salary_from" => "required",
                        //"salary_to" => "required",
                        //"salary_currency" => "required",
                       // "salary_period_id" => "required",
                       // "hide_salary" => "required",
                        "functional_area_id" => "required",
                        "job_type_id" => "required",
                        //"job_shift_id" => "required",
                        //"num_of_positions" => "required",
                        //"gender_id" => "required",
                        "expiry_date" => "required",
                        //"degree_level_id" => "required",
                        "job_experience_id" => "required",
                        "is_active" => "required",
                        "is_featured" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'company_id.required' => 'Chọn Công ty/ Please select Company.',
            'title.required' => 'Chọn Chức danh/ Please enter Job title.',
            'description.required' => 'Nhập Mô tả Công việc/ Please enter Job description.',
            'skills.required' => 'Nhập kỹ năng/ Please enter Job skills.',
            'country_id.required' => 'Chọn Quốc gia/ Please select Country.',
            'state_id.required' => 'Chọn vùng miền/ Please select State.',
            'city_id.required' => 'Chọn Tỉnh/Thành/ Please select City.',
            //'is_freelance.required' => 'Is this freelance Job?',
            //'career_level_id.required' => 'Please select Career level.',
            //'salary_from.required' => 'Please select salary from.',
            //'salary_to.required' => 'Please select salary to.',
            //'salary_currency.required' => 'Please select salary currency.',
            //'salary_period_id.required' => 'Please select salary period.',
            //'hide_salary.required' => 'Is salary hidden?',
            'functional_area_id.required' => 'Chọn Bộ phận chức năng/ Please select functional area.',
            'job_type_id.required' => 'Chọn Loại hình Công việc/ Please select job type.',
            //'job_shift_id.required' => 'Please select job shift.',
            //'num_of_positions.required' => 'Please select number of positions.',
            //'gender_id.required' => 'Please select gender.',
            'expiry_date.required' => 'Nhập ngày hết hạn việc/ Please enter Job expiry date.',
            //'degree_level_id.required' => 'Please select degree level.',
            'job_experience_id.required' => 'Chọn kinh nghiệm/ Please select job experience.',
            'is_active.required' => 'Hiển thị Việc làm này?/ Is this Job active?',
            'is_featured.required' => 'Có phải việc Nổi bật/ Is this Job featured?',
        ];
    }

}
