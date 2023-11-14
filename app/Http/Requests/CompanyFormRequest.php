<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyFormRequest extends Request
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
        return [
            'name' => ['required', 'max:255'],
            // 'email' => 'required',
            'password' => ['nullable', 'string', 'min:8'],
            'ceo' => 'nullable',
            'industry_id' => ['required', 'exists:industries,id'],
            'ownership_type_id' => ['nullable', 'exists:ownership_types,id'],
            'description' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'location' => 'required',
            //'map' => 'required',
            'no_of_offices' => 'nullable',
            'no_of_employees' => 'required',
            'established_in' => 'required',
            'website' => 'required',
            'fax' => 'nullable',
            'phone' => 'required',
            // 'logo' => $logo,

            // 'is_active' => 'required',
            // 'is_featured' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Tên Công ty là trường bắt buộc/ Company Name is required',
            //'password.required' => 'Mật khẩu là trường bắt buộc/ / Password is required',
            //'ceo.required' => 'Tên CEO Công ty là trường bắt buộc/ Company\'s CEO name is required',
            'industry_id.required' => 'Lựa chọn ngành nghề/ Please select Industry',
            'ownership_type_id.required' => 'Lựa chọn loại hình doanh nghiệp/ Please select Ownership Type',
            'description.required' => 'Chi tiết Công ty là bắt buộc/ Company Details required',
            'location.required' => 'Vị trí Công ty là bắt buộc/ Company location required',
            //'map.required' => 'Google Map Công ty là bắt buộc/ / Company Google Map location required',
            'no_of_offices.required' => 'Số văn phòng là bắt buộc/ Number of offices required',
            'website.required' => 'Website Công ty là bắt buộc/ Company website required',
            //'website.url' => 'Url/Địa chỉ cần hoàn thiện/ Complete url of company website required',
            'no_of_employees.required' => 'Số nhân viên là bắt buộc/ Number of employees required',
            'established_in.required' => 'Năm thành lập là bắt buộc/ Company established in year required',

            'phone.required' => 'Số Điện thoại là bắt buộc/ Phone number required',
            // 'logo.required' => 'Logo Công ty là bắt buộc/ Company logo is required',
            'country_id.required' => 'Lựa chọn Quốc gia/ Please select country',
            'state_id.required' => 'Lựa Chọn vùng miền/ Please select state',
            'city_id.required' => 'Lựa chọn Tỉnh/Thành/ Please select city',
            // 'is_active.required' => 'Hiển thị Công ty này?/ Is this Company Acive?',
            // 'is_featured.required' => 'Công ty trong danh sách Nổi bật/ Is this Company featured?',
        ];
    }

}
