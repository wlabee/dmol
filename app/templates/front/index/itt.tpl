<form action="{%$smarty.server.REQUEST_URI%}" class="panel form-horizontal">
    <div class="panel-body">
        <div class="row form-group">
            <label class="col-sm-4 control-label">姓名:</label>
            <div class="col-sm-8">
                <input type="text" name="name" class="form-control" value="">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">联系电话:</label>
            <div class="col-sm-8">
                <input type="text" name="mobile" class="form-control" value="">
            </div>
        </div>
    </div>
    <input type="hidden" name="hkey" value="{%$hkey%}">
</form>
