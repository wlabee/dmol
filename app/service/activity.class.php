<?php

class service_activity extends components_service
{
    /**
     * @return components_model
     */
    public function getModel()
    {
        return new model_dm_activity($this->id);
    }

    //添加标签
    public function add($data)
    {
        return $this->invokeTransaction();
    }

    public function _add($data)
    {
        $fildes = array(
            'title',
            'description',
            'logo',
            'image',
            'url',
            'start_time',
            'end_time',
            'content',
            'is_push',
            'is_hot',
            'sort',
        );
        $in_data = Tarray::getSub($data, $fildes);
        if (!$in_data['title']) {
            throw new Exception('标题必须');
        }
        if (!$in_data['description']) {
            throw new Exception('描述必须');
        }
        if (!$in_data['logo']) {
            throw new Exception('logo图片必须');
        }
        if (!$in_data['url'] && !$in_data['content']) {
            throw new Exception('需要链接或内容');
        }
        if ($in_data['url'] && Tverify::isUrl($in_data['url'])) {
            throw new Exception('请填写正确的链接地址');
        }
        $in_data['start_time'] = (int)strtotime($in_data['start_time']);
        $in_data['end_time'] = (int)strtotime($in_data['end_time']);
        $in_data['is_push'] = $in_data['is_push']?1:0;
        $in_data['is_hot'] = $in_data['is_hot']?1:0;
        $in_data['sort'] = $in_data['sort']?:99;

        $in_data['create_time'] = $this->_time;
        $in_data['create_date'] = $this->_ymd;

        $act_id = $this->model->insert($in_data);
        if ($act_id === false) {
            throw new Exception($this->model->getDbError());
            throw new Exception('数据操作错误');
        }
        return $act_id;
    }

    //修改标签
    public function edit($data)
    {
        return $this->invokeTransaction();
    }
    public function _edit($data)
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }
        $fildes = array(
            'title',
            'description',
            'logo',
            'image',
            'url',
            'start_time',
            'end_time',
            'content',
            'is_push',
            'is_hot',
            'sort',
        );
        $in_data = Tarray::getSub($data, $fildes);
        if (!$in_data['title']) {
            throw new Exception('标题必须');
        }
        if (!$in_data['description']) {
            throw new Exception('描述必须');
        }
        if (!$in_data['logo']) {
            throw new Exception('图片必须');
        }
        if (!$in_data['url'] && !$in_data['content']) {
            throw new Exception('需要链接或内容');
        }
        if ($in_data['url'] && Tverify::isUrl($in_data['url'])) {
            throw new Exception('请填写正确的链接地址');
        }
        $in_data['start_time'] = (int)strtotime($in_data['start_time']);
        $in_data['end_time'] = (int)strtotime($in_data['end_time']);
        $in_data['is_push'] = $in_data['is_push']?1:0;
        $in_data['is_hot'] = $in_data['is_hot']?1:0;
        $in_data['sort'] = $in_data['sort']?:99;

        $succ = $this->model->update(array('act_id' => $this->id), $in_data);
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }

    //删除标签
    public function delete()
    {
        return $this->invokeTransaction();
    }
    public function _delete()
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }

        $succ = $this->model->update(array('act_id' => $this->id), array('status' => 2));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }

    //目前推送只支持推送到幻灯片。
    //推送
    public function setPush()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'push'
        ), array(1));
    }
    //取消推送
    public function unsetPush()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'push'
        ), array(0));
    }
    //改变推送值
    protected function push($to)
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }
        if (!in_array($to, array(0,1))) {
            throw new Exception("无效参数");
        }
        $succ = $this->model->update(array('act_id' => $this->id), array('is_push' => $to));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }

    //热门
    public function setHot()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'hot'
        ), array(1));
    }
    //取消热门
    public function unsetHot()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'hot'
        ), array(0));
    }
    //改变推送值
    protected function hot($to)
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }
        if (!in_array($to, array(0,1))) {
            throw new Exception("无效参数");
        }
        $succ = $this->model->update(array('act_id' => $this->id), array('is_hot' => $to));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }
}
