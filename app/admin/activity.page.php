<?php

class admin_activity extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
    }

    public function pageIndex($inPath) {
        if ($_POST['saveorder']) {
            $sort = $_POST['sortnum'];
            if ($sort) {
                $srv_act = new service_activity();
                $srv_act->saveSort($sort);
            }
        }
        $page = Tsafe::filter($this->_request['page'], 'int');
        $sctitle = Tsafe::filter($this->_request['sctitle']);
        $scstatus = Tsafe::filter($this->_request['scstatus'], 'int');
        $ishot = Tsafe::filter($this->_request['ishot'], 'int');
        $ispush = Tsafe::filter($this->_request['ispush'], 'int');

        $page = $page ? : 1;
        $limit = 20;
        $where = array('1=1');
        if ($sctitle && Tverify::isID($sctitle)) {
            $where['act_id'] = (int)$sctitle;
        } elseif($sctitle) {
            $where[] = "title like '$sctitle%'";
        }
        $scstatus = $scstatus?$scstatus:1;
        $_GET['scstatus'] = $scstatus;
        if ($scstatus) {
            $where['status'] = $scstatus;
        }
        if ($ishot) {
            $ishot = $ishot > 0 ? $ishot : 0;
            $where['is_hot'] = $ishot;
        }
        if ($ispush) {
            $ispush = $ispush > 0 ? $ispush : 0;
            $where['is_push'] = $ispush;
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
            if ($_FILES['image'] || $_FILES['logo']) {
                $files = Tfile::upload($_FILES);
                if ($_FILES['logo']) {
                    $files = array_shift($files);
                    $data['logo'] = $files['url'];
                }
                if ($_FILES['image']) {
                    $files = array_shift($files);
                    $data['image'] = $files['url'];
                }
            }

            $srv_act = new service_activity();
            $succ = $srv_act->add($data);
            if ($succ === false) {
                $this->response(-1, $srv_act->getError());
            }
            $this->response(0, '添加活动成功', '/activity');
        }
        return $this->render('activity/form.tpl');
    }

    public function pageEdit()
    {
        $act_id = Tsafe::filter($this->_request['id'], 'int');
        if (!$act_id) {
            $this->response(-1, '无效活动');
        }
        if ($this->_is_post) {
            //do edit
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
            if ($_FILES['image']['error'] == 0 || $_FILES['logo']['error'] == 0) {
                $files = Tfile::upload($_FILES);
                if ($_FILES['logo']['error'] == 0) {
                    $files = array_shift($files);
                    $data['logo'] = $files['url'];
                }
                if ($_FILES['image']['error'] == 0) {
                    $files = array_shift($files);
                    $data['image'] = $files['url'];
                }
            }

            $srv_act = new service_activity($act_id);
            $succ = $srv_act->edit($data);
            if ($succ === false) {
                $this->response(-1, $srv_act->getError());
            }
            $this->response(0, '编辑成功', '/activity');
        }
        $srv_act = new service_activity($act_id);
        $this->_tplParams['act'] = $srv_act->get();
        return $this->render('activity/form.tpl');
    }

    public function pageDelete($value='')
    {
        $act_id = Tsafe::filter($this->_request['id'], 'int');
        if (!$act_id) {
            $this->response(-1, '无效ID');
        }

        $srv_act = new service_activity($act_id);
        $succ = $srv_act->delete();
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
