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

            case 'admin.addPost':
                return [
                    'title' => "required|unique:feeds,title",
                    'sub_title' => "required",
                    'slug' => "required|unique:feeds,slug",
                    'desc' => "required",
                    'photo' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                    'status' => "required",
                    'dept_id' => "required",
                ];
            break;
            case 'admin.updatePost':
                return [
                    'id' => "required",
                    'title' => "required|unique:feeds,title," . $this->id,
                    'sub_title' => "required",
                    'slug' => "required|unique:feeds,slug," . $this->id,
                    'desc' => "required",
                    'photo' => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                    'status' => "required",
                    'dept_id' => "required",
                ];
            break;
        }
    }

    public function messages()
    {   
        return [
            'title.required' => 'Title for feed post is reauired.',
            'title.unique' => 'Please enter a unique title this title already exist.',
            'sub_title.required' => 'SubTitle for feed post is reauired.',
            'slug.required' => 'Slug for feed post is reauired.',
            'slug.unique' => 'Please enter a unique slug this slug already exist.',
            'photo.required' => 'Display picture for feed post is reauired.',
            'photo.mimes' => 'Please enter a valid image.',
            'photo.max' => 'Image size should be maximum 2 MB.',
            'desc.required' => 'Please make a post content.',
        ];
    }

}
