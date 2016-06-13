<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description"  content=""/>
        <meta name="keywords" content=""/>
        {%if $second%}
            <meta http-equiv="refresh" content="{%$second%};URL={%$url%}"/>
        {%/if%}
        {%css path="admin" file="prompt"%}
</head>
<body class="prompt  {%if $code <0%}error{%else%}{%/if%}">
    <div class="box">
        <div class="box-title">{%$msg%}</div>
        {%if $url neq ''%}
            <div class="box-tip">
                {%if $second%}
                    系统会在{%$second%}秒内自动跳转，
                    <a href="{%$url%}">如果没有响应请点击此处</a>
                {%else%}
                    <a href="{%$url%}">转向到目标页面!</a>
                {%/if%}
            </div>
        {%/if%}
        {%if $url eq ''%}
            <div class="box-footer">
                <a href="javascript:history.go(-1);" class="btn btn-success">返回上一页</a>
            </div>
        {%/if%}
    </div>
</body>
</html>
