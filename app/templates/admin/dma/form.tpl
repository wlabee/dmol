{%extends file="layout.tpl"%}
{%block top_style%}
{%/block%}
{%block content%}
<form action="" class="panel form-horizontal form-bordered">
	<div class="panel-heading">
		<span class="panel-title">添加DM</span>
	</div>
	<div class="panel-body no-padding-hr">
		<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
			<div class="row">
				<label class="col-sm-4 control-label">标题:</label>
				<div class="col-sm-8">
					<input type="text" name="dm_title" class="form-control">
				</div>
			</div>
		</div>
		<div class="form-group no-margin-hr no-margin-b panel-padding-h">
			<div class="row">
				<label class="col-sm-4 control-label">Email:</label>
				<div class="col-sm-8">
					<input type="email" name="email" class="form-control">
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer text-right">
		<button class="btn btn-primary">Submit</button>
	</div>
</form>
<div class="row">
    <span class="btn">aaaa</span>
    <span>aaaa</span>
    <span>aaaa</span>
    <span>aaaa</span>
    <span>aaaa</span>
    <span>aaaa</span>
    <span>aaaa</span>
    <span>aaaa</span>
</div>
{%/block%}
{%block bottom_js%}
    <script>
        init.push(function () {
        });
    </script>
{%/block%}
