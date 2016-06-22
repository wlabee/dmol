<?php

class controller_jchd extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['nav'] = 'jchd';
    }

    function pageIndex($inPath)
    {
        return $this->render('index/index.tpl');

    }

}

?>
