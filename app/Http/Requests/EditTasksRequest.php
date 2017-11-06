<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTasksRequest extends FormRequest
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
            'title' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '任务名称不能为空',
            'title.max' => '任务名称长度不能超过255个字符'

        ];
    }
}
