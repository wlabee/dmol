<?php /* Smarty version Smarty-3.0.6, created on 2016-04-28 16:31:36
         compiled from "app\templates\front\index/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:51445721ca68d74806-82719231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7435eff4569485402b7e2062c5b726af33d449a1' => 
    array (
      0 => 'app\\templates\\front\\index/post.tpl',
      1 => 1461652756,
      2 => 'file',
    ),
    '14082c86d26965bf1ecb209fce24b7dfff76e991' => 
    array (
      0 => 'app\\templates\\front\\layout.tpl',
      1 => 1461832199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51445721ca68d74806-82719231',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_js')) include 'E:\www\byco\slightphp\plugins\smarty3\/plugins_slightphp\function.js.php';
if (!is_callable('smarty_function_bs')) include 'E:\www\byco\slightphp\plugins\smarty3\/plugins_slightphp\function.bs.php';
if (!is_callable('smarty_function_css')) include 'E:\www\byco\slightphp\plugins\smarty3\/plugins_slightphp\function.css.php';
?><!DOCTYPE html>
<html>
<head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description"
              content=""/>
        <meta name="keywords" content=""/>
        <?php echo smarty_function_js(array('type'=>"plugin",'file'=>"jquery.min.js"),$_smarty_tpl);?>

        <?php echo smarty_function_bs(array('type'=>"js",'file'=>"bootstrap"),$_smarty_tpl);?>

        <?php echo smarty_function_bs(array('type'=>"css",'file'=>"bootstrap"),$_smarty_tpl);?>

        
    <?php echo smarty_function_css(array('path'=>"front",'file'=>"index"),$_smarty_tpl);?>


    
</head>
<body class="">

    <div id="container-fluid">
        <div id="containe-header">
            
        </div>
        <div id="containe">
            
    <div class="row">
        <a href="/">列表</a>
        <form action="" method="post">
            <input type="hidden" name="post" value="1"/>
            <textarea name="info" id="" cols="80" rows="10"></textarea>
            <input type="submit" value="提交"/>
        </form>
    </div>

        </div>
        <div id="containe-footer">
            
        </div>
    </div>


    <?php echo smarty_function_js(array('path'=>"front",'file'=>"index,share"),$_smarty_tpl);?>

    <?php echo smarty_function_js(array('type'=>"plugin",'file'=>"/nivoSlider/jquery.nivo.slider.js"),$_smarty_tpl);?>

    <?php echo smarty_function_css(array('type'=>"plugin",'file'=>"/nivoSlider/nivo-slider.css"),$_smarty_tpl);?>


</body>
</html>