<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/pintuer.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/admin.css");?>">
<link rel="stylesheet" href="<?php echo base_url("zeros/admin/css/style.css");?>">
<script src="<?php echo base_url("zeros/admin/js/jquery.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/pintuer.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/jeDate/jedate.js");?>"></script>
<script src="<?php echo base_url("zeros/admin/js/layer/layer.js");?>"></script>
</head>
<body>
	<form method="post" action="" id="listform" class="form-x">
		<div class="panel admin-panel">
			<div class="panel-head">
				<strong class="icon-reorder"> 会员信息</strong> <a href=""
					style="float: right; display: none;">添加字段</a>
			</div>
			<div class="padding">
				<table class="table text-center table-bordered">
					<tr>
						<td>昵称</td>
						<td><?php echo $user["nickname"]; ?></td>
						<td>用户名</td>
						<td><?php echo $user["username"];?></td>
						<td colspan="1" rowspan="5"><img src="<?php echo base_url('uploads/user/'.$user['photo']); ?>" width="200px" height="284px"/></td>
					</tr>
					<tr>
						<td>性别</td>
						<td><?php if($user['sex'] == 1){echo '男';}else {echo '女';} ?></td>
						<td>生日</td>
						<td><?php echo $user["birthday"]; ?></td>
					</tr>
					<tr>
						<td>婚姻状态</td>
						<td><?php echo $user["marriage"]; ?></td>
						<td>所在地区</td>
						<td><?php echo $user["province"].$user['city'].$user['country']; ?></td>
					</tr>
					<tr>
						<td>身高</td>
						<td><?php echo $user["height"]; ?>cm</td>
						<td>学历</td>
						<td></td>
					</tr>
					<tr>
						<td>月收入</td>
						<td></td>
						<td>注册时间</td>
						<td><?php echo $user["regtime"]; ?></td>
					</tr>
					<tr>
					   <td>自我介绍</td>
					   <td colspan="5"><?php echo $user["intro"]; ?></td>
					</tr>
				</table>
			</div>

		</div>
	</form>
</body>
</html>



