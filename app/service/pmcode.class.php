<?php

class service_pmcode extends components_service
{
    public function getModel()
    {
        return new model_dm_pmcode($this->id);
    }

    /**
    * 一个md5的唯一值
    */
    protected function getUnCode($cstr = '')
    {
        $key = uniqid($cstr) . $this->_time;
        return md5($key);
    }

    /**
    * 添加一个pmcode
    */
    public function addOnePm(int $dm_id)
    {
        return $this->invokeTransaction();
    }
    public function _addOnePm(int $dm_id)
    {
        if (! $dm_id) {
            throw new Exception('无效ID');

        }
        $data = array(
            'dm_id' => $dm_id,
            'pmcode' => $this->getUnCode(),
            'create_time' => $this->_time,
            'create_date' => $this->_ymd,
        );
        $succ = $this->model->insert($data);
        if ($succ === false) {
            // throw new Exception($this->model->getDbError());
            throw new Exception('数据库操作错误');
        }
        return true;
    }

    /**
    * 批量添加pmcode
    */
    public function addMultPm(int $dm_id, $num = 1)
    {
        // return $this->inbo
    }
}
