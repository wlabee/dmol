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

    //微信下单，推送事件模拟
    public function pageTest1($value='')
    {
        $data = '<xml>
<ToUserName><![CDATA[weixin_media1]]></ToUserName>
<FromUserName><![CDATA[oDF3iYyVlek46AyTBbMRVV8VZVlI]]></FromUserName>
<CreateTime>1398144192</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[merchant_order]]></Event>
<OrderId><![CDATA[123456]]></OrderId>
<OrderStatus>2</OrderStatus>
<ProductId><![CDATA[11111]]></ProductId>
<SkuInfo><![CDATA[10001:1000012;10002:100021]]></SkuInfo>
</xml>';
        $header = 'Content-type: text/xml';
        $ret = Tnet::curl('http://www.onenetv2.com/wechat/fromwechat',$data,'POST',$header);
        pf($ret);
    }

}

?>
