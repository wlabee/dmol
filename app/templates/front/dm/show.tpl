<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{%$dm.dm_title%} - 牛刀会</title>
        <meta name="description"
              content="{%$dm_info.dm_title%}"/>
        <meta name="keywords" content="牛刀会"/>
        {%css path="front" file="bootstrap,layout"%}
        {%js type="plugin" file="jquery.min.js,holder.min.js"%}
        {%js path="front" file="global"%}
</head>
<body class="{%block body_class%}{%/block%}">
    <div class="container-fluid">
        {%if $dm.hashead%}
        {%include file="./common/header.tpl"%}
        {%/if%}
        <div class="clearfix"></div>
        <div class="container main-content" id="content-wrapper">
            {%$dm.dm_content%}
        </div>
        <div class="clearfix"></div>
        {%if $dm.hashead%}
        {%include file="./common/footer.tpl"%}
        {%/if%}
    </div>
{%js path="front" file="bootstrap,move-top"%}
<script type="text/javascript">
$(document).ready(function(){
   // $(".flexy-menu").flexymenu({speed: 400,type: "horizontal",align: "right"});
   $().UItoTop({ easingType: 'easeOutQuart' });

   var _hmt = _hmt || [];
   (function() {
     var hm = document.createElement("script");
     hm.src = "//hm.baidu.com/hm.js?7d15eaf79fdd9cd262296b56dc00a5ad";
     var s = document.getElementsByTagName("script")[0];
     s.parentNode.insertBefore(hm, s);
   })();
});
</script>
</body>
</html>
