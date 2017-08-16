<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>修改案例</title>
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/pintuer.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/admin.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/js/umeditor/themes/default/css/umeditor.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/style.css");?>">

<!--<link rel="stylesheet" href="css/ace.min.css">-->
</head>
<body>
  <div class="panel admin-panel">
      <div class="panel-head"><strong class="icon-reorder"> 修改成功故事</strong></div>
    	<div class="tab-box">
			<div class="tab"style="padding-left:200px">
				<div class="tab-panel" id="tab-b">
					<div class="common-info">
						<form class="form-x"  enctype="multipart/form-data" action="<?php echo site_url("admin/stories/do_edit");?>" method="post">
							<input type="hidden" name="formid" value="<?php echo $edit['id']; ?>" />
							<div class="form-group">
								<div class="label">
									<label>标题：</label>
								</div>
								<div class="field" style="width:500px">
									<input type="text" class="input" name="title" placeholder="" data-validate="required:必填" value="<?php echo $edit['title']; ?>" />
								</div>
							</div>
							<div class="form-group">
								<div class="label">
									<label>内容：</label>
								</div>
								<div class="field" style="width:500px">
									<textarea class="input" name="content" placeholder="" style="resize: none;height: 300px !important;" data-validate="required:必填" ><?php echo $edit['content']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="label">
									<label>图片：</label>
								</div>
								<div class="field field-tsa" style="width:500px">
								    <a class="button input-file" href="javascript:void(0);">+ 请选择图片        * 宽高比为7 : 2，标准大小为694 x 194像素 *
									<input type="file" class="input" name="image" accept="image/*" data-validate="regexp#.+.(jpg|jpeg|png|gif)$:只能上传jpg|gif|png格式文件" />
									</a>
								</div>
							</div>
							<div class="form-group" style="padding-left:300px">
							 <button class="button bg-green" type="submit"value="Submit">确定</button>
	                         <button class="button bg-red form-reset" type="reset">重置</button>	
							</div>
						</form>
					</div>
			  </div>
			</div>
		</div>
	</div>
  
<script src="<?php echo base_url("zeros/admin/js/jquery.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/pintuer.js"); ?>"></script>
<script src="<?php echo base_url("zeros/admin/js/umeditor/umeditor.config.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/umeditor/umeditor.min.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/umeditor/lang/zh-cn/zh-cn.js");?>"></script>

  
</script>
</body>
</html>



  