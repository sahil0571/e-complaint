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
                    'role_id' => 'required',
                    'status' => 'required',
                    'verified' => 'required',
                ];
                break;

            case 'register.post':
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
                    'dept_id' => 'required',
                    'password' => 'required|min:8',
                ];
            break;

            case 'user.updateUser':
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
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
}
