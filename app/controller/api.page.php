<?php

class controller_api extends components_page_front {
    function __construct() {
        parent::__construct(false);
    }

    public function pageColItt()
    {
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
            $this->response(-1, '提交失败');
        }
        $this->response(0, 'success');
    }

    //md5破解
    public function pageTestMd5()
    {
        $a = array('http://apistore.baidu.com/apiworks/servicedetail/1466.html','http://apistore.baidu.com/apiworks/servicedetail/1466.html');
        $a ='http://apistore.baidu.com/apiworks/servicedetail/1466.html';
        // $a = $_GET['a']?:$a;
        //
        $b = Tbd::shortUlr($a);
        pf($b);
    }
}
