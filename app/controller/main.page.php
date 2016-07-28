<?php

class controller_main extends components_page_front {
    function __construct() {
        parent::__construct(false);
        $this->_tplParams['nav'] = 'index';
    }

    function pageIndex($inPath)
    {
        pf($_SERVER);
        $a = "a//////b//////x////c";
        $b = explode('/', $a);
        // $b = array_map(function($item){if($item){return $item;}}, $b);
        $b = array_filter($b,function($item){return $item !== '';});
        $b = array_values($b);
        list($x,$y,$z) = $b;
        echo $x .'.....'.$y.'.....'.$z;
        pf($b);


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

    public function pageItt()
    {
        if ($this->_is_post) {
            $name = Tsafe::filter($this->_request['name']);
            $mobile = Tsafe::filter($this->_request['mobile']);
            $hkey = Tsafe::filter($this->_request['hkey']);

            $data = array(
                'name' => $name,
                'mobile' => $mobile,
                'hkey' => $hkey,
            );
            $srv_itt = new service_intention();
            $succ = $srv_itt->add($data);
            if ($succ === false) {
                $this->response(-1, '提交失败,'.$srv_itt->getError());
            }
            $this->response(1, '保存成功');
        }
        $this->_tplParams['hkey'] = Tsafe::filter($this->_request['hkey']);
        return $this->render('index/itt.tpl');
    }

}

?>
