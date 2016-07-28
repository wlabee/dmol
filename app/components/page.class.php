<?php

class components_page extends SGui {

    protected $_userid = 0;
    protected $_username = '';

    protected $_post = array();
    protected $_get = array();
    protected $_request = array();
    //模版参数
    protected $_tplParams = array();
    //是否是post提交
    protected $_is_post = false;

    function __construct($isNeedLogin = true) {
        $this->getRequest();
        if ($isNeedLogin) {
            $this->isLogin();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_is_post = true;
        }
        $this->_tplParams['global'] = array(
          'userid' => $this->_userid,
          'username' => $this->_username,
        );
    }

    /**
     * 是否登陆
     */
    protected function isLogin() {
        if (defined('DEV')) {
            $this->_userid = 1;
            $this->_username = 'admin';
            return true;
        }
        $request_uri = urlencode($_SERVER['REQUEST_URI']);
        $token = $_COOKIE['token'];
        if (!$token) {
            Tcommon::setcookie('token', '', -1);
            $this->response(-2, '请先登录', '/login?request_uri='.$request_uri);
        }
        $token = Tsafe::authcode($token, 'DECODE', constant::COOKIE_KEY);
        if (!$token) {
            Tcommon::setcookie('token', '', -1);
            $this->response(-3, '请重新登录', '/login?request_uri='.$request_uri);
            return false;
        }
        $token = json_decode($token, true);
        //验证ip
        // if ($token['ip'] != Tcommon::getIp(1)) {
        //     Tcommon::setcookie('token', '', -1);
        //     $this->response(-3, '登录异常，请重新登录', '/login?request_uri='.$request_uri);
        //     return false;
        // }
        $this->_userid = $token['user_id'];
        $this->_username = $token['user_name'];
        return $token;
    }

    protected function getRequest() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                if (is_string($value)) {
                    $this->_post[$key] = Tsafe::filter($value);
                } else {
                    $this->_post[$key] = $value;
                }
            }
        }
        if ($_GET) {
            foreach ($_GET as $key => $value) {
                if (is_string($value)) {
                    $this->_get[$key] = Tsafe::filter($value);
                } else {
                    $this->_get[$key] = $value;
                }
            }
        }
        $this->_request = $this->_post + $this->_get + $this->getUrlParams();
    }

    /**
     * 返回相应
     *
     * @param int $code
     *              普通响应；小于1为失败，大于等于1为成功
     *              对话框响应：0直接在表单上提示，1关闭对话框，2不关闭对话框
     * @param string $message
     *              普通响应；错误内容，一般小于1时启用
     *              对话框响应：错误内容，一般code==0时启用
     * @param mixed $data
     *              普通响应；返回的数据，一般大于等于0时启用
     *              对话框响应：code==0时，表示错误的字段；code==1时，表示要跳转的url；code==2时，表示对话框中的提示；
     */
    public function response($code = 0, $message = '', $data = '') {
        if (Tnet::isAjax()) {
            echo json_encode(array(
                'code' => $code,
                'message' => $message,
                'data' => $data
            ));
        } else {
            $second = 0;
            if ($message !== '') {
                $second = 3;
            }
            $this->showMessage($code, $message, $data, $second);
        }
        exit;
    }

    /**
     * 分页
     * @param DbData $dbData
     * @return string
     */
    protected function getPageBarByDb($dbData = null) {
        if (!$dbData) {
            return '';
        }
        return $this->getPageBar($dbData->totalSize, $dbData->limit);
    }

    /**
     * 分页
     * @param int $count 总页数
     * @param int $limit 每页多少条
     * @param string $info
     * @return string
     */
    protected function getPageBar($count, $limit, $info = null) {
        if (!$count || !$limit) {
            return '';
        }
        $pagenum = ceil($count / $limit); //总页数
        $current_page = 0;
        if ($this->_request['page'] > 0) {
            if ($current_page > $pagenum) {
                $current_page = $pagenum;
            } else {
                $current_page = (int)$this->_request['page'];
            }
        } else {
            $current_page = 1;
        }
        $prepg = $current_page - 1; //上一页
        if ($prepg < 1) {
            $prepg = null;
        }
        $nextpg = $current_page + 1; //下一页
        if ($nextpg > $pagenum) {
            $nextpg = null;
        }
        for ($i = 0; $i < $pagenum; $i++) {
            $params['pages'][$i]['page'] = $i + 1;
            $params['pages'][$i]['url'] = $this->getPageUrl($this->_request, $i + 1);
        }
//        pf($params['pages']);
        $params['first'] = $this->getPageUrl($this->_request, 1);
        if (!empty($nextpg)) {
            $params['nextpg'] = $this->getPageUrl($this->_request, $nextpg);
        } else {
            $params['nextpg'] = '';
        }
        if (!empty($prepg)) {
            $params['prepg'] = $this->getPageUrl($this->_request, $prepg);
        } else {
            $params['prepg'] = '';
        }
        $params['last'] = $this->getPageUrl($this->_request, $pagenum);
        $params['pagetotal'] = $pagenum;
        $params['currpage'] = $current_page;
        if ($current_page > 5) {
            $params['start'] = $current_page - 5;
            $params['max'] = 9;
        } else {
            $params['start'] = 0;
            $params['max'] = 5;
        }
        if ($info === null) {
            $params['info'] = "共{$count}条";
        } else {
            $params['info'] = $info;
        }
        foreach ($params as $key => $value) {
            $this->_tplParams[$key] = $value;
        }
        return $this->render("page.tpl", 'common');
    }

    public function getUrlParams() {
        $splitFlag = preg_quote(SlightPHP::$splitFlag, "/");
        $inPath = preg_split("/[$splitFlag\/]/", $_SERVER["PATH_INFO"], -1, PREG_SPLIT_NO_EMPTY);
        $newary = array();
        $len = count($inPath);
        for ($i = 3; $i < $len; $i++) {
            //如果不遵守变量规则，直接跳过
            if (preg_match("/[^A-Za-z0-9_]/", $inPath[$i])) continue;

            if ($i % 2) {
                $newary[$inPath[$i]] = $inPath[$i + 1];
            }
        }
        unset($newary[SlightPHP::$urlSuffix]);
        return $newary;
    }

    /**
     * 根据所传页数，获取该页对应的url
     * @param $urlparams array 经解析过的url参数
     * @param $page int 页数
     * @return mixed
     */
    private function getPageUrl($urlparams, $page) {
        $urls = parse_url(Tnet::getLocationUrl());
        $url = $urls['path'];
        $suffix = '';
        if (strpos('.', $url) !== false) {
            $url = substr($url, 0, strpos('.', $url));
            $suffix = substr($url, strpos('.', $url));
        }
        if (array_key_exists('page', $urlparams)) {
            $opage = $urlparams['page'];
            $url = str_replace("page-$opage", "page-$page", $url);
        } else {
            $pageindex = array_search('page', $urlparams);
            if ($pageindex === 0) {
                $url = $url . "page-$page";
            } else {
                $url = $url . "-page-$page";
            }
        }
        $url .= $suffix;
        if ($urls['query']) {
            $url .= '?' . $urls['query'];
        }
        return $url;
    }

    function showMessage($code = 1, $msg = '正在跳转中', $backurl = '', $second = 0) {
        if ($msg) {
            echo $msg;
        }
        if ($backurl) {
            sleep($second);
            $this->redirect($backurl);
        }
        exit;
    }

    public function render($tpl, $dir = '') {
        if(isset($_GET['_d'])){
            pf($this->_tplParams);
        }
        $config['compile_dir'] = $dir;
        $config['template_dir'] = $dir;
        return parent::render($tpl, $this->_tplParams, $config);
    }
}

?>
