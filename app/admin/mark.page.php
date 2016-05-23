<?php

class admin_mark extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex($inPath) {
        $page = Tsafe::filter($this->_request['page'], 'int');
        $scname = Tsafe::filter($this->_request['scname']);
        $limit = 20;
        $where = array('is_delete' => 0);
        if ($scname && Tsafe::isID($scname)) {
            $where['mk_id'] = (int)$scname;
        } elseif($scname) {
            $where[] = "mk_name like '$scname%'";
        }

        $m_mark = new model_dm_dma_mark();
        $m_mark->setPage($page);
        $m_mark->setLimit($limit);
        $m_mark->setCount(true);

        $result = $m_mark->select($where, '*', '', 'mk_id desc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        return $this->render('mark/index.tpl');
    }

    public function pageAdd()
    {
        if ($this->_is_post) {
            //do add
            $data = array(
                'mk_name' => Tsafe::filter($this->_request['mk_name']),
                'mk_type' => Tsafe::filter($this->_request['mk_type']),
            );
            if (! $data['mk_name']) {
                $this->response(-1, "无效的标签名");
            }
            $mtype = config::_get('mark_type');
            if (! $data['mk_type'] || ! $mtype[$data['mk_type']]) {
                $this->response(-1, "无效的标签类型");
            }
            $srv_mk = new service_dmamark();
            $succ = $srv_mk->add($data);
            if ($succ === false) {
                $this->response(-1, $srv_mk->getError());
            }
            $this->response(0, 'success');
        }
        $this->_tplParams['mktypes'] = config::_get('mark_type');
        return $this->render('mark/form.tpl');
    }

    public function pageEdit()
    {
        $mk_id = Tsafe::filter($this->_request['mkid'], 'int');
        if (!$mk_id) {
            $this->response(-1, '无效ID');
        }
        if ($this->_is_post) {
            //do edit
            $mk_name = Tsafe::filter($this->_request['mk_name']);
            if (!$mk_name) {
                $this->response(-1, "无效的标签名");
            }
            $srv_mk = new service_dmamark($mk_id);
            $succ = $srv_mk->edit(array('mk_name' => $mk_name));
            if ($succ === false) {
                $this->response(-1, $srv_mk->getError());
            }
            $this->response(0, 'success');
        }
        $this->_tplParams['mktypes'] = config::_get('mark_type');
        $srv_mk = new service_dmamark($mk_id);
        $this->_tplParams['mkinfo'] = $srv_mk->get();
        return $this->render('mark/form.tpl');
    }

    public function pageDelete($value='')
    {
        $mk_id = Tsafe::filter($this->_request['mkid'], 'int');
        if (!$mk_id) {
            $this->response(-1, '无效ID');
        }

        $srv_mk = new service_dmamark($mk_id);
        $succ = $srv_mk->delete();
        if ($succ === false) {
            $this->response(-1, $srv_mk->getError());
        }
        $this->response(0, '操作成功');
    }

    public function pageLock()
    {
        $mk_id = Tsafe::filter($this->_request['mkid'], 'int');
        if (!$mk_id) {
            $this->response(-1, '无效ID');
        }

        $srv_mk = new service_dmamark($mk_id);
        $succ = $srv_mk->lock();
        if ($succ === false) {
            $this->response(-1, $srv_mk->getError());
        }
        $this->response(0, '操作成功');
    }

    public function pageUnlock()
    {
        $mk_id = Tsafe::filter($this->_request['mkid'], 'int');
        if (!$mk_id) {
            $this->response(-1, '无效ID');
        }

        $srv_mk = new service_dmamark($mk_id);
        $succ = $srv_mk->unlock();
        if ($succ === false) {
            $this->response(-1, $srv_mk->getError());
        }
        $this->response(0, '操作成功');
    }

}
