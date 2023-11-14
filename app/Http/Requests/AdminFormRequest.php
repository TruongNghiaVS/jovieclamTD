<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminFormRequest extends Request
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
        $pass_required = 'required|min:3|max:100';
        $id_str = '';
        if ($id > 0) {
            $id_str = ',' . $id;
            $pass_required = '';
        }
        //echo $id_str;exit;
        return [
            'name' => 'required|unique:admins,name' . $id_str . '|max:50',
            'email' => 'required|unique:admins,email' . $id_str . '|email|max:100',
            'password' => $pass_required,
            'role_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là trường bắt buộc/ Name is required',
            'name.unique' => 'Tên này đã tồn tại/ The name has already been taken.',
            'name.max' => 'Tên tối dài đa 50 ký tự/ The name may not be greater than 50 characters.',
            'email.required' => 'Email là trường bắt buộc/ Email is required',
            'email.email' => 'Email phải hợp lệ/ The email must be a valid email address.',
            'email.unique' => 'Email đã tồn tại/ This Email has already been taken.',
            'name.max' => 'Email dài tối đa 100 ký tự/The email may not be greater than 100 characters.',
            'password.required' => 'Mật khẩu là trường bắt buộc/ Password is required',
            'password.min' => 'Mật khẩu dài tối thiểu 3 ký tự/ The password may be more than 3 characters long.',
            'password.max' => 'Mật khẩu dài tối đa 100 ký tự/ The password may not be greater than 100 characters.',
            'role_id.required' => 'Lựa chọn Quyền/ Please Select Role',
        ];
    }

}
