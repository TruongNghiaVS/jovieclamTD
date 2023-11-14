<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileActivityFormRequest extends FormRequest
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
                    return [
                        "company" => "required",
                        'date_start' => 'required',
                        'date_end' => 'nullable|after_or_equal:date_start',
                        "is_currently_working" => "nullable",
                        "description" => "required",
                    ];
                }
            default:break;
        }
    }
}
