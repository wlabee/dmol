<?php
function smarty_modifier_sex($string) {
    $str = '未知';
    switch ($string) {
        case 1:
            $str = '男';
            break;
        case 2:
            $str = '女';
            break;
    }
    return $str;
}


?>
