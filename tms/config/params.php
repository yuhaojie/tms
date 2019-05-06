<?php
return [
    'adminEmail' => 'admin@example.com',
    'adminAcronym' => 'RF',
    'adminTitle' => 'RageFrame',

    /** ------ 总管理员配置 ------ **/
    //'adminAccount' => 1,// 系统管理员账号id

    /** ------ 日志记录 ------ **/
    'user.log' => true,
    'user.log.level' => ['error'], // 级别 ['info', 'warning', 'error']
    'user.log.noPostData' => [ // 安全考虑,不接收Post存储到日志的路由
        'app-tms/site/login',
        'sys/manager/up-password',
        'sys/manager/ajax-edit',
        'member/member/ajax-edit',
    ],
    'user.log.except.code' => [], // 不记录的code

    /** ------ 开发者信息 ------ **/
    'exploitDeveloper' => '简言',
    'exploitFullName' => 'RageFrame应用开发引擎',
    'exploitOfficialWebsite' => '<a href="http://www.rageframe.com" target="_blank">www.rageframe.com</a>',
    'exploitGitHub' => '<a href="https://github.com/jianyan74/rageframe2" target="_blank">https://github.com/jianyan74/rageframe2</a>',

    /** ------ 备份配置配置 ------ **/
    'dataBackupPath' => Yii::getAlias('@root') . '/common/backup', // 数据库备份根路径
    'dataBackPartSize' => 20971520,// 数据库备份卷大小
    'dataBackCompress' => 1,// 压缩级别
    'dataBackCompressLevel' => 9,// 数据库备份文件压缩级别
    'dataBackLock' => 'backup.lock',// 数据库备份缓存文件名

    /**
     * 不需要验证的路由全称
     *
     * 注意: 前面以绝对路径/为开头
     */
    'noAuthRoute' => [
        '/main/index',// 系统主页
        '/main/system',// 系统首页
    ],

    'isMobile' => false,

    /** ------ 配置文本类型 ------ **/
    'configTypeList' => [
        'text' => "文本框",
        'password' => "密码框",
        'secretKeyText' => "密钥文本框",
        'textarea' => "文本域",
        'date' => "日期",
        'time' => "时间",
        'datetime' => "日期时间",
        'dropDownList' => "下拉文本框",
        'radioList' => "单选按钮",
        'checkboxList' => "复选框",
        'image' => "图片上传",
        'images' => "多图上传",
        'file' => "文件上传",
        'files' => "多文件上传",
    ],

    /** ------ 插件类型 ------ **/
    'addonsGroup' => [
        'plug' => [
            'name' => 'plug',
            'title' => '功能扩展',
            'icon' => 'fa fa-puzzle-piece',
        ],
        'business' => [
            'name' => 'business',
            'title' => '主要业务',
            'icon' => 'fa fa-random',
        ],
        'customer' => [
            'name' => 'customer',
            'title' => '客户关系',
            'icon' => 'fa fa-rocket',
        ],
        'activity' => [
            'name' => 'activity',
            'title' => '营销及活动',
            'icon' => 'fa fa-tachometer',
        ],
    ],

    // 客户端版本
    'individuationMenuClientPlatformType' => [
        '' => '不限',
        1 => 'IOS(苹果)',
        2 => 'Android(安卓)',
        3 => 'Others(其他)',
    ],

    // 语言
    'individuationMenuLanguage' => [
        '' => '不限',
        'zh_CN' => '简体中文',
        'zh_TW' => '繁体中文TW',
        'zh_HK' => '繁体中文HK',
        'en' => '英文',
        'id' => '印尼',
        'ms' => '马来',
        'es' => '西班牙',
        'ko' => '韩国',
        'it' => '意大利',
        'ja' => '日本',
        'pl' => '波兰',
        'pt' => '葡萄牙',
        'ru' => '俄国',
        'th' => '泰文',
        'vi' => '越南',
        'ar' => '阿拉伯语',
        'hi' => '北印度',
        'he' => '希伯来',
        'tr' => '土耳其',
        'de' => '德语',
        'fr' => '法语',
    ],
];
