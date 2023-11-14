<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PackageFormRequest extends Request
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
                    $unique_id = ($id > 0) ? ',' . $id : '';
                    return [
                        "package_title" => "required",
                        "package_price" => "required",
                        "package_num_days" => "required",
                        "package_num_listings" => "required",
                        "package_for" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'package_title.required' => 'Tên gói bắt buộc/ Package title required.',
            'package_price.required' => 'Đơn giá gói bắt buộc/ Package price required.',
            'package_num_days.required' => 'Thời hạn gói bắt buộc/ Package number of days required.',
            'package_num_listings.required' => 'Số lượng bài đăng cho gói bắt buộc/ Package number of listings required.',
            'package_for.required' => 'Chọn gói tài khoản/ Please select package for',
        ];
    }

}
