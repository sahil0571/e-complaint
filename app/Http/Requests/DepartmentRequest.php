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
            case 'admin.createDepartment':
                return [
                    'deptName' => 'required',
                    'deptDesc' => 'required',
                ];
                break;

            case 'admin.updateDepartment':
                return [
                    'id' => "required",
                    'deptName' => 'required',
                    'deptDesc' => 'required',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'deptName.required' => 'Department name is required.',
            'deptDesc.required' => 'Department description is required.'
        ];
    }
}
