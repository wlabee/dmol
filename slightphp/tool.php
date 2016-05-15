<?php

function pf($str='',$isexit=true){
    @header("Content-type: text/html; charset=utf-8");
    echo '<pre>';
    if ($str === null||$str === false) {
        var_dump($str);
    } else {
        print_r($str);
    }
    echo '</pre><hr />';
    if($isexit){
        exit;
    }
}
function pv($str='',$isexit=true){
    @header("Content-type: text/html; charset=utf-8");
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
    if($isexit){
        exit;
    }
}
?>