<?php

class service_dmastat extends components_service
{
    public function getModel()
    {
        return new model_dm_dma_stat($this->id);
    }

    public function insertPv($data)
    {
        $data['log_type'] = 1;
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'insertData'
        ), array($data));
    }

    public function insertUv($data)
    {
        $data['log_type'] = 2;

        //uv检测
        $condition = array(
            'dm_id' => $data['dm_id'],
            'ip' => $data['ip'],
            'create_date' => $this->_ymd,
            'log_type' => 2,
        );
        $info = $this->model->selectOne($condition, 'log_id');
        if ($info && $info['log_id']) {
            $this->setError(-1, '重复uv');
            return false;
        }

        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            'insertData'
        ), array($data));
    }


    public function insertData($data)
    {
        $in_data = Tarray::getSub($data, array('dm_id','log_type','reffer','reffer_kw','ip','os','pmcode','request_uri'));
        if (! $in_data['dm_id']) {
            throw new Exception("无效参数");
        }

        $in_data['create_time'] = $this->_time;
        $in_data['create_date'] = $this->_ymd;
        $succ = $this->model->insert($in_data);
        if ($succ === false) {
            // throw new Exception($this->model->getDbError());
            throw new Exception('数据操作错误');
        }
        return true;
    }
}
