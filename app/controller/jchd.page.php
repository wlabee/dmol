<?php

class controller_jchd extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['nav'] = 'jchd';
    }

    function pageIndex($inPath)
    {
        $page = Tsafe::filter($this->_request['page'], 'int');
        $title = Tsafe::filter($this->_request['title']);
        $status = Tsafe::filter($this->_request['st'], 'int');

        $page = $page ? : 1;
        $limit = 10;
        $where = array('status' => 1);

        if ($title) {
            $where[] = " title like '{$title}%' ";
        }
        $time = time();
        if ($status) {
            switch ($status) {
                case 1: //正在进行
                    $where[] = " (start_time = 0 or start_time <= '{$time}') ";
                    $where[] = " (end_time = 0 or end_time >= '{$time}') ";
                    break;
                case 2: //即将开始
                    $where[] = " start_time > '{$time}' ";
                    $where[] = " (end_time = 0 or end_time > '{$time}') ";
                    break;
                case 3: //已结束
                    $where[] = " end_time < '{$time}' ";
                    break;
                default:
                    break;
            }
        }

        $m_act = new model_dm_activity();
        $m_act->setPage($page);
        $m_act->setCount(true);
        $m_act->setLimit($limit);

        $result = $m_act->select($where, '*', '', 'sort asc,act_id desc');
        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        $srv_act = new service_activity();
        //推荐活动
        $this->_tplParams['pushs'] = $srv_act->getPushAct();
        //热门活动
        $this->_tplParams['hots'] = $srv_act->getHotAct();

        return $this->render('jchd/index.tpl');
    }

    public function pageView()
    {
        $id = Tsafe::filter($this->_request['id'], 'int');
        if (! $id) {
            $this->response('无效参数');
        }

        $srv_act = new service_activity($id);
        $data = $srv_act->get();

        //有链接直接跳转到链接
        if ($data['url'] && Tverify::isUrl($data['url'])) {
            header("location:".$data['url']);
            exit;
        }

        $this->_tplParams['info'] = $data;

        return $this->render('jchd/view.tpl');
    }

}

?>
