<?php

class components_page_front extends components_page {

    public function __construct($isNeedLogin = true)
    {
        parent::__construct($isNeedLogin);
        $this->_tplParams['bm_ak'] = constant::BMAP_KEY;
        $this->_tplParams['nav'] = '';
    }

    public function render($tpl, $dir = 'front') {
        $config['compile_dir'] = $dir;
        $config['template_dir'] = $dir;
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
        echo $this->render('prompt.tpl', 'common');
        exit;
    }
}

?>
