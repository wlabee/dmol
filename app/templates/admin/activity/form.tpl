{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
<form action="" class="panel form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" name="act_id" value="{%$act.act_id%}"/>
    <div class="panel-body">
        <div class="row form-group">
            <label class="col-sm-2 control-label">标题:</label>
            <div class="col-sm-8">
                <input type="text" name="title" class="form-control" value="{%$act.title%}">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">描述:</label>
            <div class="col-sm-8">
                <textarea name="description" rows="3" class="form-control" cols="80">{%$act.description%}</textarea>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">logo:</label>
            <div class="col-sm-8">
                <input type="file" name="logo" value="" class="form-control">
            </div>
        </div>
        {%if $act.logo%}
        <div class="row form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-8">
                <img src="{%$act.logo|file%}" alt="" width="90"/>
            </div>
        </div>
        {%/if%}
        <div class="row form-group">
            <label class="col-sm-2 control-label">图片:</label>
            <div class="col-sm-8">
                <input type="file" name="image" value="" class="form-control">
            </div>
        </div>
        {%if $act.image%}
        <div class="row form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-8">
                <img src="{%$act.image|file%}" alt="" width="90"/>
            </div>
        </div>
        {%/if%}
        <div class="row form-group">
            <label class="col-sm-2 control-label">推送:</label>
            <div class="col-sm-8">
                <label class="radio-inline">
                  <input type="radio" name="ispush" id="inlineRadio1" value="1" {%if $act.is_push eq 1%}checked{%/if%}> 是
                </label>
                <label class="radio-inline">
                  <input type="radio" {%if ! $act.is_push%}checked{%/if%} name="ispush" id="inlineRadio2" value="0"> 否
                </label>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">热门:</label>
            <div class="col-sm-8">
                <label class="radio-inline">
                  <input type="radio" name="ishot" id="inlineRadio3" value="1" {%if $act.is_hot eq 1%}checked{%/if%}> 是
                </label>
                <label class="radio-inline">
                  <input type="radio" {%if ! $act.is_hot%}checked{%/if%} name="ishot" id="inlineRadio4" value="0"> 否
                </label>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">排序:</label>
            <div class="col-sm-8">
                <input type="text" name="sort" class="form-control" value="{%if $act.sort%}{%$act.sort%}{%else%}99{%/if%}">
            </div>
        </div>
        <div class="row form-group" >
            <label class="col-sm-2 control-label">开始时间:</label>
            <div class="col-sm-8">
                <input type="text" name="start_time" class="form-control datepicker" value="{%$act.start_time|datetime%}">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">结束时间:</label>
            <div class="col-sm-8">
                <input type="text" name="end_time" class="form-control datepicker" value="{%$act.end_time|datetime%}">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">链接:</label>
            <div class="col-sm-8">
                <input type="text" name="url" class="form-control" value="{%$act.url%}">
            </div>
            <div class="col-sm-2">
                <span style="color:#66ae9c;">链接和内容只用填一个（优先使用链接）</span>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">内容:</label>
            <div class="col-sm-8">
                <script id="container" name="content" type="text/plain">{%$act.content%}</script>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label"></label>
            <input type="submit" class="btn btn-default" name="submit" value="提交">
        </div>
    </div>
</form>
{%/block%}
{%block bottom_js%}
    {%js type="plugin" file="ueditor/ueditor.config.js,ueditor/ueditor.all.js"%}
    <script>
        init.push(function () {
            var ume = new UE.getEditor('container', {
                allowDivTransToP: false,
                initialFrameHeight: 300,
                zIndex: 9
            });
        });
    </script>
{%/block%}
