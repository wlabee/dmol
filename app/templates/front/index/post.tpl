{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css path="front" file="index"%}
{%/block%}
{%block name="content"%}
    <div class="row">
        <a href="/">列表</a>
        <form action="" method="post">
            <input type="hidden" name="post" value="1"/>
            <textarea name="info" id="" cols="80" rows="10"></textarea>
            <input type="submit" value="提交"/>
        </form>
    </div>
{%/block%}
{%block body_js%}
    {%js path="front" file="index,share"%}
    {%js type="plugin" file="/nivoSlider/jquery.nivo.slider.js"%}
    {%css type="plugin" file="/nivoSlider/nivo-slider.css"%}
{%/block%}