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
    protected function getUnCode($num = 1, $cstr = '')
    {
        $rt = array();
        $num = (int)$num ? (int)$num : 1;
        for ($i=1; $i <= $num; $i++) {
            $key = uniqid($cstr) . $this->_time . $i;
            $rt[$i] = md5($key);
        }
        return $rt;
    }

    /**
    * 批量添加pmcode
    */
    public function addMultPm(int $dm_id, $num = 1)
    {
        return $this->invokeTransaction();
    }
    public function _addMultPm(int $dm_id, $num = 1)
    {
        if (! $dm_id) {
            throw new Exception('无效ID');
        }
        $num = (int)$num ? (int)$num : 1;
        if ($num > 100) {
            throw new Exception('一次生成请不要超过100个渠道');
        }
        $pmcodes = $this->getUnCode($num);

        $data = array();
        foreach ($pmcodes as $key => $value) {
            $data[] = array(
                'dm_id' => $dm_id,
                'pmcode' => $value,
                'create_time' => $this->_time,
                'create_date' => $this->_ymd,
            );
        }
        $this->model->addMultiple($data);
        return true;
    }
}
