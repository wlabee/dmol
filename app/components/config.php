<?php
/**
 * 定义全局变量
 */
class config{
    public static function _get($key = '')
    {
        $config = array(
            'mark_type' => array(
                'number' => '数字',
                'text' => '文本',
                'textarea' => '文本域',
                'editor' => '富文本',
                'image' => '图片',
                'file' => '文件',
                'email' => 'Email',
                'mobile' => 'Mobile',
                'url' => 'Url',
                'qq' => 'QQ',
            ),
        );
        if ($key && $config[$key]) {
            return $config[$key];
        } elseif ($key) {
            return '';
        }
        return $config;
    }
}
// main   =   host:rds6y1c0m5426o0lr3m5.mysql.rds.aliyuncs.com,user:luoqingbo,database:re8079e2di,password:luoqingbo123,charset:utf8
// query  =   host:rds6y1c0m5426o0lr3m5.mysql.rds.aliyuncs.com,user:luoqingbo,database:re8079e2di,password:luoqingbo123,charset:utf8
