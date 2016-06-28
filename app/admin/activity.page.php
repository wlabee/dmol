<?php

class admin_activity extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex($inPath) {
        $page = Tsafe::filter($this->_request['page'], 'int');
        $sctitle = Tsafe::filter($this->_request['sctitle']);
        $scstatus = Tsafe::filter($this->_request['scstatus']);
        $ishot = Tsafe::filter($this->_request['ishot']);
        $ispush = Tsafe::filter($this->_request['ispush']);

        $limit = 20;
        $where = array('1=1');
        if ($sctitle && Tverify::isID($sctitle)) {
            $where['act_id'] = (int)$sctitle;
        } elseif($sctitle) {
            $where[] = "title like '$sctitle%'";
        }
        if ($scstatus) {
            $where['status'] = $scstatus;
        }
        if ($ishot) {
            $ishot = $ishot > 0 ? $ishot : 0;
            $where['ishot'] = $ishot;
        }
        if ($ispush) {
            $ispush = $ispush > 0 ? $ispush : 0;
            $where['ispush'] = $ispush;
        }

        $m_mark = new model_dm_activity();
        $m_mark->setPage($page);
        $m_mark->setLimit($limit);
        $m_mark->setCount(true);

        $result = $m_mark->select($where, '*', '', 'sort asc,act_id desc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        return $this->render('activity/index.tpl');
    }

    public function pageAdd()
    {
        if ($this->_is_post) {
            //do add
            $data = array(
                'title' => Tsafe::filter($this->_request['title']),
                'description' => Tsafe::filter($this->_request['description']),
                'url' => Tsafe::filter($this->_request['url']),
                'is_push' => Tsafe::filter($this->_request['ispush']),
                'is_hot' => Tsafe::filter($this->_request['ishot']),
                'sort' => Tsafe::filter($this->_request['sort']),
                'start_time' => Tsafe::filter($this->_request['start_time']),
                'end_time' => Tsafe::filter($this->_request['end_time']),
            );
            if (! $data['title']) {
                $this->response(-1, "请填写活动标题");
            }

            $srv_act = new service_activity();
            $succ = $srv_act->add($data);
            if ($succ === false) {
                $this->response(-1, $srv_act->getError());
            }
            $this->response(0, 'success', 'self');
        }
        return $this->render('activity/form.tpl');
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
            $this->response(0, 'success', 'self');
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
        $this->response(0, '操作成功', 'self');
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
        $this->response(0, '操作成功', 'self');
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
        $this->response(0, '操作成功', 'self');
    }

}
