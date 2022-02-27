<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedRequest extends FormRequest
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
            case 'feedCreate':
                return [
                    'title' => 'required',
                    'desc' => 'required',
                    'photo' => 'required',
                    'dept_id' => 'required',
                ];
            break;

            case 'feedUpdate':
                return [
                    'id' => "required",
                    'title' => "required",
                    'desc' => "required",
                    'photo' => "required",
                    'dept_id' => "required",
                ];
            break;
        }
    }
}
