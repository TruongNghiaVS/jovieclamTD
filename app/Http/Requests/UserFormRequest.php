<?php

namespace App\Http\Requests;

use Auth;
use App\Http\Requests\Request;

class UserFormRequest extends Request
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
        $id = (int) $this->input('id', 0);
        $password = 'required|min:6';
        $id_str = '';
        if ($id > 0) {
            $id_str = ',' . $id;
            $password = '';
        }
        return [
            'first_name' => 'required',
            //'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email' . $id_str . '|email',
            'password' => $password,
           // 'father_name' => 'required',
            'date_of_birth' => 'required',
           // 'gender_id' => 'required',
            //'marital_status_id' => 'required',
            'nationality_id' => 'required',
            //'national_id_card_number' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
           // 'mobile_num' => 'required',
           // 'job_experience_id' => 'required',
           // 'career_level_id' => 'required',
            'industry_id' => 'required',
            'functional_area_id' => 'required',
           // 'current_salary' => 'required',
            //'expected_salary' => 'required',
            //'salary_currency' => 'required',
            'street_address' => 'required',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Họ là trường yêu cầu/ First Name is required',
            //'middle_name.required' => 'Middle Name is required',
            'last_name.required' => 'Tên là trường yêu cầu/ Last Name is required',
            'email.required' => 'EEmail là trường yêu cầu/Email is required',
            'email.email' => 'Email phải hợp lệ/ The email must be a valid email address.',
            'email.unique' => 'Email đã tồn tại/ This Email has already been taken.',
            'password.required' => 'Mật khẩu là trường yêu cầu/ Password is required',
            'password.min' => 'Mật khẩu cần có độ dài tối thiểu 3 ký tự/ The password should be more than 3 characters long',
            //'father_name.required' => 'Father Name is required',
            'date_of_birth.required' => 'Ngày sinh là trường yêu cầu/ Date of birth is required',
            //'gender_id.required' => 'Please select gender',
            //'marital_status_id.required' => 'Please select marital status',
            'nationality_id.required' => 'Lụa chọn Quốc tịch/ Please select nationality',
            //'national_id_card_number.required' => 'national ID card# required',
            'country_id.required' => 'Lựa chọn Quốc gia/ Please select country',
            'state_id.required' => 'Lựa Chọn vùng miền/ Please select state',
            'city_id.required' => 'Lựa chọn Tỉnh/Thành Please select city',
            'phone.required' => 'Nhập điện thoại/ Please enter phone',
           // 'mobile_num.required' => 'Please enter mobile number',
            //'job_experience_id.required' => 'Please select experience',
            //'career_level_id.required' => 'Please select career level',
            'industry_id.required' => 'Lựa chọn Ngành nghề/ Please select industry',
            'functional_area_id.required' => 'Lựa chọn Bộ phận chức năng/ Please select functional area',
            //'current_salary.required' => 'Please enter current salary',
            //'expected_salary.required' => 'Please enter expected salary',
            //'salary_currency.required' => 'Please select salary currency',
            'street_address.required' => 'Nhập địa chỉ chi tiết/ Please enter street address',
            'image.image' => 'Chỉ có thể tải định dạng file ảnh/ Only images can be uploaded.',
        ];
    }

}
