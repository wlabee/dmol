<?php

class controller_main extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['nav'] = 'index';
    }

    function pageIndex($inPath)
    {
        return $this->render('index/index.tpl');
    	if ($this->_request['post'] == 1) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ser = new service_dailynote();
                $data = array(
                    'note_info' => $this->_request['info'],
                );
                $succ = $ser->add($data);
                if ($succ) {
                    $this->showMessage(1, '添加成功', '/');
                } else {
                    $this->showMessage(1, '添加失败，' . $ser->getError(), '/?post=1');
                }
            } else {
                return $this->render('index/post.tpl');
            }
        } else {
            $page = 1;
            $limit = 20;
            $m = new model_dailynote();
            $m->setCount(true);
            $m->setLimit($limit);
            $m->setPage($page);
            $result = $m->select(array('status' => 1), '*', '', 'id desc');
            $this->_tplParams['list'] = $result->items;
            return $this->render('index/index.tpl');
        }
    }
    public function pageMap()
    {
    	return $this->render('index/map.tpl');
    }

}

?>
