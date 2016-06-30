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

        //推荐活动
        //热门活动

        return $this->render('jchd/index.tpl');
    }

}

?>
