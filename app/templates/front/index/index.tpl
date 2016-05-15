{%extends file="layout.tpl"%}
{%block name="head_style"%}
    {%css type="plugin" file="/datetimepicker/jquery.datetimepicker.css"%}
    <style>
        .search-form { margin: 20px 0; }
    </style>
{%/block%}
{%block name="content"%}
    <form action="/" class="form-inline search-form">
        <div class="form-group">
            <label for="startdate">Start Date</label>
            <input type="text" class="form-control datetimepicker" id="startdate" name="startdate" placeholder="Start Date"/>
        </div>
        <div class="form-group">
            <label for="enddate">End Date</label>
            <input type="text" class="form-control datetimepicker" id="enddate" name="enddate" placeholder="End Date"/>
        </div>
        <button class="btn btn-default">GO</button>

    </form>
    <div class="row-12">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>时间</th>
                <th>内容</th>
            </tr>
            </thead>
            <tbody>
                {%foreach from=$list key=key item=item%}
                    <tr>
                        <td>{%$item.create_time%}</td>
                        <td>{%$item.note_info%}</td>
                    </tr>
                {%/foreach%}
            </tbody>
        </table>
    </div>
{%/block%}
{%block body_js%}
    {%js type="plugin" file="/datetimepicker/jquery.datetimepicker.full.min.js"%}
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker').datetimepicker({
                yearOffset:0,
                lang:'ch',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
                minDate:'1970/01/02', // yesterday is minimum date
                maxDate:'2999/01/02' // and tommorow is maximum date calendar
            });
        });
    </script>
{%/block%}