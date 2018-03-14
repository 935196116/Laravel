<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);

        if (!$verifyData) {
            return $this->response->error('验证码已失效', 422);
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            return $this->response->errorUnauthorized('验证码错误');
        }

        $user = User::create([
            'uname' => $request->uname,
            'phone' => $verifyData['phone'],
            'pwd' => bcrypt($request->password),
            'private' => 0
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

//        return $this->response->created();

        return $this->response->array([
            'code' => $user==null?-1:0
        ])->setStatusCode(201);
    }
}