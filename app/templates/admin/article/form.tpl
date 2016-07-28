{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
<form action="" class="panel form-horizontal" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="{%$article.id%}"/>
    <div class="panel-body">
        <div class="row form-group">
            <label class="col-sm-2 control-label">标题:</label>
            <div class="col-sm-8">
                <input type="text" name="title" class="form-control" value="{%$article.title%}">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label" for="ch_id">类型：</label>
            <div class="col-sm-8">
            <select class="form-control" name="ch_id">
                {%foreach from=$channel key=key item=item%}
                <option value="{%$key%}" {%if $article.ch_id eq $key%}selected="selected"{%/if%}>{%$item%}</option>
                {%/foreach%}
            </select>
        </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 control-label">内容:</label>
            <div class="col-sm-8">
                <script id="container" name="content" type="text/plain">{%$article.content%}</script>
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
