<?php

class admin_main extends components_page_admin {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath) {
//        $mdl = new model_ssm_admin();
//        $mdl->paging(2);
//        $list = $mdl->select(array("admin_id>1"));
//        pf($list);
        if($_FILES){
            pf(Tfile::upload($_FILES['files']));
            pf($_FILES['files']);
        }
        return $this->render('index.tpl');
    }

}

?>
