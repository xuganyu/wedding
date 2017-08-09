<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>添加商品</title>
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/pintuer.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/admin.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/js/umeditor/themes/default/css/umeditor.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/style.css");?>">
<script src="<?php echo base_url("zeros/admin/js/jquery.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/pintuer.js");?>"></script>
<script  charset="utf-8" src="<?php echo base_url("zeros/admin/js/umeditor/umeditor.config.js");?>"></script>
<script charset="utf-8" src="<?php echo base_url("zeros/admin/js/umeditor/umeditor.min.js");?>"></script>
<script  charset="utf-8"src="<?php echo base_url("zeros/admin/js/umeditor/lang/zh-cn/zh-cn.js");?>"></script>
</head>
<body>
  <div class="panel admin-panel">
      <div class="panel-head"><strong class="icon-reorder"> 添加活动</strong></div>
    	<div class="tab-box">
			<div class="tab">
				<div class="tab-panel" id="tab-b">
					<div class="common-info">
						<form class="form-x"  enctype="multipart/form-data" action="<?php echo site_url("admin/news/do_add");?>" method="post">
							<div class="form-group">
								<div class="label">
									<label>图片标题：</label>
								</div>
								<div class="field" style="width:500px">
									<input type="text" class="input" value="<?php echo $edit['article_title']; ?>" name="title"placeholder="请输入文章标题" />
								</div>
							</div>
							<div class="form-group">
								<div class="label">
									<label>平台扩展分类：</label>
								</div>
								<div class="field"style="width:500px">
									<select class="input" name="type_id">
									    <option <?php if(1==$edit['types_id']){?>selected="selected" value="1">所有活动 </option>
									    <option value="2">最新活动</option><?php }else{?>
										<option value="1">所有活动</option>
										<option value="2"selected="selected">最新活动</option><?php }?>
									</select>
								</div>
							</div>
							 <div class="form-group">
						        <div class="label">
						          <label>内容：</label>
						        </div>
						        <div class="field">
						          <div id="editor-year" style="width: 800px;" value="" name="content" class="editor"><?php echo $edit['article_content']; ?></div>
						        </div>
						   </div>
							<div class="form-group" style="padding-left:500px">
							 <button class="button bg-green" type="submit"value="Submit">确定</button>
	                         <button class="button bg-red" type="reset">重置</button>	
							</div>
						</form>
					</div>
			  </div>
			</div>
		</div>
	</div>
   <script type="text/javascript">
    var umMonth = UM.getEditor('editor-year');
    $('select').select();
   </script>
</body>
</html>



  