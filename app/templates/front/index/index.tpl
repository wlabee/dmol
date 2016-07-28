{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css type="plugin" file="/datetimepicker/jquery.datetimepicker.css"%}
{%/block%}
{%block name="content"%}
    <!-- <img src="/assets/images/front/banner.jpg" alt="" /> -->
    <div class=""  style='position:absolut; left:0px; top:0px'>

    <a href="/main/itt?hkey=h1" class="dialog" data-xtitle="提交报名信息"><img alt="" src="assets/images/front/x1.jpg"></a>
    <a href="/main/itt?hkey=h1" class="dialog" data-xtitle="提交报名信息"><img alt="" src="assets/images/front/x2.jpg"></a>
    <a href="/main/itt?hkey=h1" class="dialog" data-xtitle="提交报名信息"><img alt="" src="assets/images/front/x3.jpg"></a>
</div>
{%/block%}
{%block body_js%}
    {%js type="plugin" file="/datetimepicker/jquery.datetimepicker.full.min.js"%}
    <script type="text/javascript">
        $(function () {
        });
    </script>
{%/block%}
