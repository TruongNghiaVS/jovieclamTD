<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CmsFormRequest extends Request
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
        $id_str = '';
        if ($id > 0) {
            $id_str = ',' . $id;
        }
        return [
            'page_slug' => 'required|alpha_dash|unique:cms,page_slug' . $id_str,
            'seo_title' => 'required',
            'seo_description' => 'required',
            'seo_keywords' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'page_slug.required' => 'Nhập page slug/ Please enter page slug.',
            'page_slug.alpha_dash' => 'Page slug có thể chứa chữ cái, số, gạch ngang và gạch chân/ The page slug may have alpha-numeric characters, as well as dashes and underscores.',
            'page_slug.unique' => 'Page slug đã tồn tại/ Some other C.M.S page already has this Slug (Page SlUG should be unique).',
            'seo_title.required' => 'Nhập Tiêu đề SEO/ Please enter SEO title.',
            'seo_description.required' => 'Nhập mô tả SEO/ Please enter SEO description.',
            'seo_keywords.required' => 'Nhập từ khóa SEO/ Please enter SEO keywords.',
        ];
    }

}
