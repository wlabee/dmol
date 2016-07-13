<?php

class admin_tool extends components_page {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath) {

    }

    function pageG($inPath) {
        $dbName = 'dmol';
        $tables = components_model::getTables($dbName);
        if ($tables) {
            foreach ($tables as $table) {
                $pk = components_model::getFields($table['table_name']);
                $paths = explode('_', $table['table_name']);
                $path = ROOT_DIR . '/app/model/' . implode('/', array_slice($paths, 0, count($paths) - 1));
                $fileName = $path . '/' . end($paths) . '.class.php';
                if (file_exists($fileName)) {
                    continue;
                }
                if ($paths && !file_exists($path)) {
                    mkdir($path, 777, true);
                }
                $content = file_get_contents(ROOT_DIR . '/app/components/model.tpl');
                $content = str_replace('{/className/}', $table['table_name'], $content);
                $content = str_replace('{/fields/}', '', $content);
                $content = str_replace('{/tableName/}', $table['table_name'], $content);
                $content = str_replace('{/tablePK/}', $pk, $content);
                file_put_contents($fileName, $content);
            }
        }
        echo 'over';
    }


    //同步dm维度每日归档
    public function pageStatDm()
    {
        $date = Tsafe::filter($this->_request['date']);
        $yesterday = date('Y-m-d', strtotime("-1 days"));
        $date = $date && strtotime($date) ? $date : $yesterday;

        $m_stat = new model_dm_dma_stat();
        $m_stdm = new model_dm_daily_dm();

        $where = array('1=1');
        if ($date) {
            $where['create_date'] = $date;
        }

        $data = $m_stat->select($where, 'dm_id,log_type,count(log_id) as num', 'dm_id,log_type')->items;
        $data_m = array();
        foreach ($data as $key => $value) {
            switch ($value['log_type']) {
                case '1':
                    $data_m[$value['dm_id']]['pv'] = $value['num'];
                    break;
                case '2':
                    $data_m[$value['dm_id']]['uv'] = $value['num'];
                    break;
                default:
                    break;
            }
            $data_m[$value['dm_id']]['dm_id'] = $value['dm_id'];
            $data_m[$value['dm_id']]['create_date'] = $date;
        }
        if ($data_m) {
            $m_stdm->addUpdateMultiple($data_m, array('pv', 'uv'));
        }
        exit('over');
    }

    //同步pmcode维度每日归档
    public function pageStatPm()
    {
        $date = Tsafe::filter($this->_request['date']);
        $yesterday = date('Y-m-d', strtotime("-1 days"));
        $date = $date && strtotime($date) ? $date : $yesterday;

        $m_stat = new model_dm_dma_stat();
        $m_stpm = new model_dm_daily_pm();

        $where = array('1=1','length(pmcode) > 0');
        if ($date) {
            $where['create_date'] = $date;
        }

        $data = $m_stat->select($where, 'dm_id,pmcode,log_type,count(log_id) as num', 'pmcode,log_type')->items;
        $data_m = array();
        foreach ($data as $key => $value) {
            if ($value['pmcode']) {
                switch ($value['log_type']) {
                    case '1':
                    $data_m[$value['dm_id']]['pv'] = $value['num'];
                    break;
                    case '2':
                    $data_m[$value['dm_id']]['uv'] = $value['num'];
                    break;
                    default:
                    break;
                }
                $data_m[$value['dm_id']]['pmcode'] = $value['pmcode'];
                $data_m[$value['dm_id']]['create_date'] = $date;
            }
        }
        if ($data_m) {
            $m_stpm->addUpdateMultiple($data_m, array('pv', 'uv'));
        }
        exit('over');
    }

}

?>
