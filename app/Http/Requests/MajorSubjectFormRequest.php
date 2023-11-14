<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MajorSubjectFormRequest extends Request
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
                    $major_subject_unique = '';
                    if ($id > 0) {
                        $major_subject_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "", "lang" => "required", "major_subject" => "required|unique:major_subjects$major_subject_unique", "is_default" => "required", "major_subject_id" => "required_if:is_default,0", "is_active" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
            'major_subject.required' => 'Nhập chuyên ngành/ Please enter major subject.',
            'major_subject.unique' => 'Chuyên ngành đã tồn tại. Please enter unique major subject.',
            'major_subject_id.required_if' => 'Chọn chuyên ngành/ Please enter major subject parent.',
        ];
    }

}
