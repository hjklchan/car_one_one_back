<?php

return [
    /*
     * 默认配置
     */
    'defaults' => [
        'app_id' => env('WECHAT_APP_ID'),         // 微信 AppID
        'secret' => env('WECHAT_APP_SECRET'), // 微信 AppSecret
        'token' => env('WECHAT_TOKEN'),           // 微信 Token
        'aes_key' => env('WECHAT_AES_KEY'),                 // 消息加密密钥
    ],

    /*
     * 开发模式开关
     */
    'debug' => env('WECHAT_DEBUG', false),

    /*
     * 日志配置
     */
    'log' => [
        'default' => env('WECHAT_LOG_CHANNEL', 'dev'),
        'channels' => [
            'dev' => [
                'driver' => 'single',
                'path' => storage_path('logs/wechat.log'),
                'level' => 'debug',
            ],
        ],
    ],
];
