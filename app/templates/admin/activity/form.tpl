<form action="{%$smarty.server.REQUEST_URI%}" class="panel form-horizontal">
    <input type="hidden" name="act_id" value="{%$act.act_id%}"/>
    <div class="panel-body">
        <div class="row form-group">
            <label class="col-sm-4 control-label">标题:</label>
            <div class="col-sm-8">
                <input type="text" name="title" class="form-control" value="{%$act.title%}">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">描述:</label>
            <div class="col-sm-8">
                <textarea name="description" rows="3" class="form-control" cols="80">{%$act.description%}</textarea>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">链接:</label>
            <div class="col-sm-8">
                <input type="text" name="url" class="form-control" value="{%$act.url%}">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">图片:</label>
            <div class="col-sm-8">
                <input type="file" name="image" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">推送:</label>
            <div class="col-sm-8">
                <label class="radio-inline">
                  <input type="radio" name="ispush" id="inlineRadio1" value="1"> 是
                </label>
                <label class="radio-inline">
                  <input type="radio" checked name="ispush" id="inlineRadio2" value="0"> 否
                </label>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">热门:</label>
            <div class="col-sm-8">
                <label class="radio-inline">
                  <input type="radio" name="ishot" id="inlineRadio3" value="1"> 是
                </label>
                <label class="radio-inline">
                  <input type="radio" checked name="ishot" id="inlineRadio4" value="0"> 否
                </label>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">排序:</label>
            <div class="col-sm-8">
                <input type="text" name="sort" class="form-control" value="{%if $act.sort%}{%$act.sort%}{%else%}99{%/if%}">
            </div>
        </div>
        <div class="row form-group" >
            <label class="col-sm-4 control-label">开始时间:</label>
            <div class="col-sm-8" style="z-index:1100;">
                <input type="text" name="start_time" class="form-control datepicker" value="{%$act.start_time%}">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">结束时间:</label>
            <div class="col-sm-8" style="z-index:1100;">
                <input type="text" name="end_time" class="form-control datepicker" value="{%$act.end_time%}">
            </div>
        </div>
    </div>
</form>
