<?php

class admin_tool extends components_page {
    function __construct() {
        parent::__construct(false);
    }

    function pageIndex($inPath) {

    }

    function pageG($inPath) {
        $dbName = 'r3mvk586i1';
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

}

?>
