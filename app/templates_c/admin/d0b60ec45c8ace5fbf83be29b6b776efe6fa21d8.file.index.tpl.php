<?php /* Smarty version Smarty-3.0.6, created on 2016-05-17 19:11:37
         compiled from "app/templates/admin/login/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:570325430573afc6971d608-46455702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0b60ec45c8ace5fbf83be29b6b776efe6fa21d8' => 
    array (
      0 => 'app/templates/admin/login/index.tpl',
      1 => 1463481602,
      2 => 'file',
    ),
    'f58feb634e5576ecd133d0b7646f3b7c01cb4e6a' => 
    array (
      0 => 'app/templates/admin/layout.tpl',
      1 => 1447729598,
      2 => 'file',
    ),
    '6283b109ea6e71330de9d0acf99433fd4628bec8' => 
    array (
      0 => 'app/templates/admin/./common/navbar.tpl',
      1 => 1447729598,
      2 => 'file',
    ),
    '58797b991c4a635d8bef45f483d12b4c6e10e2a9' => 
    array (
      0 => 'app/templates/admin/common/message.tpl',
      1 => 1447729598,
      2 => 'file',
    ),
    'a1c4d51c806bf5b7260fd1d9b7a5f361edb47694' => 
    array (
      0 => 'app/templates/admin/./common/menu.tpl',
      1 => 1447729598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '570325430573afc6971d608-46455702',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_css')) include '/Users/wlabee/Sites/dmol/slightphp/plugins/smarty3//plugins_slightphp/function.css.php';
if (!is_callable('smarty_function_js')) include '/Users/wlabee/Sites/dmol/slightphp/plugins/smarty3//plugins_slightphp/function.js.php';
?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>后台</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    
    <?php echo smarty_function_css(array('path'=>"admin",'file'=>"bootstrap,admin,rtl,themes,main"),$_smarty_tpl);?>

    <?php echo smarty_function_js(array('type'=>"plugin",'file'=>"jquery.min.js"),$_smarty_tpl);?>

    <?php echo smarty_function_js(array('path'=>"admin",'file'=>"global"),$_smarty_tpl);?>

    
    <style type="text/css">
    </style>

</head>
<body class="theme-default main-menu-animated">

<div id="main-wrapper">
    <?php $_template = new Smarty_Internal_Template("./common/navbar.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '570325430573afc6971d608-46455702';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2016-05-17 19:11:37
         compiled from "app/templates/admin/./common/navbar.tpl" */ ?>
<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
    <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span
                class="hide-menu-text">隐藏菜单</span></button>
    <div class="navbar-inner">
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand" style="font-size: 1em;">
                合作医院派单平台
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#main-navbar-collapse"><i
                        class="navbar-icon fa fa-bars"></i></button>
        </div>
        <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
            <div>
                <ul class="nav navbar-nav">
                </ul>
                <?php $_template = new Smarty_Internal_Template("common/message.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '1562363964573afc69758062-40083245';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2016-05-17 19:11:37
         compiled from "app/templates/admin/common/message.tpl" */ ?>
<div class="right clearfix">
    <ul class="nav navbar-nav pull-right right-navbar-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                <span>你好，<?php echo $_smarty_tpl->getVariable('global')->value['nickname'];?>
</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/admin/logout"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;注销</a></li>
            </ul>
        </li>
    </ul>
</div>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "app/templates/admin/common/message.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
            </div>
        </div>
    </div>
</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "app/templates/admin/./common/navbar.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <?php $_template = new Smarty_Internal_Template("./common/menu.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '570325430573afc6971d608-46455702';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.6, created on 2016-05-17 19:11:37
         compiled from "app/templates/admin/./common/menu.tpl" */ ?>
<div id="main-menu" role="navigation">
    <div id="main-menu-inner">
        <?php echo $_smarty_tpl->getVariable('menu')->value;?>

    </div>
</div><?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "app/templates/admin/./common/menu.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
    <div id="content-wrapper">
        
    fdsf

    </div>
    <div id="main-menu-bg"></div>
</div>

<?php echo smarty_function_js(array('path'=>"admin",'file'=>"bootstrap,admin"),$_smarty_tpl);?>


    <script>
        init.push(function () {
        });
    </script>

<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    });
    window.PixelAdmin.start(init);
</script>
</body>
</html>