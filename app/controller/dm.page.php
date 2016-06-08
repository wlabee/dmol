<?php

class controller_dm extends components_page_front {
    function __construct() {
        parent::__construct(false);
    }

    public function dmrender($tpl)
    {
        $file = SlightPHP::$appDir . DIRECTORY_SEPARATOR . "templates" . DIRECTORY_SEPARATOR .'front'.DIRECTORY_SEPARATOR. $tpl;


        if (file_exists($file)) {
            return parent::render($tpl);
        } else {
            return parent::render('dm/default.tpl');
        }
    }
    public function pageIndex()
    {
        pf($_GET);
    }
    function pageDetail($inPath)
    {
        $dmid = Tsafe::filter($this->_request['dmid'], 'int');
        if (!$dmid) {
            $this->response(-1, '参数错误');
        }

        //数据读取
        $m_dm = new model_dm_dma();
        $dm_info = $m_dm->selectOne(array('dm_id' => $dmid), '*');
        if (!$dm_info || !$dm_info['dm_id']) {
            $this->response(-1, '参数错误');
        }
        $this->_tplParams['dm'] = $dm_info;

        //数据统计
        $stat = array(
            'dm_id' => $dmid,
            'reffer' => $_SERVER['HTTP_REFERER'],
            'reffer_kw' => '',//todo 搜索关键词
            'ip' => Tcommon::getIp(1),
            'os' => Tnet::getOS(),
            'pmcode' => $this->_request['pmcode']?:'',
            'request_uri' => $_SERVER['REQUEST_URI'],
        );

        $srv_stat = new service_dmastat();
        //数据统计 - pv
        $succ = $srv_stat->insertPv($stat);
        if ($succ === false) {
            service_error::errorLog('pv记录失败', array('error' => $srv_stat->getError()));
        }

        //数据统计 - uv
        $uv_str = ($this->_userid?:0) . $dmid .'||'. Tcommon::getIp(1) .'||'. $this->_ymd;
        $uv_ck = Tsafe::authcode($uv_str, 'ENCODE', constant::COOKIE_KEY, 24*60*60);
        if (!$_COOKIE['u_k_v_'.$dmid] || $_COOKIE['u_k_v_'.$dmid] != $uv_ck) {
            $succ = $srv_stat->insertUv($stat);
            if ($succ === false) {
                service_error::errorLog('uv记录失败', array('error' => $srv_stat->getError()));
            } else {
                Tcommon::setcookie('u_k_v_'.$dmid, $uv_ck, 24*60*60);
            }
        }

        return $this->dmrender('dm/'.$dmid.'.tpl');
    }


}

?>
