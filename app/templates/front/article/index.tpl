{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css path="front" file="jchd"%}
    <style type="text/css">
        .tt-list {
            padding-left: 20px;
        }
        .tt-list li {
            line-height: 30px;
            list-style-type:disc;
        }
    </style>
{%/block%}
{%block name="center-content"%}
    <div class="row">
        <h1 style="font-size:27px;padding:10px 0;">{%$channel.$ch%}</h1>
        <div class="col-md-12">
            <ul class="tt-list">
                {%foreach from=$list item=item%}
                <li>
                <a href="/article/art-{%$item.id%}" target="_blank">{%$item.title%}</a></li>
                {%foreachelse%}
                    暂无数据...
                {%/foreach%}
            </ul>
        </div>
    </div>
{%/block%}
{%block body_js%}
    <script type="text/javascript">
        $(function () {
        });
    </script>
{%/block%}
