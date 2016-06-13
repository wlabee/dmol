<?php

class admin_pmcode extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex()
    {
        $dm_id = Tsafe::filter($this->_request['dmid'], 'int');
        $pmcode = Tsafe::filter($this->_request['pmcode']);
        $page = Tsafe::filter($this->_request['page'], 'int');
        $limit = 20;
        if (!$dm_id) {
            $this->response(-1, '无效的DM');
        }

        $where = array('dm_id' => $dm_id);
        if ($pmcode) {
            $where['pmcode'] = $pmcode;
        }
        $m_pmcode = new model_dm_pmcode();
        $m_pmcode->setPage($page);
        $m_pmcode->setLimit($limit);
        $m_pmcode->setCount(true);

        $result = $m_pmcode->select($where, '*', '', 'id asc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        return $this->render('dma/pmcode.tpl');
    }

    public function pageDelete()
    {
        $id = Tsafe::filter($this->_request['id'], 'int');
        if (!$id) {
            $this->response(-1, '无效ID');
        }

        $srv_pm = new service_pmcode($id);
        $succ = $srv_pm->delete();
        if ($succ === false) {
            $this->response(-1, $srv_pm->getError());
        }
        $this->response(0, '操作成功', 'self');
    }

    public function pageAdd()
    {
        $dm_id = Tsafe::filter($this->_request['dmid'], 'int');
        $pm_num = Tsafe::filter($this->_request['pm_num'], 'int');
        if (!$dm_id) {
            $this->response(-1, '无效DM');
        }
        $pm_num = $pm_num ? : 1;

        $srv_pmcode = new service_pmcode();
        $succ = $srv_pmcode->addMultPm($dm_id, $pm_num);
        if ($succ === false) {
            $this->response(-1, $srv_pmcode->getError());
        }
        $this->response(0, 'success');
    }
}
