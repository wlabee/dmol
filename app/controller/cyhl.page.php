<?php

class controller_cyhl extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['nav'] = 'cyhl';
    }

    function pageIndex($inPath)
    {
        return $this->render('index/index.tpl');

    }

}

?>
