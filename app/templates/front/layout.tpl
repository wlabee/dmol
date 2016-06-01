<!DOCTYPE html>
<html>
<head>
    {%block name="head"%}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description"
              content=""/>
        <meta name="keywords" content=""/>
        {%block name="meta"%}{%/block%}
        {%js type="plugin" file="jquery.min.js"%}
        {%css path="front" file="layout"%}
        {%block head_style%}{%/block%}
    {%/block%}
</head>
<body class="{%block body_class%}{%/block%}">
{%block name="body"%}
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
            {%block name="content"%}{%/block%}
        </div>
        <div class="footer container-fluid">
            <div class="contact container">
            &copy;luoqongbo 2016
            </div>
        </div>
    </div>
{%/block%}
{%block body_js%}{%/block%}
</body>
</html>
