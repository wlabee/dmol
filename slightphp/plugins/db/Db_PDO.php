<?php

class Db_PDO extends DbObject {

    //private $mysql;
    public $host;
    public $port = 3306;
    public $user;
    public $password;
    public $database;
    public $charset;
    public $orderby;
    public $groupby;
    public $sql;
    public $count = true;
    public $limit = 0;
    public $page = 1;
    private $prefix;
    private $countsql;
    private $affectedRows = 0;
    protected $key = '';
    public $error = array(
        'code' => 0,
        'msg' => ""
    );

    const QUERY_ALL = 0;
    const QUERY_ROW = 1;
    const QUERY_COLUMN = 2;
    const QUERY_SCALAR = 3;

    /**
     * @var array $globals
     */
    static $globals;

    function __construct($prefix = "mysql") {
        $this->prefix = $prefix;
    }

    /**
     * construct
     *
     * @param string host
     * @param string user
     * @param string password
     * @param string database
     * @param int port=3306
     */
    function init($params = array()) {
        $db_config = SDb::getConfig("main", "main");
        if ($db_config) {
            foreach ($db_config as $key => $value) {
                $this->$key = $value;
            }

            $this->key = $this->prefix . ":" . $this->host . ":" . $this->user . ":" . $this->password;
            if (!isset(Db_PDO::$globals[$this->key])) {
                Db_PDO::$globals[$this->key] = "";
            }
        }
    }

    /**
     * is count
     *
     * @param boolean count
     */
    function setCount($count) {
        if ($count == true) {
            $this->count = true;
        } else {
            $this->count = false;
        }
    }

    /**
     * page number
     *
     * @param int page
     */
    function setPage($page) {
        if (!is_numeric($page) || $page < 1) {
            $page = 1;
        }
        $this->page = $page;
    }

    /**
     * page size
     *
     * @param int limit ,0 is all
     */
    function setLimit($limit) {
        if (!is_numeric($limit) || $limit < 0) {
            $limit = 0;
        }
        $this->limit = $limit;
    }

    /**
     * group by sql
     *
     * @param string groupby
     * eg:    setGroupby("groupby MusicID");
     *      setGroupby("groupby MusicID,MusicName");
     */
    function setGroupby($groupby) {
        $this->groupby = $groupby;
    }

    /**
     * order by sql
     *
     * @param string orderby
     * eg:    setOrderby("order by MusicID Desc");
     */
    function setOrderby($orderby) {
        $this->orderby = $orderby;
    }

    /**
     * select data from db
     *
     * @param mixed $table
     * @param array $condition
     * @param array $item
     * @param string $groupby
     * @param string $orderby
     * @param string $leftjoin
     * @return DbData object || Boolean false
     */
    function select($table, $condition = "", $item = "*", $groupby = "", $orderby = "", $leftjoin = "") {
        //{{{$item
        if ($item == "") {
            $item = "*";
        }
        if (is_array($table)) {
            for ($i = 0; $i < count($table); $i++) {
                $tmp[] = trim($table[$i]);
            }
            $table = @implode(" , ", $tmp);
        } else {
            $table = trim($table);
        }

        if (is_array($item) && !empty($item)) {
            $item = @implode(",", $item);
        }
        //}}}
        //{{{$condition
        $condiStr = $this->__quote($condition, "AND", $bind);

        if ($condiStr != "") {
            $condiStr = " WHERE " . $condiStr;
        }
        //}}}
        //{{{
        $join = "";
        if (is_array($leftjoin)) {
            foreach ($leftjoin as $key => $value) {
                $join .= " LEFT JOIN $key ON $value ";
            }
        }
        //}}}
        //{{{
        $this->groupby = $groupby != "" ? $groupby : $this->groupby;
        $this->orderby = $orderby != "" ? $orderby : $this->orderby;

        $orderby_sql = "";
        $orderby_sql_tmp = array();
        if (is_array($orderby)) {
            foreach ($orderby as $key => $value) {
                if (!is_numeric($key)) {
                    $orderby_sql_tmp[] = $key . " " . $value;
                }
            }
        } else {
            $orderby_sql = $this->orderby;
        }
        if (count($orderby_sql_tmp) > 0) {
            $orderby_sql = " ORDER BY " . implode(",", $orderby_sql_tmp);
        }

        $limit = "";
        if ($this->limit != 0) {
            $limit = ($this->page - 1) * $this->limit;
            $limit = "LIMIT $limit,$this->limit";
        }
        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }

        $this->sql = "SELECT $item FROM $table $join $condiStr $groupby $orderby_sql $limit";
        $this->countsql = "SELECT count(1) totalSize FROM $table $join $condiStr $groupby";
        $data = new DbData;

        $data->page = $this->page;
        $data->limit = $this->limit;
        $start = microtime(true);


        $data->limit = $this->limit;
        $data->items = $this->query($this->sql, $bind);
        if ($data->items === false) {
            return false;
        }
        $data->pageSize = count($data->items);
        $end = microtime(true);
        $data->totalSecond = $end - $start;

        if ($this->limit != 0 and $this->count == true and $this->countsql != "") {
            $result_count = $this->query($this->countsql, $bind);
            $data->totalSize = $result_count[0]['totalSize'];
            $data->totalPage = ceil($data->totalSize / $data->limit);
        }
        return $data;
    }

    /**
     * simple select data from db
     *
     * @param mixed $table
     * @param array $condition
     * @param array $item
     * @param string $groupby
     * @param string $orderby
     * @param string $leftjoin
     * @return DbData object || Boolean false
     */
    function selectSimple($table, $condition = "", $item = "*", $groupby = "", $orderby = "", $leftjoin = "", $query_type = self::QUERY_ALL) {
        //{{{$item
        if ($item == "") {
            $item = "*";
        }
        if (is_array($table)) {
            for ($i = 0; $i < count($table); $i++) {
                $tmp[] = trim($table[$i]);
            }
            $table = @implode(" , ", $tmp);
        } else {
            $table = trim($table);
        }

        if (is_array($item) && !empty($item)) {
            $item = @implode(",", $item);
        }
        //}}}
        //{{{$condition
        $condiStr = $this->__quote($condition, "AND", $bind);

        if ($condiStr != "") {
            $condiStr = " WHERE " . $condiStr;
        }
        //}}}
        //{{{
        $join = "";
        if (is_array($leftjoin)) {
            foreach ($leftjoin as $key => $value) {
                $join .= " LEFT JOIN $key ON $value ";
            }
        }
        //}}}
        //{{{
        $this->groupby = $groupby != "" ? $groupby : $this->groupby;
        $this->orderby = $orderby != "" ? $orderby : $this->orderby;

        $orderby_sql = "";
        $orderby_sql_tmp = array();
        if (is_array($orderby)) {
            foreach ($orderby as $key => $value) {
                if (!is_numeric($key)) {
                    $orderby_sql_tmp[] = $key . " " . $value;
                }
            }
        } else {
            $orderby_sql = $this->orderby;
        }
        if (count($orderby_sql_tmp) > 0) {
            $orderby_sql = " ORDER BY " . implode(",", $orderby_sql_tmp);
        }

        $limit = "";
        if ($this->limit != 0) {
            $limit = ($this->page - 1) * $this->limit;
            $limit = "LIMIT $limit,$this->limit";
        }
        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }

        $this->sql = "SELECT $item FROM $table $join $condiStr $groupby $orderby_sql $limit";
        $data = $this->query($this->sql, $bind, array(), $query_type);
        if ($data === false) {
            return false;
        }
        return $data;
    }

    /**
     *
     *
     * @param mixed $table
     * @param array $condition
     * @param array $item
     * @param string $groupby
     * @param string $orderby
     * @param string $leftjoin
     * @return array item
     */
    function selectRow($table, $condition = "", $item = "*", $groupby = "", $orderby = "", $leftjoin = "") {
        $this->setLimit(1);
        $this->setCount(false);
        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }
        $data = $this->selectSimple($table, $condition, $item, $groupby, $orderby, $leftjoin, self::QUERY_ROW);
        if (isset($data)) return $data; else
            return false;
    }

    /**
     *
     *
     * @param mixed $table
     * @param array $condition
     * @param array $item
     * @param string $groupby
     * @param string $orderby
     * @param string $leftjoin
     * @return array item
     */
    function selectOne($table, $condition = "", $item = "*", $groupby = "", $orderby = "", $leftjoin = "") {
        $this->setLimit(1);
        $this->setCount(false);
        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }
        if ($orderby && strpos($orderby, 'order by') === false) {
            $orderby = "order by $orderby";
        }
        $data = $this->selectSimple($table, $condition, $item, $groupby, $orderby, $leftjoin, self::QUERY_SCALAR);
        if (isset($data)) return $data; else
            return false;
    }

    /**
     *
     *
     * @param mixed $table
     * @param array $condition
     * @param array $item
     * @param string $groupby
     * @param string $orderby
     * @param string $leftjoin
     * @return array item
     */
    function selectColumn($table, $condition = "", $item = "", $groupby = "", $orderby = "", $leftjoin = "") {
        $this->setCount(false);
        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }
        if (!$item) {
            $item = $this->selectPK($table);
        }
        $data = $this->selectSimple($table, $condition, $item, $groupby, $orderby, $leftjoin, self::QUERY_COLUMN);
        if (isset($data)) return $data; else
            return false;
    }

    /**
     * update data
     *
     * @param mixed $table
     * @param string ,array $condition
     * @param array $item
     * @param int $limit
     * @return int
     * update("table",array('name'=>'myName','password'=>'myPass'),array('id'=>1));
     * update("table",array('name'=>'myName','password'=>'myPass'),array("password=$myPass"));
     */
    function update($table, $condition = "", $item = "") {
        $value = $this->__quote($item, ",", $bind_v);
        $condiStr = $this->__quote($condition, "AND", $bind_c);
        if ($condiStr != "") {
            $condiStr = " WHERE " . $condiStr;
        }
        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }
        $this->sql = "UPDATE $table SET $value $condiStr";
        if ($this->query($this->sql, $bind_v, $bind_c) !== false) {
            return $this->rowCount();
        } else {
            return false;
        }
    }

    /**
     * delete
     *
     * @param mixed table
     * @param string ,array $condition
     * @param int $limit
     * @return int
     * delete("table",array('name'=>'myName','password'=>'myPass'),array('id'=>1));
     * delete("table",array('name'=>'myName','password'=>'myPass'),array("password=$myPass"));
     */
    function delete($table, $condition = "") {
        $condiStr = $this->__quote($condition, "AND", $bind);
        if ($condiStr != "") {
            $condiStr = " WHERE " . $condiStr;
        }
        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }
        $this->sql = "DELETE FROM  $table $condiStr";
        if ($this->query($this->sql, $bind) !== false) {
            return $this->rowCount();
        } else {
            return false;
        }
    }

    /**
     * insert
     *
     * @param $table
     * @param array $item
     * @param array $update ,egarray("key"=>value,"key2"=>value2")
     * insert into zone_user_online values(2,'','','','',now(),now()) on duplicate key update onlineactivetime=CURRENT_TIMESTAMP;
     * @return int InsertID
     */
    function insert($table, $item = "", $isreplace = false, $isdelayed = false, $update = array()) {
        if ($isreplace == true) {
            $command = "REPLACE";
        } else {
            $command = "INSERT";
        }
        if ($isdelayed == true) {
            $command .= " DELAYED ";
        }

        $f = $this->__quote($item, ",", $bind_f);

        if (strpos($table, '`') === false) {
            $table = "`$table`";
        }
        $this->sql = "$command INTO $table SET $f ";
        $v = $this->__quote($update, ",", $bind_v);
        if (!empty($v)) {
            $this->sql .= "ON DUPLICATE KEY UPDATE $v";
        }
        $r = $this->query($this->sql, $bind_f, $bind_v);
        if ($r !== false) {
            if ($this->lastInsertId() > 0) {
                return $this->lastInsertId();
            } elseif ($this->affectedRows > 0) {
                return $this->affectedRows;
            }
        }
        return $r;
    }

    /**
     * query
     *
     * @param string $sql
     * @return Array $result  || Boolean false
     */
    function query($sql, $bind1 = array(), $bind2 = array(), $query_type = self::QUERY_ALL) {
        if (empty(Db_PDO::$globals[$this->key])) {
            $this->__connect($forceReconnect = true);
        }
        if (defined("DEBUG") && substr($sql, 0, 9) != 'SET NAMES') {
            @header("Content-type: text/html; charset=utf-8");
            echo '<pre>';
            $mysql = $sql;
            $arr = array_merge((array)$bind1, (array)$bind2);
            foreach ($arr as $key => $value) {
                $mysql = preg_replace('/\?/', "'$value'", $mysql, 1);
            }
            echo "$mysql\n";
            echo '</pre>';
            if (DEBUG == 2) {
                exit;
            }
        }
        $stmt = Db_PDO::$globals[$this->key]->prepare($sql);
        if (!$stmt) {
            $this->setError($stmt->errorInfo(), $stmt->errorCode());
            return false;
        }
        if (!empty($bind1)) {
            foreach ($bind1 as $k => $v) {
                $stmt->bindValue($k, $v);
            }
        }
        if (!empty($bind2)) {
            foreach ($bind2 as $k => $v) {
                $stmt->bindValue($k + count($bind1), $v);
            }
        }
        if ($stmt->execute()) {
            $this->affectedRows = $stmt->rowCount();
            switch ($query_type) {
                case self::QUERY_ROW:
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    break;
                case self::QUERY_SCALAR:
                    $result = $stmt->fetchColumn();
                    break;
                case self::QUERY_COLUMN:
                    while ($col = $stmt->fetchColumn()) {
                        $result[] = $col;
                    }
                    break;
                default:
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    break;
            }
            return $result;
        }

        if ($stmt->errorInfo()) {
            $this->setError($stmt->errorInfo(), $stmt->errorCode());
            if (defined("DEBUG")) {
                echo $this->getError();
            }
        }
        return false;
    }

    function lastInsertId() {
        return Db_PDO::$globals[$this->key]->lastInsertId();
    }

    function rowCount() {
        return $this->affectedRows;
    }

    /**
     *
     * @param string $sql
     * @return array $data || Boolean false
     */
    function execute($sql) {
        return $this->query($sql);
    }

    function __connect($forceReconnect = false) {
        if (empty(Db_PDO::$globals[$this->key]) || $forceReconnect) {
            if (!empty(Db_PDO::$globals[$this->key])) {
                unset(Db_PDO::$globals[$this->key]);
            }
            try {
                Db_PDO::$globals[$this->key] = new PDO($this->prefix . ":dbname=" . $this->database . ";host=" . $this->host . ";port=" . $this->port, $this->user, $this->password);
            } catch (Exception $e) {
                die("connect database error:\n" . var_export($this, true));
            }
        }
        if (!empty($this->charset)) {
            $this->execute("SET NAMES " . $this->charset);
        }
    }

    function __quote($condition, $split = "AND", &$bind) {
        $condiStr = "";
        if (!is_array($bind)) {
            $bind = array();
        }
        if (is_array($condition)) {
            $v1 = array();
            $i = 1;
            foreach ($condition as $k => $v) {
                if (!is_numeric($k)) {
                    if (strpos($k, ".") > 0) {
                        $v1[] = "$k = ?";
                    } else {
                        $v1[] = "`$k` = ?";
                    }
                    $bind[$i++] = $v;
                } else {
                    $v1[] = ($v);
                }
            }
            if (count($v1) > 0) {
                $condiStr = implode(" " . $split . " ", $v1);
            }
        } else {
            $condiStr = $condition;
        }
        return $condiStr;
    }

    /**
     * 获取表的主键字段名
     * @final
     * @param string $table 表名
     * @return string
     */
    function selectPK($table) {
        if ($table == '') {
            return false;
        }
        return $this->query("SHOW COLUMNS FROM `$table` where `Key` = 'PRI' ", null, null, self::QUERY_SCALAR);
    }

    /**
     * 获取表非主键的字段名
     * @final
     * @param string $table 表名
     * @return array
     */
    function selectFields($table, $has_pk = false) {
        if ($table == '') {
            return false;
        }
        $sql = "SHOW COLUMNS FROM `$table`";
        if (!$has_pk) {
            $sql .= " where `Key` != 'PRI'";
        }
        return $this->query($sql, null, null, self::QUERY_COLUMN);
    }

    /**
     * 开始事务
     */
    public function beginTransaction() {
        if (empty(Db_PDO::$globals[$this->key])) {
            $this->init();
            $this->__connect($forceReconnect = true);
        }
        return Db_PDO::$globals[$this->key]->beginTransaction();
    }

    /**
     * 提交事务
     */
    public function commit() {
        if (empty(Db_PDO::$globals[$this->key])) {
            $this->init();
            $this->__connect($forceReconnect = true);
        }
        return Db_PDO::$globals[$this->key]->commit();
    }

    /**
     * 回滚事务
     */
    public function rollBack() {
        if (empty(Db_PDO::$globals[$this->key])) {
            $this->init();
            $this->__connect($forceReconnect = true);
        }
        return Db_PDO::$globals[$this->key]->rollBack();
    }

    /**
     * 写入错误信息
     * @param string $msg
     * @param int $code
     */
    protected function setError($msg = "", $code = 0) {
        if (is_array($msg)) {
            $msg = implode(",", $msg);
        }
        $this->error["msg"] = $msg;
        $this->error["code"] = $code;
    }

    /**
     * 获取错误信息
     */
    public function getError($type = 'msg') {
        return $this->error[$type];
    }

}

?>
