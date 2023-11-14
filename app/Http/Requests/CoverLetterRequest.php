<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoverLetterRequest extends FormRequest
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
                    return [
                        'name' => 'required',
                        'image_thumbnail' => 'required',
                        'image_main' => 'required',
                        'file' => 'required',
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'name.required' =>'Tên Cover Letter không được để trống/ Name Cover Letter is required.',
            'image_thumbnail.required' =>'Hình ảnh nhỏ không được để trống/ Image thumbnail is required.',
            'image_main.required' =>'Hình ảnh to không được để trống/ Image main is required.',
            'file.required' =>'File không được để trống/ File is required.',
         ];
    }
}
