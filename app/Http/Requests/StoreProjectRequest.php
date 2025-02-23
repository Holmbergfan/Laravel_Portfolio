<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
        return [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'download_url' => 'nullable|url',
            'repo_url' => 'nullable|url',
            'status' => 'nullable',
            'type' => 'nullable',
            'version' => 'nullable',
            'version_history' => 'nullable',
            'badges' => 'nullable|array',
            'main_image' => 'nullable|image|max:2048',
            'gallery_images.*' => 'nullable|image|max:2048',
            'files.*' => 'nullable|mimes:zip,obj,stl,pdf,doc,docx|max:10240',
            'icon' => 'nullable',
        ];
    }
}