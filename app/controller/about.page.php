<?php

class controller_about extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['nav'] = 'about';
    }

    function pageIndex($inPath)
    {
        return $this->render('index/index.tpl');

    }

}

?>
