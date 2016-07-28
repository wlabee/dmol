<?php

class admin_article extends components_page_admin {
    public function __construct() {
        parent::__construct(true);
        $this->_tplParams['channel'] = config::getArticleCh();
    }

    public function pageIndex($inPath) {
        $page = Tsafe::filter($this->_request['page'], 'int');
        $sctitle = Tsafe::filter($this->_request['sctitle']);
        $chid = Tsafe::filter($this->_request['chid'], 'int');

        $page = $page ? : 1;
        $limit = 20;
        $where = array('1=1');
        if ($sctitle && Tverify::isID($sctitle)) {
            $where['id'] = (int)$sctitle;
        } elseif($sctitle) {
            $where[] = "title like '$sctitle%'";
        }
        if ($chid) {
            $where['ch_id'] = $chid;
        }


        $m_mark = new model_dm_article();
        $m_mark->setPage($page);
        $m_mark->setLimit($limit);
        $m_mark->setCount(true);

        $result = $m_mark->select($where, '*', '', 'id desc');

        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        return $this->render('article/index.tpl');
    }

    public function pageAdd()
    {
        if ($this->_is_post) {
            //do add
            $data = array(
                'title' => Tsafe::filter($this->_request['title']),
                'ch_id' => Tsafe::filter($this->_request['ch_id'], 'int'),
                'content' => $_POST['content'],
            );

            $srv_art = new service_article();
            $succ = $srv_art->add($data);
            if ($succ === false) {
                $this->response(-1, $srv_art->getError());
            }
            $this->response(0, '添加活动成功', '/article');
        }
        return $this->render('article/form.tpl');
    }

    public function pageEdit()
    {
        $id = Tsafe::filter($this->_request['id'], 'int');
        if (!$id) {
            $this->response(-1, '无效文章');
        }
        if ($this->_is_post) {
            //do edit
            $data = array(
                'title' => Tsafe::filter($this->_request['title']),
                'ch_id' => Tsafe::filter($this->_request['ch_id'], 'int'),
                'content' => $_POST['content'],
            );


            $srv_art = new service_article($id);
            $succ = $srv_art->edit($data);
            if ($succ === false) {
                $this->response(-1, $srv_art->getError());
            }
            $this->response(0, '编辑成功', '/article');
        }
        $srv_art = new service_article($id);
        $this->_tplParams['article'] = $srv_art->get();
        return $this->render('article/form.tpl');
    }

    public function pageDelete($value='')
    {
        $id = Tsafe::filter($this->_request['id'], 'int');
        if (!$id) {
            $this->response(-1, '无效ID');
        }

        $srv_art = new service_article($id);
        $succ = $srv_art->delete();
        if ($succ === false) {
            $this->response(-1, $srv_art->getError());
        }
        $this->response(0, '操作成功', 'self');
    }

}
