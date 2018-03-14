<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class HousingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name' => 'required|string|max:200|not_in:其它|min:1',
            'parentId'=>'required|numeric',
            'id'=>'not_in:-1'
        ];
    }
    protected $messages = [
        'name.not_in' => '名称不可为"其它"',
        'name.required' => '必须填写"名称"',
        'id.not_int'=>"不可修改其它类别"
    ];
    public function messages()
    {
        return $this->messages;
    }

}