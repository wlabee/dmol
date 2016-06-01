<?php

class admin_dma extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex($inPath) {
        // $page = Tsafe::filter($this->_request['page'], 'int');
        // $scname = Tsafe::filter($this->_request['scname']);
        // $limit = 20;
        //
        // $m_mark = new model_dm_dma_mark();
        // $m_mark->setPage($page);
        // $m_mark->setLimit($limit);
        // $m_mark->setCount(true);
        //
        // $result = $m_mark->select($where, '*', '', 'mk_id desc');
        //
        // $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        // $this->_tplParams['list'] = $result->items;
        // $this->_tplParams['mktypes'] = config::_get('mark_type');

        return $this->render('mark/index.tpl');
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

    public function pageDelete($value='')
    {
        $this->response(0, 'success', 'self');
    }

}
