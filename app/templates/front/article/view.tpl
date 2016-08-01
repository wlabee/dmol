{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css path="front" file="jchd"%}
{%/block%}
{%block name="center-content"%}
    {%$bread_html%}
    <div class="jumbotron">
        <h1>{%$info.title%}</h1>
        <br>

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
