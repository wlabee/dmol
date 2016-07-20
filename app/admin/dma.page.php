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
        $dmid = Tsafe::filter($this->_request['dmid']);
        if ($this->_is_post) {
            $data = array(
                'dm_title' => Tsafe::filter($this->_request['dm_title']),
                'hashead' => Tsafe::filter($this->_request['hashead'], 'int'),
                'dm_content' => $_POST['dm_content'],
            );
            if ($dmid) {
                $srv_dma = new service_dma($dmid);
                $succ = $srv_dma->edit($data);
            } else {
                $srv_dma = new service_dma($dmid);
                $succ = $srv_dma->add($data);
            }
            if ($succ === false) {
                $this->response(-1, $srv_dma->getError());
            }
            $this->response(0, 'success','/dma');
        }

        //$srv_mk = new service_dmamark();
        //$this->_tplParams['marks'] = $srv_mk->getMarks();

        //$this->_tplParams['mktypes'] = config::_get('mark_type');

        //编辑
        if ($dmid) {
            $srv_dma = new service_dma($dmid);
            $this->_tplParams['dma'] = $srv_dma->get();
        }
        return $this->render('dma/form.tpl');
    }

    public function pageEdit()
    {
        $this->response(0, 'success', 'self');
    }

    public function pageDelete()
    {
        $dm_id = Tsafe::filter($this->_request['dmid'], 'int');
        if (!$dm_id) {
            $this->response(-1, '无效ID');
        }

        $srv_dm = new service_dma($dm_id);
        $succ = $srv_dm->delete();
        if ($succ === false) {
            $this->response(-1, $srv_dm->getError());
        }
        $this->response(0, '操作成功', 'self');
    }

}
