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
				<label class="col-sm-1 control-label">标题:</label>
				<div class="col-sm-6">
					<input type="text" name="dm_title" class="form-control">
				</div>
				<div class="col-sm-1"></div>
			</div>
		</div>
	</div>
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  添加内容
	</button>
	<div class="panel-footer text-right">
		<button class="btn btn-primary">Submit</button>
	</div>
</form>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">选择添加内容</h4>
      </div>
      <div class="modal-body">
		  {%foreach from=$marks key=key item=item%}
  			<span class="btn btn-success addmk" data-mktype="{%$item.mk_type%}" data-mkid="{%$item.mk_id%}" data-mkname="{%$item.mk_name%}">{%$item.mk_name%}</span>
		  {%/foreach%}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="hide md-div">
	<div class="form-group no-margin-hr no-margin-b panel-padding-h">
		<div class="row">
			<label class="col-sm-1 control-label"></label>
			<div class="col-sm-6 v-area">
			</div>
			<div class="col-sm-1">
				<button type="button" class="close deleteNew">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
</div>
{%/block%}
{%block bottom_js%}
    <script>
        init.push(function () {
			var htmlMd = $(".md-div").html();
			var here = 1;
			$(".addmk").click(function(){
				html = '<div class="new'+here+'">'+htmlMd+'</div>';
				$(".value-area").append(html);
				var newdiv = 'new'+here;
				$("."+newdiv+" label").html($(this).data('mkname'));
				var mktype = $(this).data('mktype');
				var mkid = $(this).data('mkid');
				var vStr = '';
				switch (mktype) {
					case 'number':
					case 'text':
					case 'email':
					case 'mobile':
					case 'url':
					case 'qq':
						vStr = '<input type="text" class="form-control" name="dmvalue['+mkid+'][]">';
						break;
					case 'textarea':
						vStr = '<textarea class="form-control" name="dmvalue['+mkid+'][]"></textarea>';
						break;
					case 'file':
					case 'image':
						vStr = '<input type="file" class="form-control" name="dmvalue['+mkid+'][]">';
						break;
					case 'editor':
						break;
					default:

				}
				$("."+newdiv+" .v-area").html(vStr);
				$("."+newdiv+" .deleteNew").bind('click', function(){
					$("."+newdiv).remove();
				});
				here++;
				$("#myModal .close").click();
			});
			// $(".deleteNew").click(function(){
			// 	var newdiv = $(this).data('ctlId');
			// 	$("."+newdiv).remove();
			// });
        });
    </script>
{%/block%}
