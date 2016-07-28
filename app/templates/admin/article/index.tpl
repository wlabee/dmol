{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">活动列表</span>
        </div>
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="sctitle">标题/ID：</label>
                    <input type="text" class="form-control" id="sctitle" name="sctitle" value="{%$smarty.get.sctitle%}" placeholder="标题/ID">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="scname">类型</label>
                    <select class="form-control" name="chid">
                        <option value="0">全部</option>
                        {%foreach from=$channel key=key item=item%}
                        <option value="{%$key%}" {%if $smarty.get.chid eq $key%}selected="selected"{%/if%}>{%$item%}</option>
                        {%/foreach%}
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Search</button>
                <a href="article/add" data-xtitle="添加活动" class="btn btn-success">添加文章</a>
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <form class="" method="post">
                    <thead>
                        <tr>
                            <th>文章ID</th>
                            <th>类型</th>
                            <th>标题</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        {%foreach from=$list item=item%}
                        <tr>
                            <td>{%$item.id%}</td>
                            <td>{%$channel[$item.ch_id]%}</td>
                            <td>{%$item.title%}</td>
                            <td>
                                <a href="article/edit?id={%$item.id%}" class="">编辑</a>
                                <a href="article/delete?id={%$item.id%}" class="dialog" data-ask="">删除</a>
                            </td>
                        </tr>
                        {%foreachelse%}
                        <tr>
                            <td colspan="4">暂无数据...</td>
                        </tr>
                        {%/foreach%}
                    </tbody>
                </table>

            </form>
        </div>
    </div>
{%/block%}
{%block bottom_js%}
    <script>
        init.push(function () {
        });
    </script>
{%/block%}
