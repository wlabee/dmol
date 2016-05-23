<form action="{%$smarty.server.REQUEST_URI%}" class="panel form-horizontal">
    <input type="hidden" name="mkid" value="{%$mkinfo.mk_id%}"/>
    <div class="panel-body">
        <div class="row form-group">
            <label class="col-sm-4 control-label">用户:</label>
            <div class="col-sm-8">
                <input type="text" name="uu" class="form-control" value=" {%$user.user_name%}" disabled="disabled">
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">产品:</label>
            <div class="col-sm-8">
                <select name="type">
                    <option value="1" {%if $order.type eq 1%}selected="selected"{%/if%}>整车</option>
                    <option value="2" {%if $order.type eq 2%}selected="selected"{%/if%}>配件</option>
                </select>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-4 control-label">车型:</label>
            <div class="col-sm-8">
                <input type="text" name="car_type" class="form-control" value="{%$order.car_type%}">
            </div>
        </div>
    </div>
</form>
