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
    <div class="panel-head"><strong class="icon-reorder">新闻图列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    
    <div class="padding border-bottom">
    
      <ul class="search" style="padding-left:60%;">
       
        <li>
        <form action="<?php echo site_url("admin/news/index");?>" class="form-horizontal" method="get">
           <a class="button border-main icon-plus-square-o" href="<?php echo site_url("admin/news/add/");?>"> 添加活动</a>
           <input type="text" placeholder="请输入名称"  class="input"name="keywords" style="width:150px; line-height:17px;display:inline-block" id="ri"/>
           <button type="submit" class="button border-main icon-search" > 查询</button>
         </form>
         </li> 
      </ul>
      
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="10%" >ID</th>
        <th width="20%">名称</th>
        <th width="10%">时间</th>
        <th width="10%">关闭</th>
        <th width="1%">排序</th>
        <th width="30%">操作</th>
      </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($list as $item){ ?>
               <tr id="block_<?php echo $item['article_id'];?>">
                    <td><?php echo $i++; ?></td>
                    <td><a href="<?php echo site_url("zkadmin/article/edit/".$item['article_id']);?>"><?php echo $item["article_title"]; ?></a></td>
                    <td ><?php echo get_show_time($item['article_stime']); ?></td>
                    <td ><label class="switch" style=" margin:0px 0 -8px;" ><input class="bg-danger" type="checkbox" id="inlineCheckbox_<?php echo $item["article_id"]; ?>" onClick="test('<?php echo $item["article_id"];?>')" name="close_show" value="<?php echo $item['article_close'];?>" <?php if($item["article_close"] == "1"){ ?> checked <?php } ?>><span></span></label></td>
                    <td >
                    <span style="display:none;"><?php echo $item["article_abc"]; ?></span>
                    <input type="text" name="or_abc" maxlength="4" autocomplete="off" class="form-control input-sm" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;"value="<?php echo $item["article_abc"]; ?>" onblur="paixu(this.value,<?php echo $item["article_id"];?>)">
                    </td>
                   <td><div class="button-group"> 
                   <a class="button border-main" href="<?php echo site_url("admin/news/edit/".$item['article_id']);?>"><span class="icon-edit"></span> 编辑</a>
                   <a class="button border-red"  href="<?php echo site_url("admin/news/del/".$item['article_id']);?>" ><span class="icon-trash-o"></span> 删除</a> </div></td>
                   </tr>
              <?php } ?>
         </tbody>  
         <tr>
          <td colspan="8">
              <div class="pagelist"> 
                 <?php if($page > 1){?>
                  <span   style=margin-left:25px>共有<?php echo $start; ?>记录，共<?php echo $page; ?>页</span>
                  <a href="<?php if($id_c!=1){$prev=$id_c-1;echo site_url("admin/news/index?keywords=".$keywords."&per_page=".$prev);}else{echo "javascript:;";} ?>" aria-label="Previous">上一页</a>
                  <?php echo $page_links; ?>
                  <a href="<?php if($id_c!=$page){$next=$id_c+1;echo site_url("admin/news/index?keywords=".$keywords."&per_page=".$next);}else{echo "javascript:;";} ?>" aria-label="Next">下一页</a>
                <?php } ?>
            </div>
          </td>     
         </tr>
       
    </table>
  </div>
</form>
<script type="text/javascript">

<!-- AJAX 方法，直接修改排序 --->
function paixu(abc,id){
	$.ajax({
		type: "POST",
		url: "<?php echo site_url("admin/newsmap/or_abc");?>",
		data: { abc_id: id, or_abc: abc},
	})
}
<!--开关按钮 - checked -->
function test(num){
	var val=0;
	if($('#inlineCheckbox_'+num).prop("checked")){ val=1;}
		$.post("<?php echo site_url("admin/newsmap/close");?>",{ids:num,val:val},function(data){
	})
}




</script>
</body>
</html>