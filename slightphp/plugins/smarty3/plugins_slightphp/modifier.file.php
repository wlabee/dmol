<?php
function smarty_modifier_file($string, $params = '') {
    if ($string) {
        return UPLOAD_DIR . $string;
    }
    if ($params == 'default') {
        return '/assets/images/front/default.jpg';
    }
    return '';
}

?>
