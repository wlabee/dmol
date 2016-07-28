<?php

class controller_error extends components_page_front {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath)
    {
        $code = Tsafe::filter($this->_request['code'], 'int');
        return $this->render('error/'.$code.'.tpl');

    }

}

?>
