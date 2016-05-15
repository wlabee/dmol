<?php

/**
 * 获取css资源
 * @param $params
 *          file：文件路径
 *          type：文件性质；common普通（默认）；plugin插件
 * @return string
 */
function smarty_function_css($params) {
    //文件名
    $files = $params['file'];
    if (!$files) {
        return '';
    }
    //文件类型
    $type = $params['type'] ? $params['type'] : 'common';
    //
    $path = $params['path'] ? $params['path'] . '/' : '';
    //
    $files = explode(',', $files);
    $resource = '';
    foreach ($files as $file) {
        if (!$file) {
            continue;
        }
        switch ($type) {
            case 'plugin':
                $dir = "/assets/plugins/{$file}";
                break;
            default:
                if (defined('DEV')) {
                    $dir = "/assets/styles/{$path}{$file}.css";
                } else {
                    $dir = "/assets/styles/{$path}{$file}.min.css";
                }
                 $dir = "/assets/styles/{$path}{$file}.css";
                break;
        }
        $realPath = ROOT_DIR . $dir;
        if (!is_file($realPath)) {
            $resource .= '<!-- <link href="' . $dir . '" rel="stylesheet" type="text/css">' . " -->\n";
        } else {
            $resource .= '<link href="' . $dir . '?t=' . md5_file($realPath) . '" rel="stylesheet" type="text/css">' . "\n";
        }
    }
    return $resource;
}

?>
