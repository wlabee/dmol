<?php

class admin_login extends components_page_admin {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath) {
        if ($this->_is_post) {
            //TODO 登录逻辑
            $user_name = Tsafe::filter($this->_request['user_name']);
            $password = Tsafe::filter($this->_request['password']);
            if (!$user_name) {
                $this->response(-1, '请填写用户名');
            }
            if (!$password) {
                $this->response(-1, '请填写密码');
            }
            $srv = new service_admin();
            $user = $srv->login($user_name, $password);
            if ($user === false) {
                $this->response(-1, $srv->getError());
            }
            $this->response(-1, '成功');
        }
        return $this->render('login.tpl');
    }
}

?>
