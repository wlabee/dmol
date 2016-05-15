<?php

class components_page_front extends components_page {
    public function render($tpl) {
        $config['compile_dir'] = 'front';
        $config['template_dir'] = 'front';
        return parent::render($tpl, $config);
    }

    function showMessage($code = 1, $msg = '正在跳转中', $backurl = '', $second = 0) {
        $params['msg'] = $msg;
        if ($backurl == 'self') {
            $backurl = $_SERVER['HTTP_REFERER'];
        }
        $params['url'] = $backurl;
        if ($second == 0 && $backurl) {
            $this->redirect($backurl);
        }
        if ($backurl && !$second) {
            $second = 2;
        }
        $params['second'] = $second;
        $params['code'] = $code;
        echo $this->render('common/prompt.tpl', $params);
        exit;
    }
}

?>
