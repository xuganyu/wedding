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
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder">广告图列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    
   
    <table class="table table-hover text-center">
      <tr>
        <th width="10%" >ID</th>
        <th width="20%">名称</th>
        <th width="10%">时间</th>
        <th width="10%">图片大小</th>
        <th width="30%">操作</th>
      </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($list as $item){ ?>
               <tr id="block_<?php echo $item['ad_id'];?>">
                    <td><?php echo $i++; ?></td>
                    <td><a href="<?php echo site_url("admin/ad/edit/".$item['ad_id']);?>"><?php echo $item["ad_title"]; ?></a></td>
                    <td ><?php echo get_show_time($item['ad_stime']); ?></td>
                    <td ><?php echo $item['ad_abc']?></td>
                   <td><div class="button-group"> 
                   <a class="button border-main" href="<?php echo site_url("admin/ad/edit/".$item['ad_id']);?>"><span class="icon-edit"></span> 修改</a>
                   </div></td>
                   </tr>
              <?php } ?>
         </tbody>  
         
       
    </table>
  </div>
</form>
<script type="text/javascript">

<!-- AJAX 方法，直接修改排序 --->
function paixu(abc,id){
	$.ajax({
		type: "POST",
		url: "<?php echo site_url("admin/ad/or_abc");?>",
		data: { abc_id: id, or_abc: abc},
	})
}





</script>
</body>
</html>