{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css path="front" file="jchd"%}
{%/block%}
{%block name="content"%}
    <div class="row">
        <div class="" style="width:100%;background-color:#eee;height:300px;align:center;">
            幻灯片预留
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
                    <a href="#">
                    <img src="{%$item.logo|file%}" alt="{%$item.title%}" />
                    </a>
                </div>
                <div class="item-title">
                    <a href="#">{%$item.title%}</a>
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
            <div class="hot-title">
                <span>热门活动</span>
            </div>
            <div class="hot-list">
                <ul>
                    <li>热门活动</li>
                    <li>热门活动</li>
                    <li>热门活动</li>
                    <li>热门活动</li>
                    <li>热门活动</li>
                </ul>
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
