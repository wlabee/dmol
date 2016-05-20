<?php

class service_dmagroup extends components_service
{
    /**
     * @return components_model
     */
    public function getModel()
    {
        return new model_dm_dma_group($this->id);
    }

    //添加分组
    public function add($data)
    {
        return $this->invokeTransaction();
    }

    public function _add($data)
    {
        $in_data = Tarray::getSub($data, array('g_name', 'g_value'));
        if (!$in_data['g_name']) {
            throw new Exception('无效分组名');
        }
        if (!$in_data['g_value']) {
            throw new Exception('无效标签');
        }
        if (is_array($in_data['g_value'])) {
            $in_data['g_value'] = implode($in_data['g_value'], ',');
        }
        $g_id = $this->model->insert($in_data);
        if ($g_id === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return $g_id;
    }

    //修改分组
    public function edit($data)
    {
        return $this->invokeTransaction();
    }
    public function _edit($data)
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }
        $in_data = Tarray::getSub($data, array('g_name', 'g_value'));
        if (!$in_data['g_name']) {
            throw new Exception('无效分组名');
        }
        if (!$in_data['g_value']) {
            throw new Exception('无效标签');
        }
        if (is_array($in_data['g_value'])) {
            $in_data['g_value'] = implode($in_data['g_value'], ',');
        }
        $succ = $this->model->update(array('g_id' => $this->id), $in_data);
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return $succ;
    }

    //删除分组
    public function delete()
    {
        return $this->invokeTransaction();
    }
    public function _delete()
    {
        if (! $this->id) {
            throw new Exception("无效对象");
        }

        $succ = $this->model->update(array('g_id' => $this->id), array('is_delete' => 1));
        if ($mk_id === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }
}
