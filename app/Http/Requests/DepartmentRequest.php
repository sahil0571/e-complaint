<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
        $path = request()->route()->getName();
        
        switch ($path) {
            case 'departmentCreate':
                return [
                    'name' => 'required',
                ];
            break;

            case 'departmentUpdate':
                return [
                    'id' => "required",
                    'name' => "required",
                ];
            break;
        }
    }
}
