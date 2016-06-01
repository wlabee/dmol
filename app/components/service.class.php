<?php

abstract class components_service {

    protected $id;
    protected $_ymd;
    protected $_time;

    //是否开启事务
    protected $transaction = true;

    //是否强行读取主表信息
    protected $dbentry = false;

    //是否为锁定方式获取数据
    protected $lock = false;

    //只对指定的表进行锁定,配合$lock使用
    protected $lock_tables = NULL;

    //错误信息
    protected $_error = array();

    /**
     * @var components_model
     */
    protected $model = null;

    protected $_info = array();

    public function __construct($id = 0) {
        $this->id = $id;
        $this->_time = time();
        $this->_ymd = date('Y-m-d', $this->_time);
        $this->model = $this->getModel();
    }

    /**
     * @return components_model
     */
    abstract function getModel();

    protected function invokeTransaction() {
        $backtrace = debug_backtrace();
        return $this->_invokeTransaction(array('dmol'), array(
            $this,
            '_' . $backtrace[1]['function']
        ), $backtrace[1]['args']);
    }

    /**
     * 发起闭包事务调用
     *
     * @param $db_list
     * @param callable $invoke
     * @param array $params
     * @return boolean|mixed
     */
    protected function _invokeTransaction($db_list, $invoke, array $params) {
        if ($db_list == NULL) {
            $this->setError(-1, 'transaction unable to start, db not set');
            return false;
        }
        is_array($db_list) || $db_list = array($db_list == NULL);

        if (is_callable($invoke) == false) {
            $this->setError(-1, 'transaction unable to start, invoke not callable');
            return false;
        }

        try {
            foreach ($db_list as $db) {
                $this->_beginTransaction($db);
            }

            $return = call_user_func_array($invoke, $params);

            foreach ($db_list as $db) {
                $this->_commit($db);
            }

            return $return;

        } catch (Exception $e) {
            foreach ($db_list as $db) {
                $this->_rollBack($db);
                $this->setError(-1, $e->getMessage());
            }
            return false;
        }
    }

    /**
     * 开启一个事务
     */
    protected function _beginTransaction() {
        $this->model->beginTransaction();
    }

    /**
     * 提交一个事务
     */
    protected function _commit() {
        $this->model->commit();
    }

    /**
     * 回滚一个事务
     */
    protected function _rollBack() {
        $this->model->rollBack();
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
        $this->model->setId($id);
    }


    public function set($key, $value) {
        $this->_info[$key] = $value;
    }

    public function get($key = '*') {
        if (!$this->_info[$this->id]) {
            $this->_info[$this->id] = $this->model->selectOne(array($this->model->getPkField() => $this->id));
        }
        if ($key && $key != '*') {
            return $this->_info[$this->id][$key];
        }
        return $this->_info[$this->id];
    }

    public function save($data) {
        if (!$data) {
            return true;
        }
        if ($this->id) {
            return $this->model->update(array($this->model->getPkField() => $this->id), $data);
        } else {
            return $this->model->insert($data);
        }
    }

    public function del() {
        if (!$this->id) {
            $this->setError("主键不存在");
            return false;
        }
        return $this->model->delete(array($this->model->getPkField() => $this->id));
    }

    /**
     * 获取冗余字段的内容
     * @param string $key 字段名
     * @param string $field
     * @return string
     */
    public function getOption($key, $field = 'options') {
        $options = $this->get($field);
        $optionsArr = array();
        if ($options) {
            $optionsArr = json_decode($options, true);
        }
        return $optionsArr[$key];
    }

    /**
     * 修改冗余某个字段的内容
     * @param string $key 字段名
     * @param string $value 值
     * @param string $field
     * @return int
     */
    public function setOptions($key, $value, $field = 'options') {
        $options = $this->get($field);
        $optionsArr = array();
        if ($options) {
            $optionsArr = json_decode($options, true);
        }
        $optionsArr[$key] = $value;
        $options = json_encode($optionsArr);
        return $options;
    }

    /**
     * 写入错误信息
     * @param string $msg
     * @param int $code
     */
    protected function setError($code = 0, $msg = "") {
        $this->_error["code"] = $code;
        $this->_error["msg"] = $msg;
    }

    /**
     * 获取错误信息
     * @param string $type 参数：msg:错误信息,code:错误代码
     */
    public function getError($type = "msg") {
        return $this->_error[$type];
    }

    /**
     * 获取查询条件
     * @param array|string|int $condition 条件
     * @return array
     */
    protected function getCondition($condition) {
        $rs = array();
        if (is_array($condition)) {
            $rs = $condition;
        } else if (Tverify::isID($condition)) {
            $rs[$this->model->getPkField()] = $condition;
        } else if ($this->getId()) {
            $rs[$this->model->getPkField()] = $this->getId();
        }
        return $rs;
    }
    protected function getUser()
    {
        $token = $_COOKIE['token'];
        $token = json_decode($token, true);
        return array(
            '_userid' => $token['user_id'],
            '_username' => $token['user_name'],
        );
    }

}
