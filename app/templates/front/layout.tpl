<!DOCTYPE html>
<html>
<head>
    {%block name="head"%}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{%if $title%}{%$title%}{%else%}牛刀会{%/if%}</title>
        <meta name="description"
              content="{%$description%}"/>
        <meta name="keywords" content="{%$keywords%}"/>
        {%block name="meta"%}{%/block%}
        {%css path="front" file="bootstrap,layout"%}
        {%js type="plugin" file="jquery.min.js"%}
        {%js path="front" file="global"%}
        {%block head_style%}{%/block%}
    {%/block%}
</head>
<body class="{%block body_class%}{%/block%}">
{%block name="body"%}
    <div class="container-fluid">
        {%include file="./common/header.tpl"%}
        <!-- <nav class="navbar navbar-default bannerx">
            <div class="container">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">产业互联网+</a></li>
                        <li><a href="#">商业互联网+</a></li>
                        <li><a href="#">精彩活动</a></li>
                        <li><a href="#">成长社区</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于我们 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->

        <div class="clearfix"></div>
        <div class="container main-content" id="content-wrapper">
            {%block name="content"%}{%/block%}
        </div>
        <div class="clearfix"></div>
        {%include file="./common/footer.tpl"%}
    </div>
{%/block%}
{%js path="front" file="bootstrap,move-top"%}
<script type="text/javascript">
$(document).ready(function(){
   // $(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});
   $().UItoTop({ easingType: 'easeOutQuart' });
   $(".banner-nav li.dropdown").mouseover(function(){
       $(this).addClass("open");
   }).mouseout(function(){
       $(this).removeClass("open");
   });
});
</script>
{%block body_js%}{%/block%}
</body>
</html>
