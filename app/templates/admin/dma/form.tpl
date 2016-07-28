{%extends file="layout.tpl"%}
{%block top_style%}
<style media="screen">
	.deleteNew {float:left;}
</style>
{%/block%}
{%block content%}
<form action="" method="post" class="panel form-horizontal form-bordered" enctype="multipart/form-data">
	<div class="panel-heading">
		<span class="panel-title">添加DM</span>
	</div>
	<div class="panel-body no-padding-hr value-area">
		<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
			<div class="row">
				<label class="col-sm-2 control-label">标题:</label>
				<div class="col-sm-8">
					<input type="text" name="dm_title" class="form-control" value="{%$dma.dm_title%}">
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body no-padding-hr value-area">
		<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
			<div class="row">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-8">
					<input type="checkbox" name="hashead" value="1" class="" {%if $dma.hashead eq 1%}checked="checked"{%/if%}>网站头尾
				</div>
			</div>
		</div>
	</div>
	<div class="panel-body no-padding-hr value-area">
		<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
			<div class="row">
				<label class="col-sm-2 control-label">内容:</label>
				<div class="col-sm-8">
					<script id="container" name="dm_content" type="text/plain">{%$dma.dm_content%}</script>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer text-right">
		<input type="hidden" name="dmid" value="{%$dma.dm_id%}">
		<button class="btn btn-primary">Submit</button>
	</div>
</form>
{%/block%}
{%block bottom_js%}
	{%js type="plugin" file="ueditor/ueditor.config.js,ueditor/ueditor.all.js"%}
    <script>
        init.push(function () {
			var ume = new UE.getEditor('container', {
				allowDivTransToP: false,
				initialFrameHeight: 300,
				zIndex: 9
			});
        });
    </script>
{%/block%}
