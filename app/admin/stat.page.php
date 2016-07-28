<?php

class admin_stat extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex()
    {
        exit('error');
    }
    public function pageDm()
    {
        $dmid = Tsafe::filter($this->_request['dmid'], 'int');
        $start = Tsafe::filter($this->_request['start']);
        $end = Tsafe::filter($this->_request['end']);
        $page = Tsafe::filter($this->_request['page'], 'int');
        $limit = Tsafe::filter($this->_request['limit'], 'int');
        $limit = $limit ? : 20;
        if (!$dmid) {
            $this->response(-1, '无效的DM');
        }

        $where = array('dm_id' => $dmid);
        if ($start) {
            $where[] = "create_date >= '{$start}'";
        }
        if ($end) {
            $where[] = "create_date <= '{$end}'";
        }
        $m_dm = new model_dm_daily_dm();
        $m_dm->setPage($page);
        $m_dm->setLimit($limit);
        $m_dm->setCount(true);

        $result = $m_dm->select($where, '*', '', 'create_date desc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        return $this->render('stat/dm.tpl');
    }

    public function pagePm()
    {
        $pmcode = Tsafe::filter($this->_request['pmcode']);
        $start = Tsafe::filter($this->_request['start']);
        $end = Tsafe::filter($this->_request['end']);
        $page = Tsafe::filter($this->_request['page'], 'int');
        $limit = Tsafe::filter($this->_request['limit'], 'int');
        $limit = $limit ? : 20;
        if (!$pmcode) {
            $this->response(-1, '无效的推广码');
        }

        $where = array('pmcode' => $pmcode);
        if ($start) {
            $where[] = "create_date >= '{$start}'";
        }
        if ($end) {
            $where[] = "create_date <= '{$end}'";
        }
        $m_dm = new model_dm_daily_pm();
        $m_dm->setPage($page);
        $m_dm->setLimit($limit);
        $m_dm->setCount(true);

        $result = $m_dm->select($where, '*', '', 'create_date desc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        return $this->render('stat/pm.tpl');
    }
}
