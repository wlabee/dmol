<?php

class controller_syhl extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['nav'] = 'syhl';
    }

    function pageIndex($inPath)
    {
        return $this->render('index/index.tpl');

    }

}

?>
