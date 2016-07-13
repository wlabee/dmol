{%extends file="layout.tpl"%}
{%block top_style%}
    <style type="text/css">
    </style>
{%/block%}
{%block content%}
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">PMCODE统计(pmcode={%$smarty.get.pmcode%})</span>
        </div>
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="start">时间：</label>
                    <input type="text" class="form-control datepicker" id="start" name="start" value="{%$smarty.get.start%}" placeholder="开始时间">
                    -
                    <input type="text" class="form-control datepicker" id="end" name="end" value="{%$smarty.get.end%}" placeholder="结束时间">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="scname">查看条数：</label>
                    <select class="form-control" name="limit">
                        <option value="20">20</option>
                        <option value="30" {%if $smarty.get.limit eq 30%}selected="selected"{%/if%}>30</option>
                        <option value="50" {%if $smarty.get.limit eq 50%}selected="selected"{%/if%}>50</option>
                        <option value="100" {%if $smarty.get.limit eq 100%}selected="selected"{%/if%}>100</option>
                    </select>
                </div>
                <input type="hidden" name="pmcode" id="pmcode" value="{%$smarty.get.pmcode%}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div id="hero-area" class="graph"></div>
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>日期</th>
                        <th>PV</th>
                        <th>UV</th>
                    </tr>
                </thead>
                <tbody>
                    {%foreach from=$list item=item%}
                    <tr>
                        <td>{%$item.create_date%}</td>
                        <td>{%if $item.pv gt 0%}{%$item.pv%}{%else%}0{%/if%}</td>
                        <td>
                            {%if $item.uv gt 0%}{%$item.uv%}{%else%}0{%/if%}
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
{%/block%}
{%block bottom_js%}
    <script>
        init.push(function () {
            {%if $list%}
            var data = [];
            {%foreach from=$list item=item key=key%}
                data[{%$key%}] = {
                    date: '{%$item.create_date%}',
                    PV: '{%$item.pv%}',
                    UV: '{%$item.uv%}',
                };
            {%/foreach%}
            Morris.Area({
				element: 'hero-area',
				data: data,
				xkey: 'date',
				ykeys: ['PV', 'UV'],
				labels: ['PV', 'UV'],
				hideHover: 'auto',
				lineColors: PixelAdmin.settings.consts.COLORS,
				fillOpacity: 0.3,
				behaveLikeLine: true,
				lineWidth: 2,
				pointSize: 4,
				gridLineColor: '#cfcfcf',
				resize: true
			});
            {%/if%}
        });
    </script>
{%/block%}
