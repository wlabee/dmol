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
        $mk_id = $this->model->insert($in_data);
        if ($mk_id === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return $mk_id;
    }

    //修改标签
    public function edit()
    {

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
        if ($mk_id === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }
}
