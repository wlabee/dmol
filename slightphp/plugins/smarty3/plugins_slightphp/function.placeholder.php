<?php

/**
 * 获取css资源
 * @param $params
 *          file：文件路径
 *          type：文件性质；common普通（默认）；plugin插件
 * @return string
 */
function smarty_function_placeholder($params) {
    $str = '';
    switch ($params['type']) {
        case 'img':
            $url = 'http://fpoimg.com';
//            $url = 'http://placekitten.com/g';
            $str = "{$url}/{$params['width']}x{$params['height']}";
            break;
    }
    return $str;
}

?>
