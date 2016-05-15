<?php

function smarty_function_face($params, &$smarty) {
    $src = $params['src'];
    $size = $params['size'];
    $width = $params['width'];
    $height = $params['height'];
    $class = $params['class'];
    $alt = $params['disabled'];
    if (!$class) {
        $class = 'face';
    }
    $defaultImg = '/assets/images/face.png';
    if (!$src) {
        $src = $defaultImg;
    }
    $html = "<img src=\"{$src}\" alt=\"{$alt}\" class=\"{$class}\" style=\"border-radius: 50%;\" ";
    if ($size) {
        $width = $size;
        $height = $size;
    }
    if ($width) {
        $html .= " width=\"{$width}\"";
    }
    if ($height) {
        $html .= " height=\"{$height}\"";
    }
    $html .= " onerror=\"javascript:this.src='{$defaultImg}'\" />";
    return $html;
}


?>
