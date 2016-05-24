<?php

class service_dmamark extends components_service
{
    /**
     * @return components_model
     */
    public function getModel()
    {
        return new model_dm_dma_mark($this->id);
    }

    //添加标签
    public function add($data)
    {
        return $this->invokeTransaction();
    }

    public function _add($data)
    {
        $in_data = Tarray::getSub($data, array('mk_name', 'mk_type'));
        if (!$in_data['mk_name']) {
            throw new Exception('无效标签名');
        }
        $mtype = config::_get('mark_type');
        if (!$in_data['mk_type'] || !$mtype[$in_data['mk_type']]) {
            throw new Exception('无效标签类型');
        }

        if ($this->hasName($in_data['mk_name'])) {
            throw new Exception("标签名重复");
        }


        $in_data['status'] = 0;
        $in_data['is_delete'] = 0;
        $mk_id = $this->model->insert($in_data);
        if ($mk_id === false) {
            // throw new Exception('数据操作错误');
            throw new Exception($this->model->getDbError());
        }
        return $mk_id;
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
        $in_data = Tarray::getSub($data, array('mk_name'));
        if (!$in_data['mk_name']) {
            throw new Exception("无效标签名");
        }
        if ($this->hasName($in_data['mk_name'], $this->id)) {
            throw new Exception("标签名重复");
        }
        $succ = $this->model->update(array('mk_id' => $this->id), $in_data);
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

        $succ = $this->model->update(array('mk_id' => $this->id), array('is_delete' => 1));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }

    //锁定
    public function lock()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'changeStatus'
        ), array(1));
    }
    //解锁
    public function unlock()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'changeStatus'
        ), array(0));
    }
    //改变状态（锁定解锁）
    protected function changeStatus($status)
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }
        if (!in_array($status, array(0,1))) {
            throw new Exception("无效参数");
        }
        $succ = $this->model->update(array('mk_id' => $this->id), array('status' => $status));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }

    //标签名不能重复，-没有做唯一约束
    private function hasName($name, $id = 0)
    {
        $where = array('mk_name' => $name);
        if ($id) {
            $where[] = "mk_id != $id";
        }
        $mk_info = $this->model->selectOne($where, 'mk_id');
        if ($mk_info && $mk_info['mk_id']) {
            return true;
        }
        return false;
    }
}
