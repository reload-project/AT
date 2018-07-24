<?php
return array(
    //'配置项'=>'配置值'
    /******************************************数据库配置*******************************************************/
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'atadmin',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'at_',    // 数据库表前缀
    'DB_CHARSET'            => 'utf8',
    "URL_MODEL"             => 2,

    'DOMAIN'=>"http://www.atadmin.com/",

    /******************************************样式js文件路径***************************************************/
    'TMPL_PARSE_STRING'  =>array(
        '__PUBLIC__' => __ROOT__.'/App/Home/Common/', // 更改默认的/assets 替换规则
    ),
    'TMPL_DENY_PHP' => false,
);