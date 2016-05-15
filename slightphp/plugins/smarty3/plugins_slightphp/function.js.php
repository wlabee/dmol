<?php

/**
 * 获取js资源
 * @param $params
 *          file：文件路径
 *          type：文件性质；common普通（默认）；plugin插件
 *          verison：版本号（默认0.0.2）
 * @return string
 */
function smarty_function_js($params) {
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
                    $dir = "/assets/scripts/{$path}{$file}.js";
                } else {
                    $dir = "/assets/scripts/{$path}{$file}.min.js";
                }
                $dir = "/assets/scripts/{$path}{$file}.js";
                break;
        }
        $realPath = ROOT_DIR . $dir;
        if (!is_file($realPath)) {
            $resource .= '<!-- <script src="' . $dir . '"></script>' . " -->\n";
        } else {
            $resource .= '<script src="' . $dir . '?t=' . md5_file($realPath) . '"></script>' . "\n";
        }
    }
    return $resource;
}

?>
