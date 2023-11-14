<?php

namespace App\Http\Requests\Front;

use App\Http\Requests\Request;

class ContactFormRequest extends Request
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
            'full_name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'max:20',
            'subject' => 'required|max:200',
            'message_txt' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => __('Tên là trường bắt buộc/ Name is required'),
            'email.required' => __('Email là trường bắt buộc/ E-mail address is required'),
            'email.email' => __('Email phải hợp lệ/ Valid e-mail address is required'),
            'subject.required' => __('Tiêu đề là trường bắt buộc/ Subject is required'),
            'message_txt.required' => __('Tin nhắn là trường bắt buộc/ Message is required'),
        ];
    }

}
