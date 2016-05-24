{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">标签列表</span>
        </div>
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="scname">标签名：</label>
                    <input type="text" class="form-control" id="scname" name="scname" value="{%$smarty.get.scname%}" placeholder="标签名/ID">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="scname">状态：</label>
                    <select class="form-control" name="scstatus">
                        <option value="0">正常</option>
                        <option value="1" {%if $smarty.get.scstatus eq 1%}selected="selected"{%/if%}>禁用</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="mark/add" class="btn btn-success dialog">添加标签</a>
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>标签ID</th>
                        <th>标签名</th>
                        <th>标签类型</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=item%}
                    <tr>
                        <td>{%$item.mk_id%}</td>
                        <td>{%$item.mk_name%}</td>
                        <td>{%$mktypes[$item.mk_type]%}({%$item.mk_type%})</td>
                        <td>
                            <a href="mark/edit?mkid={%$item.mk_id%}" class="dialog">编辑</a>
                            {%if $item.status eq 0%}
                            <a href="mark/lock?mkid={%$item.mk_id%}" class="dialog" data-ask="">禁用</a>
                            {%else%}
                            <a href="mark/unlock?mkid={%$item.mk_id%}" class="dialog" data-ask="">启用</a>
                            {%/if%}
                            <a href="mark/delete?mkid={%$item.mk_id%}" class="dialog" data-ask="">删除</a>
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
