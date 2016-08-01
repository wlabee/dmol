{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css path="front" file="jchd"%}
    <style type="text/css">
        .art-list li {
            padding: 20px 15px;
            border-bottom: 1px solid #e4e4e4;
            font-size: 16px;
        }
    </style>
{%/block%}
{%block name="center-content"%}
    <div class="row">
        {%$bread_html%}
        <!-- <h1 style="font-size:27px;padding:10px 0;">{%$channel.$ch%}</h1> -->
        <ul class="art-list">
            {%foreach from=$list item=item%}
                <li>
                    <i class="fa fa-tag"></i>&nbsp;&nbsp;
                    <a href="/article/art-{%$item.id%}.html" class="thread-title">{%$item.title%}</a>
                </li>
            {%foreachelse%}
                <li>
                    暂无数据...
                </li>
            {%/foreach%}
        </div>
    </div>
{%/block%}
{%block body_js%}
    <script type="text/javascript">
        $(function () {
        });
    </script>
{%/block%}
