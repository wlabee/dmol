<?php

class service_error extends components_service
{
    public function getModel()
    {
        return new model_dm_error($this->id);
    }

    public static function errorLog($msg, $data = array(), $code = 0)
    {
        if (!$data) {
            return false;
        }
        $data = array(
            'err_code' => $code?:0,
            'err_msg' => $msg,
            'err_info' => json_encode($data),
            'create_time' => time(),
            'create_date' => date('Y-m-d'),
        );
        $md = new model_dm_error();
        return $md->insert($data);
    }
}
