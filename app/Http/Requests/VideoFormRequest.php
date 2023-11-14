<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoFormRequest extends Request
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
                    $video_unique = '';
                    if ($id > 0) {
                        $video_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "",
                        "lang" => "required",
                        "video_title" => "required|unique:videos$video_unique",
                        "video_text" => "required",
                        "video_link" => "required",
                        "is_default" => "required",
                        "video_id" => "required_if:is_default,0",
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
            'video.required' => 'Yêu cầu/ Video required.',
            'is_default.required' => 'Video mặc định?/ Is this Video default?',
            'video_id.required_if' => 'Lựa chọn Video mặc đinh/ dự phòng/ Please select default/fallback Video.',
            'is_active.required' => 'Video này hiển thị?/ Is this Video active?',
            'video_title.required' => 'Tiêu đề Video là bắt buộc/ Video title required.',
            'video_title.unique' => 'Tiêu đề Video phải duy nhất/ Video title must be unique.',
            'video_text.required' => 'Nội dung Video là bắt buộc/ Video text required.',
            'video_link.required' => 'Đường dẫn Video là bắt buộc/ Video link required.',
        ];
    }

}
