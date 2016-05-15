<?php

/**
 * 获取bootstrap资源
 * @param $params
 *          file：文件路径
 *          type：文件类型；js、css
 *          verison：版本号（默认0.0.2）
 * @return string
 */
function smarty_function_bs($params) {
    //文件名
    $files = $params['file'];
    if (!$files) {
        return '';
    }
    //文件类型
    $type = $params['type'] ? $params['type'] : 'css';
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
            case 'js':
                if (defined('DEV')) {
                    $dir = "/assets/bootstrap/js/{$path}{$file}.js";
                } else {
                    $dir = "/assets/bootstrap/js/{$path}{$file}.min.js";
                }
                break;
            default:
                if (defined('DEV')) {
                    $dir = "/assets/bootstrap/css/{$path}{$file}.css";
                } else {
                    $dir = "/assets/bootstrap/css/{$path}{$file}.min.css";
                }
                break;
        }
        $realPath = ROOT_DIR . $dir;
        if (!is_file($realPath)) {
            if ($type == 'js') {
                $resource .= '<!-- <script src="' . $dir . '"></script>' . " -->\n";
            } else {
                $resource .= '<!-- <link href="' . $dir . '" rel="stylesheet" type="text/css">' . " -->\n";
            }
        } else {
            if ($type == 'js') {
                $resource .= '<script src="' . $dir . '?t=' . md5_file($realPath) . '"></script>' . "\n";
            } else {
                $resource .= '<link href="' . $dir . '?t=' . md5_file($realPath) . '" rel="stylesheet" type="text/css">' . "\n";
            }
        }
    }
    return $resource;
}

?>
