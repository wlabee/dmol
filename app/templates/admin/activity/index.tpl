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
                    <label class="sr-only" for="scname">状态：</label>
                    <select class="form-control" name="scstatus">
                        <option value="0">全部</option>
                        <option value="1" {%if $smarty.get.scstatus eq 2%}selected="selected"{%/if%}>正常</option>
                        <option value="2" {%if $smarty.get.scstatus eq 2%}selected="selected"{%/if%}>禁用</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="ispush">
                        <option value="0">是否推荐</option>
                        <option value="1" {%if $smarty.get.ispush eq 1%}selected="selected"{%/if%}>是</option>
                        <option value="-1" {%if $smarty.get.ispush eq -1%}selected="selected"{%/if%}>否</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="ishot">
                        <option value="0">是否热门</option>
                        <option value="1" {%if $smarty.get.ishot eq 1%}selected="selected"{%/if%}>是</option>
                        <option value="-1" {%if $smarty.get.ishot eq -1%}selected="selected"{%/if%}>否</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="activity/add" data-xtitle="添加活动" class="btn btn-success dialog">添加活动</a>
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>排序</th>
                        <th>活动ID</th>
                        <th>标题</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=item%}
                    <tr>
                        <td><input type="text" name="sortnum[{%$item.act_id%}][]" value="{%$item.sort%}" style="width:40px;"></td>
                        <td>{%$item.act_id%}</td>
                        <td>{%$item.title%}</td>
                        <td>{%$item.create_time%}</td>
                        <td>
                            <a href="activity/edit?id={%$item.act_id%}" class="dialog">编辑</a>
                            <a href="activity/delete?id={%$item.act_id%}" class="dialog" data-ask="">删除</a>
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
