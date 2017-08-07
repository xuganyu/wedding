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

<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
<script type="text/javascript" src="jeDate/jedate.js"></script>
</head>
<body>
  <div class="panel admin-panel">
      <div class="panel-head"><strong class="icon-reorder"> 添加新商品</strong></div>
    	<div class="tab-box">
			<div class="tab"style="padding-left:200px">
				<div class="tab-panel" id="tab-b">
					<div class="common-info">
						<form class="form-x"  enctype="multipart/form-data" action="<?php echo site_url("admin/newsmap/do_add");?>" method="post">
							<div class="form-group">
								<div class="label">
									<label>图片标题：</label>
								</div>
								<div class="field" style="width:300px">
									<input type="text" class="input" name="title"placeholder="链接地址不用再写Http前缀了..." />
								</div>
							</div>
							<div class="form-group">
								<div class="label">
									<label>图片链接：</label>
								</div>
								<div class="field" style="width:300px">
									<input type="text" class="input" name="url"placeholder="链接地址不用再写Http前缀了..." />
								</div>
							</div>
							<div class="form-group">
								<div class="label">
									<label>广告图片：</label>
								</div>
								<div class="field field-tsa" style="width:300px">
									<input type="file" class="input" name="images"/>
								</div>
							</div>
							<div class="form-group" style="padding-left:200px">
							 <button class="button bg-green" type="submit"value="Submit">确定</button>
	                         <button class="button bg-red" type="reset">重置</button>	
							</div>
						</form>
					</div>
			  </div>
			</div>
		</div>
	</div>
  
<script src="<?php echo base_url("zeros/admin/js/jquery.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/umeditor/umeditor.config.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/umeditor/umeditor.min.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/umeditor/lang/zh-cn/zh-cn.js");?>"></script>

  
</script>
</body>
</html>



  