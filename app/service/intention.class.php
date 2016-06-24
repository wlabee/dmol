<?php

class service_intention extends components_service
{
    /**
     * @return components_model
     */
    public function getModel()
    {
        return new model_dm_intention($this->id);
    }

    //添加标签
    public function add($data)
    {
        return $this->invokeTransaction();
    }

    public function _add($data)
    {
        $in_data = Tarray::getSub($data, array('name', 'mobile', 'hkey', 'operator_id', 'operator_name', 'params'));
        if (!$in_data['mobile'] || !Tverify::isMobile($in_data['mobile'])) {
            throw new Exception('无效手机');
        }

        $in_data['params'] = is_array($in_data['params']) ? json_encode($in_data['params']) : $in_data['params'];
        $in_data['operator_id'] = $in_data['operator_id']?:0;
        $in_data['status'] = 0;
        $in_data['create_time'] = $this->_time;
        $in_data['create_date'] = $this->_ymd;
        $id = $this->model->insert($in_data);
        if ($id === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return $id;
    }

    //处理
    public function toDone()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'changeStatus'
        ), array(1));
    }
    //丢弃
    public function toThrew()
    {
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'changeStatus'
        ), array(2));
    }
    //改变状态（锁定解锁）
    protected function changeStatus($status)
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }
        if (!in_array($status, array(1,2))) {
            throw new Exception("无效参数");
        }
        $succ = $this->model->update(array('id' => $this->id), array('status' => $status));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }


}
