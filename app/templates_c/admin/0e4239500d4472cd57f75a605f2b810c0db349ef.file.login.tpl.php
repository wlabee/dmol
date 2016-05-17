<?php /* Smarty version Smarty-3.0.6, created on 2016-05-17 23:24:44
         compiled from "app/templates/admin/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276557448573b37bcaf7396-09597838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e4239500d4472cd57f75a605f2b810c0db349ef' => 
    array (
      0 => 'app/templates/admin/login.tpl',
      1 => 1463498651,
      2 => 'file',
    ),
    'f58feb634e5576ecd133d0b7646f3b7c01cb4e6a' => 
    array (
      0 => 'app/templates/admin/layout.tpl',
      1 => 1463496756,
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
  'nocache_hash' => '276557448573b37bcaf7396-09597838',
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

    
    <?php echo smarty_function_css(array('path'=>"admin",'file'=>"login"),$_smarty_tpl);?>

    <?php echo smarty_function_js(array('path'=>"admin",'file'=>"login"),$_smarty_tpl);?>


</head>
<body class="login">

    <div class="box row">
        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 login-box">
            <form action="/login" method="post" class="login-form">
                <div class="form-group">
                    <label for="user_name">Username</label>
                    <input type="text" class="form-control" name="user_name" id="user_name" value="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="submit" value="Sign in">
                    <label class="text-danger"></label>
                </div>
            </form>
        </div>
    </div>

<?php echo smarty_function_js(array('path'=>"admin",'file'=>"bootstrap,admin"),$_smarty_tpl);?>



<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    });
    window.PixelAdmin.start(init);
</script>
</body>
</html>
