{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css path="front" file="jchd"%}
{%/block%}
{%block name="content"%}
    <div class="jumbotron">
        <h1>{%$info.title%}</h1>
        <br>
        <p>活动时间：{%if $info.start_time eq 0%}不限{%else%}{%$info.start_time|datetime%}{%/if%}
        ——
        {%if $info.end_time eq 0%}不限{%else%}{%$info.end_time|datetime%}{%/if%}</p>

        <hr>
        <div class="">
            {%$info.content%}
        </div>
    </div>

{%/block%}
{%block body_js%}
    <script type="text/javascript">
        $(function () {
        });
    </script>
{%/block%}
