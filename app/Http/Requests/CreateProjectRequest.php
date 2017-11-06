<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name' => 'required|unique:projects',
            'thumbnail' => 'image|dimension:min_width=261,min_height=98'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '项目名称不能为空',
            'name.unique' => '项目名称是唯一的',
            'thumbnail.image' => '上传的必须是图片',
            'thumbnail.dimension' => '上传图片宽度最小为261,高度为98'
        ];
    }
}
