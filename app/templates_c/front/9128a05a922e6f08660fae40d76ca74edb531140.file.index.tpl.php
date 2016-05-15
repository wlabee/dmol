<?php /* Smarty version Smarty-3.0.6, created on 2016-05-04 14:13:46
         compiled from "app\templates\front\index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:231755723206c193e83-32158833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9128a05a922e6f08660fae40d76ca74edb531140' => 
    array (
      0 => 'app\\templates\\front\\index/index.tpl',
      1 => 1461919844,
      2 => 'file',
    ),
    '14082c86d26965bf1ecb209fce24b7dfff76e991' => 
    array (
      0 => 'app\\templates\\front\\layout.tpl',
      1 => 1462342424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231755723206c193e83-32158833',
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
        <?php echo smarty_function_js(array('type'=>"plugin",'file'=>"jquery-2.2.3.min.js"),$_smarty_tpl);?>

        <?php echo smarty_function_bs(array('type'=>"js",'file'=>"bootstrap"),$_smarty_tpl);?>

        <?php echo smarty_function_bs(array('type'=>"css",'file'=>"bootstrap"),$_smarty_tpl);?>

        <?php echo smarty_function_css(array('path'=>"front",'file'=>"layout"),$_smarty_tpl);?>

        
    <?php echo smarty_function_css(array('type'=>"plugin",'file'=>"/datetimepicker/jquery.datetimepicker.css"),$_smarty_tpl);?>

    <style>
        .search-form { margin: 20px 0; }
    </style>

    
</head>
<body class="">

    <div class="container-fluid">
        <div class="header containe">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="pull-left">
                        <a href="/"><img src="assets/images/front/logo.png" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="/" class="">HOME</a></li>
                        <li><a href="/#portfolio" class="">PORTFOLIO</a></li>
                        <li><a href="/#contact" class="">CONTACT</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </nav>
        </div>
        <div class="clearfix"></div>
        <div class="container main-content">
            
    <form action="/" class="form-inline search-form">
        <div class="form-group">
            <label for="startdate">Start Date</label>
            <input type="text" class="form-control datetimepicker" id="startdate" name="startdate" placeholder="Start Date"/>
        </div>
        <div class="form-group">
            <label for="enddate">End Date</label>
            <input type="text" class="form-control datetimepicker" id="enddate" name="enddate" placeholder="End Date"/>
        </div>
        <button class="btn btn-default">GO</button>

    </form>
    <div class="row-12">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>时间</th>
                <th>内容</th>
            </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('list')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['create_time'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['note_info'];?>
</td>
                    </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>

        </div>
        <div class="footer container-fluid">
            <div class="contact container">
            &copy;luoqongbo 2016
            </div>
        </div>
    </div>


    <?php echo smarty_function_js(array('type'=>"plugin",'file'=>"/datetimepicker/jquery.datetimepicker.full.min.js"),$_smarty_tpl);?>

    <script type="text/javascript">
        $(function () {
            $('.datetimepicker').datetimepicker({
                yearOffset:0,
                lang:'ch',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
                minDate:'1970/01/02', // yesterday is minimum date
                maxDate:'2999/01/02' // and tommorow is maximum date calendar
            });
        });
    </script>

</body>
</html>