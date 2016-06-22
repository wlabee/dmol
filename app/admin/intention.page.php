<?php

class admin_intention extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex($inPath) {
        $page = Tsafe::filter($this->_request['page'], 'int');
        $scname = Tsafe::filter($this->_request['scname']);
        $scmobile = Tsafe::filter($this->_request['scmobile']);
        $sckey = Tsafe::filter($this->_request['sckey']);
        $scstatus = Tsafe::filter($this->_request['scstatus'], 'int');
        $limit = 20;
        $where = array('1=1');
        if ($scname) {
            $where['name'] = $scname;
        }
        if ($scmobile) {
            $where['mobile'] = $scmobile;
        }
        if ($sckey) {
            $where['hkey'] = $sckey;
        }
        if ($scstatus > 0) {
            $where['status'] = $scstatus;
        } elseif ($scstatus < 0) {
            $where['status'] = 0;
        }

        $m_itt = new model_dm_intention();
        $m_itt->setPage($page);
        $m_itt->setLimit($limit);
        $m_itt->setCount(true);

        $result = $m_itt->select($where, '*', '', 'id desc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;
        foreach ($this->_tplParams['list'] as $key => $value) {
            $this->_tplParams['list'][$key]['params'] = json_decode($value['params'], true);
        }

        return $this->render('itt/index.tpl');
    }

    public function pageToDone()
    {
        $id = Tsafe::filter($this->_request['id'], 'int');
        if (!$id) {
            $this->response(-1, '无效ID');
        }

        $srv_itt = new service_intention($id);
        $succ = $srv_itt->toDone();
        if ($succ === false) {
            $this->response(-1, $srv_itt->getError());
        }
        $this->response(0, '操作成功', 'self');
    }

    public function pageToThrew()
    {
        $id = Tsafe::filter($this->_request['id'], 'int');
        if (!$id) {
            $this->response(-1, '无效ID');
        }

        $srv_itt = new service_intention($id);
        $succ = $srv_itt->toThrew();
        if ($succ === false) {
            $this->response(-1, $srv_itt->getError());
        }
        $this->response(0, '操作成功', 'self');
    }

}
