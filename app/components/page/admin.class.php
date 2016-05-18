<?php

class components_page_admin extends components_page {

    public function __construct($isNeedLogin = true)
    {
        parent::__construct($isNeedLogin);
        $this->_tplParams['menu'] = $this->getMenu();
    }

    public function getMenu() {
        $menu = new admin_module_menu($this->_userid);
        $sub = new admin_module_submenu('医院', 'fa-paper-plane', '#');
        $menu->add($sub);
        $sub = new admin_module_submenu('美丽惠', 'fa-paper-plane', '#');
        $menu->add($sub);
        $sub = new admin_module_submenu('美丽部落', 'fa-paper-plane', '#');
        $menu->add($sub);
        $sub = new admin_module_submenu('会员', 'fa-paper-plane');
        $sub->add(new admin_module_link('评价', 'fa-plus', '/acustomer/add'));
        $menu->add($sub);
        return $menu->getHtml();
    }

    public function render($tpl) {
        $config['compile_dir'] = 'admin';
        $config['template_dir'] = 'admin';
        return parent::render($tpl, $config);
    }

    function showMessage($code = 1, $msg = '正在跳转中', $backurl = '', $second = 0) {
        $this->_tplParams['msg'] = $msg;
        if ($backurl == 'self') {
            $backurl = $_SERVER['HTTP_REFERER'];
        }
        $this->_tplParams['url'] = $backurl;
        if ($second == 0 && $backurl) {
            $this->redirect($backurl);
        }
        if ($backurl && !$second) {
            $second = 2;
        }
        $this->_tplParams['second'] = $second;
        $this->_tplParams['code'] = $code;
        echo $this->render('common/prompt.tpl');
        exit;
    }
}

?>