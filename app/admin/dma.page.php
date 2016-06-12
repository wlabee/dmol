<?php

class admin_dma extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex($inPath) {
        $page = Tsafe::filter($this->_request['page'], 'int');
        $scname = Tsafe::filter($this->_request['scname']);
        $limit = 20;

        $where = array('is_delete' => 0);
        if ($scname) {
            $where[] = "dm_title like '{$scname}%' ";
        }

        $m_dm = new model_dm_dma();
        $m_dm->setPage($page);
        $m_dm->setLimit($limit);
        $m_dm->setCount(true);

        $result = $m_dm->select($where, '*', '', 'dm_id desc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        return $this->render('dma/index.tpl');
    }

    public function pageAdd()
    {
        if ($this->_is_post) {
            $data = array(
                'dm_title' => Tsafe::filter($this->_request['dm_title']),
            );
            $srv_dma = new service_dma();
            $succ = $srv_dma->add($data);
            if ($succ === false) {
                $this->response(-1, $srv_dma->getError());
            }
            $this->response(0, 'success','/dma');
        }

        $srv_mk = new service_dmamark();
        $this->_tplParams['marks'] = $srv_mk->getMarks();

        $this->_tplParams['mktypes'] = config::_get('mark_type');
        return $this->render('dma/form.tpl');
    }

    public function pageEdit()
    {
        $this->response(0, 'success', 'self');
    }

    public function pageDelete()
    {
        $this->response(0, 'success', 'self');
    }

    public function pagePmcode()
    {
        $dmid = Tsafe::filter($this->_request['dmid'], 'int');
        $page = Tsafe::filter($this->_request['page'], 'int');
    }

}
