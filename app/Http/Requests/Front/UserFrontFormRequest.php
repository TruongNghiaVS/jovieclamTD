<?php

namespace App\Http\Requests\Front;

use Auth;
use App\Http\Requests\Request;

class UserFrontFormRequest extends Request
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
        $id = Auth::user()->id;
        $id_str = ',' . $id;
        $password = '';
        return [
            'first_name' => 'required|max:80',
            //'middle_name' => 'max:80',
            //'last_name' => 'required|max:80',
            'email' => 'required|unique:users,email' . $id_str . '|email|max:100',
            'password' => 'max:50',
            //'father_name' => 'required|max:80',
            'date_of_birth' => 'required',
            //'gender_id' => 'required',
            //'marital_status_id' => 'required',
            'nationality_id' => 'required',
            //'national_id_card_number' => 'required|max:80',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required|max:18',
            //'mobile_num' => 'required|max:22',
            //'job_experience_id' => 'required',
            //'career_level_id' => 'required',
            'industry_id' => 'required',
            'functional_area_id' => 'required',
           // 'current_salary' => 'required|max:11',
            //'expected_salary' => 'required|max:11',
            //'salary_currency' => 'required|max:5',
            'street_address' => 'required|max:230',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            // 'first_name.required' => __('Họ là trường yêu cầu/ First Name is required'),
            //'middle_name.required' => __('Middle Name is required'),
            //'last_name.required' => __('Last Name is required'),
            // 'email.required' => __('Email là trường yêu cầu/Email is required'),
            // 'email.email' => __('Email phải hợp lệ/ The email must be a valid email address'),
            // 'email.unique' => __('Email đã tồn tại/ This Email has already been taken'),
            // 'password.required' => __('Mật khẩu là trường yêu cầu/ Password is required'),
            // 'password.min' => __('Mật khẩu cần có độ dài tối thiểu 3 ký tự/ The password should be more than 3 characters long'),
            //'father_name.required' => __('Father Name is required'),
            // 'date_of_birth.required' => __('Ngày sinh là trường yêu cầu/ Date of birth is required'),
            //'gender_id.required' => __('Please select gender'),
           // 'marital_status_id.required' => __('Please select marital status'),
            'nationality_id.required' => __('Lụa chọn Quốc tịch/ Please select nationality'),
            //'national_id_card_number.required' => __('National ID card# required'),
            'country_id.required' => __('Lựa chọn Quốc gia/ Please select country'),
            'state_id.required' => __('Lựa Chọn vùng miền/ Please select state'),
            'city_id.required' => __('Lựa chọn Tỉnh/Thành Please select city'),
            'phone.required' => __('Nhập điện thoại/ Please enter phone'),
            //'mobile_num.required' => __('Please enter mobile number'),
           // 'job_experience_id.required' => __('Please select experience'),
           // 'career_level_id.required' => __('Please select career level'),
            'industry_id.required' => __('Lựa chọn Ngành nghề/ Please select industry'),
            'functional_area_id.required' => __('Lựa chọn Bộ phận chức năng/ Please select functional area'),
           // 'current_salary.required' => __('Please enter current salary'),
           // 'expected_salary.required' => __('Please enter expected salary'),
           // 'salary_currency.required' => __('Please select salary currency'),
            'street_address.required' => __('Nhập địa chỉ chi tiết/ Please enter street address'),
            'image.image' => __('Chỉ có thể tải định dạng file ảnh/ Only images can be uploaded'),
        ];
    }

}
