{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">DM({%$smarty.get.dmid%})推广码</span>
        </div>
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="pmcode">推广码：</label>
                    <input type="text" class="form-control" id="pmcode" name="pmcode" value="{%$smarty.get.pmcode%}" placeholder="推广码">
                </div>
                <!-- <div class="form-group">
                    <label class="sr-only" for="scname">状态：</label>
                    <select class="form-control" name="scstatus">
                        <option value="0">正常</option>
                        <option value="1" {%if $smarty.get.scstatus eq 1%}selected="selected"{%/if%}>禁用</option>
                    </select>
                </div> -->
                <input type="hidden" name="dmid" id="dmid" value="{%$smarty.get.dmid%}">
                <button type="submit" class="btn btn-primary">Search</button>
                <!-- <a href="dma/add" class="btn btn-success">添加渠道</a> -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
            	  添加内容
            	</button>
            </form>
        </div>
    </div>
    <div class="alert alert-success" role="alert">默认推广地址：{%constant::PM_URL%}/dm/{%$smarty.get.dmid%}</div>
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>推广链接</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=item%}
                    <tr>
                        <td>{%$item.id%}</td>
                        <td>{%constant::PM_URL%}/dm/{%$item.dm_id%}?pmcode={%$item.pmcode%}</td>
                        <td>
                            <a href="dma/pmcode?dmid={%$item.id%}" class="dialog">渠道统计</a>
                            <a href="dma/delete?dmid={%$item.id%}" class="dialog" data-ask="">删除</a>
                        </td>
                    </tr>
                    {%foreachelse%}
                    <tr>
                        <td colspan="3">暂无数据...</td>
                    </tr>
                    {%/foreach%}
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">添加渠道</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label class="sr-only" for="pm-num">渠道数量：</label>
                  <input type="text" class="form-control" id="pm-num" name="pm_num" value="1" placeholder="渠道数量">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add-pmcode">Add</button>
          </div>
        </div>
      </div>
    </div>
{%/block%}
{%block bottom_js%}
    <script>
        init.push(function () {
            $(function(){
                $(".add-pmcode").click(function(){
                    $.ajax({
                        url: '/pmcode/add',
                        type: 'POST',
                        dataType: 'json',
                        data: {pm_num: $('#pm-num').val(), dmid: $("#dmid").val()},
                    })
                    .done(function(ret) {
                        if (ret.code != 0) {
                            alert(ret.msg);
                        } else {}
                    })
                    .fail(function() {
                        console.log("error");
                    });
                });
            });
        });
    </script>
{%/block%}
