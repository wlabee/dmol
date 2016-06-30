<?php
function smarty_modifier_file($string, $params = '') {
    if ($string) {
        return UPLOAD_DIR . $string;
    }
    return '/assets/images/front/default.jpg';
}

?>
