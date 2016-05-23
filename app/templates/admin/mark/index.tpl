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
                    <label class="sr-only" for="scname">标签名</label>
                    <input type="text" class="form-control" id="scname" name="scname" placeholder="标签名/ID">
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
                            <a href="#">编辑</a>
                            <a href="#">删除</a>
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
