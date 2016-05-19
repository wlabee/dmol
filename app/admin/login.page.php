<?php

class admin_login extends components_page_admin {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath) {
        if ($_COOKIE['token']) {
            $this->redirect('/');
        }
        if ($this->_is_post) {
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
            $user_str = json_encode(
                array(
                    'user_id' => $user['admin_id'],
                    'user_name' => $user['admin_name'],
                    'role' => $user['role'],
                    'ip' => Tcommon::getIp(),
                )
            );
            $token = Tsafe::authcode($user_str, 'ENCODE', constant::COOKIE_KEY, 24*60*60);
            Tcommon::setcookie('token', $token, 24*60*60);
            $this->response(0, '成功', $this->_request['request_uri']?:'/');
        }
        $this->_tplParams['request_uri'] = $this->_request['request_uri'];
        return $this->render('login.tpl');
    }

    public function pageLogout()
    {
        Tcommon::setcookie('token', '', -1);
        $this->response(-1, '退出成功', '/login');
    }
}
