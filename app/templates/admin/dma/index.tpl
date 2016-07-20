{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">DM列表</span>
        </div>
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="scname">DM标题：</label>
                    <input type="text" class="form-control" id="scname" name="scname" value="{%$smarty.get.scname%}" placeholder="标签名/ID">
                </div>
                <!-- <div class="form-group">
                    <label class="sr-only" for="scname">状态：</label>
                    <select class="form-control" name="scstatus">
                        <option value="0">正常</option>
                        <option value="1" {%if $smarty.get.scstatus eq 1%}selected="selected"{%/if%}>禁用</option>
                    </select>
                </div> -->
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="/dma/add" class="btn btn-success">发布DM</a>
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DM标题</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=item%}
                    <tr>
                        <td>{%$item.dm_id%}</td>
                        <td>{%$item.dm_title%}</td>
                        <td>{%$item.create_date%}</td>
                        <td>
                            <a href="/dma/add?dmid={%$item.dm_id%}">编辑</a>
                            <a href="/pmcode?dmid={%$item.dm_id%}">渠道管理</a>
                            <a href="stat/dm?dmid={%$item.dm_id%}">统计管理</a>
                            <a href="/dma/delete?dmid={%$item.dm_id%}" class="dialog" data-ask="">删除</a>
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
