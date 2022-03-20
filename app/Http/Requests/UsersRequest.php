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
            case 'register.post':
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'photo' => 'required',
                    'dept_id' => 'required',
                    'password' => 'required',
                    'cpassword' => 'required|required_with:password|same:password',
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
