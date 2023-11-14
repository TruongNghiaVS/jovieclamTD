<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OwnershipTypeFormRequest extends Request
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
                    $ownership_type_unique = '';
                    if ($id > 0) {
                        $ownership_type_unique = ',id,' . $id;
                    }
                    return [
                        "id" => "", "lang" => "required", "ownership_type" => "required", "is_default" => "required", "ownership_type_id" => "required_if:is_default,0", "is_active" => "required",
                    ];
                }
            default:break;
        }
    }

    public function messages()
    {
        return [
              'ownership_type.required' => 'Trường Loại hợp quyền là bắt buộc/ Ownership Type is required',
               'is_default.required' => 'Trường Mặc định là bắt buộc/ Default is required',
               'is_active.required' => 'Trường hiển thị là bắt buộc/ Active is required',
        ];

    }

}
