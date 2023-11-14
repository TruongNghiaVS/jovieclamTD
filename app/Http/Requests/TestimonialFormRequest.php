<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestimonialFormRequest extends Request
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
                    $testimonial_unique = '';
                    if ($id > 0) {
                        $testimonial_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "",
                        "lang" => "required",
                        "testimonial_by" => "required",
                        "testimonial" => "required",
                        "company" => "required",
                        "is_default" => "required",
                        "testimonial_id" => "required_if:is_default,0",
                        "is_active" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'lang.required' => 'Lựa chọn ngôn ngữ/ Please select language.',
            'testimonial_by.required' => 'Đánh giá bởi là trường bắt buộc/ Testimonial by required.',
            'testimonial.required' => 'Nội dung đánh giá là bắt buộc/ Testimonial required.',
            'company.required' => 'Công ty là trường bắt buộc/ Company required.',
            'is_default.required' => 'Chọn Mặc đinh hay không là bắt buộc/ Is this Testimonial default?',
            'testimonial_id.required_if' => 'Lựa chọn Đánh giá Mặc định/ Dự phòng/ Please select default/fallback Testimonial.',
            'is_active.required' => 'Hiển thị đánh giá này?/ Is this Testimonial active?',
        ];
    }

}
