{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css path="front" file="jchd"%}
{%/block%}
{%block name="center-content"%}
    <div class="row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                {%foreach from=$pushs item=item key=key%}
                <li data-target="#carousel-example-generic" data-slide-to="{%$key%}" class="{%if $key eq 0%}active{%/if%}"></li>
                {%/foreach%}
                <li data-target="#carousel-example-generic" data-slide-to="999" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                {%foreach from=$pushs item=item key=key%}
                <div class="item {%if $key eq 0%}active{%/if%}">
                    <img data-src="holder.js/1140x500" alt="{%$item.title%}" src="{%$item.image|file%}" style="width:1140px;height:500px;">
                </div>
                {%/foreach%}
                <div class="item">
                    <img data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="Third slide [900x500]" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDkwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzkwMHg1MDAvYXV0by8jNTU1OiMzMzMvdGV4dDpUaGlyZCBzbGlkZQpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE1NWE1OGFhZDVkIHRleHQgeyBmaWxsOiMzMzM7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6NDVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTU1YTU4YWFkNWQiPjxyZWN0IHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjNTU1Ii8+PGc+PHRleHQgeD0iMjk4LjMyMDMxMjUiIHk9IjI3MC4xIj5UaGlyZCBzbGlkZTwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <ul class="nav nav-tabs">
            <li role="presentation" class="{%if empty($smarty.get.st)%}active{%/if%}"><a href="/jchd">全部</a></li>
            <li role="presentation" class="{%if $smarty.get.st eq 1%}active{%/if%}"><a href="/jchd?st=1">正在进行</a></li>
            <li role="presentation" class="{%if $smarty.get.st eq 2%}active{%/if%}"><a href="/jchd?st=2">即将开始</a></li>
            <li role="presentation" class="{%if $smarty.get.st eq 3%}active{%/if%}"><a href="/jchd?st=3">往期活动</a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-9">
            {%foreach from=$list item=item%}
            <div class="item-info">
                <div class="item-logo">
                    <a href="{%if $item.url%}{%$item.url%}{%else%}article/act-{%$item.act_id%}.html{%/if%}" target="_blank">
                    <img data-src="holder.js/100x100" src="{%$item.logo|file:'default'%}" alt="{%$item.title%}" />
                    </a>
                </div>
                <div class="item-title">
                    <a href="{%if $item.url%}{%$item.url%}{%else%}article/act-{%$item.act_id%}.html{%/if%}" target="_blank">{%$item.title%}</a>
                </div>
                <div class="item-sinfo">
                    <p>
                        活动时间：
                        {%if $item.start_time eq 0%}不限{%else%}{%$item.start_time|datetime%}{%/if%}
                        ——
                        {%if $item.end_time eq 0%}不限{%else%}{%$item.end_time|datetime%}{%/if%}
                    </p>
                </div>
                <div class="item-contnent">
                    {%$item.description%}
                </div>
                <div class="clearfix"></div>
            </div>
            {%foreachelse%}
                暂无数据...
            {%/foreach%}
        </div>
        <div class="col-md-3 act-hot">
            <div class="list-group">
                <a class="list-group-item active">热门活动</a>
                {%foreach from=$hots item=item key=key%}
                    <a class="list-group-item" href="{%if $item.url%}{%$item.url%}{%else%}article/act-{%$item.act_id%}.html{%/if%}">{%$item.title%}</a>
                {%/foreach%}
            </div>
        </div>
    </div>
{%/block%}
{%block body_js%}
    <script type="text/javascript">
        $(function () {
        });
    </script>
{%/block%}
