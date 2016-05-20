<?php

class admin_mark extends components_page_admin {
    function __construct() {
        parent::__construct(true);
    }

    function pageIndex($inPath) {
        return $this->render('mark/index.tpl');
    }

}
