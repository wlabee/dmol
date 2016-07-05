<?php

class admin_api extends components_page {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath) {

    }

    public function pageImageUp()
    {
        if ($_FILES['upfile']) {
            $files = Tfile::upload($_FILES['upfile']);
            return $files[0]['url'];
        }
        return '';
    }

}

?>
