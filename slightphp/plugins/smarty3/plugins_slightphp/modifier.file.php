<?php
function smarty_modifier_file($string, $params = '') {
    return UPLOAD_DIR . $string;
}

?>
