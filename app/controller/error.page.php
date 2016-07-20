<?php

class controller_error extends components_page_front {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath)
    {
        $code = Tsafe::filter($this->_request['code'], 'int');
        exit('这是一个'.$code.'的错误页面，我还没做！');
        return $this->render('error/'.$code.'.tpl');

    }

}

?>
