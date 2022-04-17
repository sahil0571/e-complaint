<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            case 'admin.updateUser':
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'dept_id' => 'required',
                    'enrollment_no' => 'unique:users,enrollment_no,'.$this->id.'|regex:/(E)[0-9]{17}/',
                    'role_id' => 'required',
                    'status' => 'required',
                    'verified' => 'required',
                ];
                break;

            case 'register.post':
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'photo' => 'mimes:jpeg,jpg,png,gif|max:10000',
                    'dept_id' => 'required',
                    'enrollment_no' => 'unique:users,enrollment_no|regex:/(E)[0-9]{17}/',
                    'password' => 'required|min:8',
                ];
            break;

            case 'user.updateUser':
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'photo' => 'mimes:jpeg,jpg,png,gif|max:10000',
                    'dept_id' => 'required',
                ];
                break;

            case 'login.post':
                return [
                    'email' => "required",
                    'password' => "required",
                ];
            break;
        }
    }

    public function messages()
    {
        return [
            'enrollment_no.regex' => 'PLease enter a valid Enrollment no',
            'enrollment_no.unique' => 'This Enrollment no already exist.'
        ];
    }

}
