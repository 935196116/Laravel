<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class HouseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required | string |max:30 | min:5',
            'region'=>'required | numeric',
            'housing'=>'numeric',
            'style'=>'required | numeric',
            'decorate'=>'required | numeric',
            'address'=>'required | string | max:100',
            'host_name'=>'required | string | min:2|max:30',
            'host_tel'=>'required | string | max:11',
            'price'=>'required | numeric | min:0',
            'vr_url'=>'string',
//            'imgs'=>'string',//应该有个验证是否符合规则
            'detail'=>'string|max:300',
            'area'=>'required | numeric | min:0'

        ];
    }
    protected $messages = [
        'title.required' => '必须填写"名称"',
    ];
    public function messages()
    {
        return $this->messages;
    }

}