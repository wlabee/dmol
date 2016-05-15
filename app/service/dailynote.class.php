<?php

class service_dailynote extends components_service {

    /**
     * @return components_model
     */
    function getModel() {
        return new model_dailynote($this->id);
    }

    function add($data) {
        try {
            if (!$data['note_info']) {
                throw new Exception('请填写日志信息');
            }
            $in_data = array(
                'note_info' => $data['note_info'],
                'param' => json_encode($data['param']),
                'create_date' => $this->_ymd,
                'create_time' => date('Y-m-d H:i:s', $this->_time),
                'status' => 1,
            );
            $succ = $this->model->insert($in_data);
            if ($succ === false) {
                throw new Exception($this->model->getDbError());
            }
        }catch(Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }
        return true;
    }
}

?>