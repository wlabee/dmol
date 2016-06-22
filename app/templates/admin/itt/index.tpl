{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">意向列表</span>
        </div>
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="scname">姓名：</label>
                    <input type="text" class="form-control" id="scname" name="scname" value="{%$smarty.get.scname%}" placeholder="姓名">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="scmobile">手机号码：</label>
                    <input type="text" class="form-control" id="scmobile" name="scmobile" value="{%$smarty.get.scmobile%}" placeholder="手机号码">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="sckey">关键码：</label>
                    <input type="text" class="form-control" id="sckey" name="sckey" value="{%$smarty.get.sckey%}" placeholder="关键码">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="scname">状态：</label>
                    <select class="form-control" name="scstatus">
                        <option value="0">全部</option>
                        <option value="1" {%if $smarty.get.scstatus eq 1%}selected="selected"{%/if%}>已处理</option>
                        <option value="2" {%if $smarty.get.scstatus eq 2%}selected="selected"{%/if%}>已丢弃</option>
                        <option value="-1" {%if $smarty.get.scstatus eq -1%}selected="selected"{%/if%}>未处理</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>时间</th>
                        <th>其他参数</th>
                        <th>操作人</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=item%}
                    <tr>
                        <td>{%$item.id%}</td>
                        <td>{%$item.name%}</td>
                        <td>{%$item.create_time|date_format:"%Y-%m-%d %H:%M:%s"%}</td>
                        <td>
                            {%foreach from=$item.params key=pk item=param%}
                            <p>
                                {%$pk%}：{%$param%}
                            </p>
                            {%/foreach%}
                        </td>
                        <td>{%$item.operator_name%}</td>
                        <td>
                            {%if $item.status eq 0%}
                            <a href="intention/todone?id={%$item.id%}" class="dialog" data-ask="">处理</a>
                            <a href="intention/tothrew?id={%$item.id%}" class="dialog" data-ask="">丢弃</a>
                            {%/if%}
                        </td>
                    </tr>
                    {%foreachelse%}
                    <tr>
                        <td colspan="4">暂无数据...</td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
        </div>
    </div>
{%/block%}
{%block bottom_js%}
    <script>
        init.push(function () {
        });
    </script>
{%/block%}
