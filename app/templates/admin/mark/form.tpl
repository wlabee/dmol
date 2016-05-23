<form action="{%$smarty.server.REQUEST_URI%}" class="panel form-horizontal">
    <input type="hidden" name="mkid" value="{%$mkinfo.mk_id%}"/>
    <div class="panel-body">
        <div class="row form-group">
            <label class="col-sm-4 control-label">标签名:</label>
            <div class="col-sm-8">
                <input type="text" name="mk_name" class="form-control" value=" {%$mkinfo.mk_name%}" disableds="disableds">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">标签类型:</label>
            <div class="col-sm-8">
                <select name="mk_type">
                    {%foreach from=$mktypes key=key item=item%}
                    <option value="{%$key%}" {%if $mkinfo.mk_type eq $key%}selected="selected"{%/if%}>{%$item%}</option>
                    {%/foreach%}
                </select>
            </div>
        </div>
    </div>
</form>
