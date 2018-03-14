<?php
use Overtrue\EasySms\EasySms;

return [



    'timeout' => 5.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'qcloud',
        ],
    ],
    'gateways' => [
        'qcloud' => [
            'sdk_app_id' => env('TENCENT_SMS_APPID'), // SDK APP ID
            'app_key' => env('TENCENT_SMS_APPKEY')  // APP KEY
        ],
    ],

];

