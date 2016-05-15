{%extends file="layout.tpl"%}
{%block name="meta" append%}
    {%if $second%}
        <meta http-equiv="refresh" content="{%$second%};URL={%$url%}"/>
    {%/if%}
{%/block%}
{%block top_style%}
    {%css path="admin" file="prompt"%}
{%/block%}
{%block body_class%}prompt {%if $code <0%}error{%else%}{%/if%}{%/block%}
{%block body%}
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
{%/block%}