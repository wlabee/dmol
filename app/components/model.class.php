<?php

abstract class components_model {

    /**
     * @var Db_PDO
     */
    protected $_db;
    protected $_tableName; //表名
    protected $_pkField; //主键字段
    protected $_fields; //除主键外所有的表字段
    protected $_error = ''; //错误
    protected $_id;

    public function __construct($id = 0) {
        $this->_db = $this->getDb();
        $this->_tableName = $this->getTableName();
        $this->_pkField = $this->getPkField();
        $this->_id = $id;
    }

    protected static function getDb() {
        $db = SDb::getDbEngine("pdo_mysql");
        if (!$db) {
            die("DbEngine not exits");
        }
        $db->init();
        return $db;
    }

    function __destruct() {
        $this->_db = null;
    }

    abstract public function getTableName();

    abstract public function getPkField();

    public function getId() {
        return $this->_id ? $this->_id : $this->{$this->_pkField};
    }

    public function setId($id) {
        $this->_id = $id;
    }

    /**
     * 添加
     * @param array $items 内容
     * @return int
     */
    public function insert($items) {
        return $this->_db->insert($this->_tableName, $items);
    }

    /**
     * 修改
     *
     * @param array $items 内容
     * @param array $condition 条件；
     * @return bool
     */
    public function update($condition, $items) {
        return $this->_db->update($this->_tableName, $condition, $items);
    }

    /**
     * 删除
     * @param array $condition
     * @return bool
     */
    public function delete($condition) {
        return $this->_db->delete($this->_tableName, $condition);
    }

    /**
     * 插入多条数据
     * @example $this->addMultiple(array(array('user_id'=>1,'nickname'=>'zhangsan'),array('user_id'=>2,'nickname'=>'lisi')));
     */
    public function addMultiple($data = array(), $limit = 1000) {
        if (!$data || $limit < 1) {
            return false;
        }
        $fields = array();
        $sql = "INSERT ignore INTO " . $this->_tableName;
        //获取需要添加的字段
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $fields[$key] = $key;
            }
        }
        if (!$fields) {
            return false;
        }
        $sql .= '(`' . implode('`,`', $fields) . '`) VALUES';
        $page = ceil(count($data) / $limit);
        $sqls = array();
        for ($i = 0; $i < $page; $i++) {
            $pageData = array_slice($data, $i * $limit, $limit);
            $sqlvalues = array();
            foreach ($pageData as $row) {
                $values = array();
                foreach ($fields as $field) {
                    $values[] = (string)"'$row[$field]'";
                }
                $sqlvalues[] = '(' . implode(',', $values) . ')';
            }
            $sqls[] = $sql . implode(',', $sqlvalues);
        }
        if ($sqls) {
            foreach ($sqls as $value) {
                $this->_db->query($value);
            }
        }
        return true;
    }

    /**
     * 批量插入或更新多条数据
     * @param array $data 待插入的数据
     * @param array $upfields 当违背唯一约束时，更新的字段
     * @param int $limit 一次插入多少条
     * @example $this->addUpdateMultiple(array(array('user_id'=>1,'nickname'=>'zhangsan'),array('user_id'=>2,'nickname'=>'lisi')),array('nickname'));
     * @return boolean
     */
    public function addUpdateMultiple($data = array(), $upfields = array(), $limit = 1000) {
        if (!$data || !$upfields || $limit < 1) {
            return false;
        }
        $fields = array();
        $sql = "INSERT INTO " . $this->_tableName;
        //获取需要添加的字段
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $fields[$key] = $key;
            }
        }
        if (!$fields) {
            return false;
        }
        $sql .= '(`' . implode('`,`', $fields) . '`) VALUES';
        $page = ceil(count($data) / $limit);
        //违背唯一约束时更新
        $duplicates = array();
        foreach ($upfields as $value) {
            $duplicates[] = "`$value` = values(`$value`)";
        }
        $duplicate = '';
        if ($duplicates) {
            $duplicate = "ON DUPLICATE KEY UPDATE " . implode(',', $duplicates);
        }
        $sqls = array();
        for ($i = 0; $i < $page; $i++) {
            $pageData = array_slice($data, $i * $limit, $limit);
            $sqlvalues = array();
            foreach ($pageData as $row) {
                $values = array();
                foreach ($fields as $field) {
                    $values[] = (string)"'$row[$field]'";
                }
                $sqlvalues[] = '(' . implode(',', $values) . ')';
            }
            $sqls[] = $sql . implode(',', $sqlvalues) . $duplicate;
        }
        if ($sqls) {
            foreach ($sqls as $value) {
                $this->_db->query($value);
            }
        }
        return true;
    }

    /**
     * 更新多条数据
     * 数组的主键作为 表的主键来更新
     * @example $this->updateMultiple(array(array(('key' => 'id',value => 1, 'data' => array('user_name' => 'aa')))));
     * @example $this->updateMultiple(array(1 => array('user_name' => 'aa'));
     */
    public function updateMultiple($data = array(), $key_name) {
        if (!$data) {
            return false;
        }
        $sql = "UPDATE " . $this->_tableName . " set ";

        $sqls = array();
        foreach ($data as $prkey => $row) {
            $tpl_sql = '';
            foreach ($row as $key => $value) {
                $tpl_sql .= " {$key} = '{$value}' ,";
            }
            $tpl_sql = substr($tpl_sql, 0, -1);

            $sqls[] = $sql . $tpl_sql . " where {$key_name} = '{$prkey}' ";
        }
        if ($sqls) {
            foreach ($sqls as $value) {
                $this->_db->query($value);
            }
        }
        return true;
    }

    /**
     * 获取首行首列
     * @final
     * @param mixed $condition 搜索条件
     * @param string $items 显示字段
     * @param string $orderby 显示字段
     * @return string
     */
    public final function getData($condition = '', $items = "count(*)", $orderby = '') {
        return $this->_db->selectOne($this->_tableName, $condition, $items, '', $orderby);
    }

    /**
     * 获取一行
     * @final
     * @param string /array $condition 搜索条件
     * @param string /array $item 显示字段
     * @return array
     */
    public final function selectOne($condition = "", $items = "*") {
        return $this->_db->selectRow($this->_tableName, $condition, $items);
    }

    /**
     * 获取一列
     * @final
     * @param string /array $condition 搜索条件
     * @param string /array $item 显示字段
     * @return array
     */
    public final function selectCol($condition = "", $item = '') {
        return $this->_db->selectColumn($this->_tableName, $condition, $item);
    }

    /**
     * is count
     *
     * @param boolean $count
     */
    function setCount($count) {
        $this->_db->setCount($count);
    }

    /**
     * page number
     *
     * @param int $page
     */
    function setPage($page) {
        $this->_db->setPage($page);
    }

    /**
     * page size
     *
     * @param int $limit
     */
    function setLimit($limit) {
        $this->_db->setLimit($limit);
    }

    public function paging($page, $limit = 15) {
        $this->setPage($page);
        $this->setLimit($limit);
        $this->setCount(true);
    }

    /**
     * 获取列表
     * @param string /array $condition 搜索条件
     * @param string /array $item 显示字段
     * @param string /array $groupby 分组条件
     * @param string /array $orderby 排序条件
     * @param string /array $leftjoin 左链接
     * @return DbData
     */
    public function select($condition = "", $item = "*", $groupby = "", $orderby = "", $leftjoin = "") {
        if ($groupby) {
            $groupby = 'group by ' . $groupby;
        }
        if ($orderby) {
            $orderby = 'order by ' . $orderby;
        }
        $list = $this->_db->select($this->_tableName, $condition, $item, $groupby, $orderby, $leftjoin);
        $this->setError($this->_db->getError());
        return $list;
    }

    public function beginTransaction() {
        $this->_db->beginTransaction();
    }

    public function commit() {
        $this->_db->commit();
    }

    public function rollBack() {
        $this->_db->rollBack();
    }

    /**
     * 将实例转换为数组
     * @final
     * @param array $outArr 需要排除的字段
     * @param array $inArr 只包含的字段
     * @return array
     */
    public final function toArray($outArr = array(), $inArr = array()) {
        $arr = array();
        if (empty($inArr)) {
            foreach ($this as $k => $v) {
                //跳过私有属性
                if (substr($k, 0, 1) != '_' && !in_array($k, $outArr)) {
                    $arr[$k] = $v;
                }
            }
        } else {
            foreach ($inArr as $field) {
                if (!in_array($field, $outArr)) {
                    $arr[$field] = $this->$field;
                }
            }
        }
        return $arr;
    }

    /**
     * 设置错误
     * @param string $message 错误的内容
     */
    protected final function setError($message) {
        $this->_error = $message;
    }

    /**
     * 获取错误
     */
    public final function getError() {
        return $this->_error;
    }

    /**
     * 获取数据库错误信息
     */
    public function getDbError() {
        return join(',', (array)$this->_db->error['msg']);
    }

    public static function getTables($dbName) {
        $db = self::getDb();
        return $db->execute("Select table_name,table_schema from INFORMATION_SCHEMA.TABLES WHERE table_schema = '{$dbName}'");
    }

    public static function getFields($table) {
        $db = self::getDb();
        return $db->selectPK($table);
    }

}

?>
