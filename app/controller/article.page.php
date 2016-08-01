<?php

class controller_article extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['channel'] = config::getArticleCh();
    }

    function pageIndex($inPath)
    {
        $page = Tsafe::filter($this->_request['page'], 'int');
        $ch = Tsafe::filter($this->_request['ch'], 'int');
        $title = Tsafe::filter($this->_request['title']);

        if (!$ch) {
            $this->response('无效参数');
        }

        $page = $page ? : 1;
        $limit = 20;
        $where = array('ch_id' => $ch);

        if ($title) {
            $where[] = " title like '{$title}%' ";
        }

        $m_art = new model_dm_article();
        $m_art->setPage($page);
        $m_art->setCount(true);
        $m_art->setLimit($limit);
        $result = $m_art->select($where, '*', '', 'id desc');
        $this->_tplParams['pages'] = $this->getPageBarByDb($result);
        $this->_tplParams['list'] = $result->items;

        $this->_tplParams['nav'] = 'ch-'.$ch;
        $this->_tplParams['ch'] = $ch;
        $this->addBread(array(
            'name' => $this->_tplParams['channel'][$ch],
            'url' => '/article/ch-'.$ch.'.html',
        ));

        return $this->render('article/index.tpl');
    }

    public function pageView()
    {
        $id = Tsafe::filter($this->_request['id'], 'int');
        if (! $id) {
            $this->response('无效参数');
        }

        $srv_act = new service_article($id);
        $data = $srv_act->get();

        $this->_tplParams['info'] = $data;

        $this->_tplParams['nav'] = 'ch-'.$data['ch_id'];
        $this->_tplParams['ch'] = $data['ch_id'];
        $this->addBread(array(
            'name' => $this->_tplParams['channel'][$data['ch_id']],
            'url' => '/article/ch-'.$data['ch_id'].'.html',
        ));
        $this->addBread(array(
            'name' => $data['title'],
            'url' => '/article/art-'.$data['id'].'.html'
        ));

        return $this->render('article/view.tpl');
    }

}

?>
