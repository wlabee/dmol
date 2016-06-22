{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css type="plugin" file="/datetimepicker/jquery.datetimepicker.css"%}
{%/block%}
{%block name="content"%}
    <!-- <img src="/assets/images/front/banner.jpg" alt="" /> -->
    <div class="" style="height:500px;">
        <a href="/main/itt?hkey=h1" class="dialog">报名</a>
    </div>
{%/block%}
{%block body_js%}
    {%js type="plugin" file="/datetimepicker/jquery.datetimepicker.full.min.js"%}
    <script type="text/javascript">
        $(function () {
        });
    </script>
{%/block%}
