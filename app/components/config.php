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
                'text' => '文字',
                'image' => '文件',
                'editor' => '富文本',
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
