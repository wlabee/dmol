<?php

class service_article extends components_service
{
    /**
     * @return components_model
     */
    public function getModel()
    {
        return new model_dm_article($this->id);
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
            'ch_id',
            'content',
        );
        $in_data = Tarray::getSub($data, $fildes);
        if (!$in_data['title']) {
            throw new Exception('标题必须');
        }
        if (!$in_data['content']) {
            throw new Exception('需要链接或内容');
        }

        $id = $this->model->insert($in_data);
        if ($id === false) {
            throw new Exception($this->model->getDbError());
            throw new Exception('数据操作错误');
        }
        return $id;
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
            'ch_id',
            'content',
        );
        $in_data = Tarray::getSub($data, $fildes);
        if (!$in_data['title']) {
            throw new Exception('标题必须');
        }
        if (!$in_data['content']) {
            throw new Exception('需要链接或内容');
        }


        $succ = $this->model->update(array('id' => $this->id), $in_data);
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

        $succ = $this->model->delete(array('id' => $this->id));
        if ($succ === false) {
            throw new Exception('数据操作错误');
            // throw new Exception($this->model->getDbError());
        }
        return true;
    }


}
