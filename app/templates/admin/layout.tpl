<!DOCTYPE html>
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
    {%block meta%}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    {%/block%}
    {%css path="admin" file="bootstrap,admin,rtl,themes,main"%}
    {%*{%css path="admin" file="global,main"%}*%}
    {%js type="plugin" file="jquery.min.js"%}
    {%js path="admin" file="global"%}
    {%block top_style%}
    {%/block%}
</head>
<body class="{%block body_class%}theme-default main-menu-animated{%/block%}">
{%block body%}
<div id="main-wrapper">
    {%include file="./common/navbar.tpl"%}
    {%include file="./common/menu.tpl"%}
    <div id="content-wrapper">
        {%block content%}
        {%/block%}
    </div>
    <div id="main-menu-bg"></div>
</div>
{%/block%}
{%js path="admin" file="bootstrap,admin"%}
{%block bottom_js%}
{%/block%}
<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    });
    window.PixelAdmin.start(init);
</script>
</body>
</html>