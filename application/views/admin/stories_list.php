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
    <div class="panel-head"><strong class="icon-reorder">成功故事列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    
    <div class="padding border-bottom">
        <a class="button border-main icon-plus-square-o" href="<?php echo site_url("admin/stories/add");?>" style="float: left;"> 添加故事</a>
        <ul class="search" style="padding-left: 70%;">
            <li>
                <form action="<?php echo site_url("admin/stories/index");?>" class="form-horizontal" method="get">
                    <input type="text" placeholder="请输入标题"  class="input" name="keywords" style="width:150px; line-height:17px;display:inline-block" value="<?php echo $keywords; ?>"/>
                    <button type="submit" class="button border-main icon-search" > 查询</button>
                </form>
            </li> 
        </ul>
      
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="10%" >ID</th>
        <th width="20%">标题</th>
        <th width="20%">内容</th>
        <th width="10%">时间</th>
        <th width="10%">点击量</th>
        <th width="30%">操作</th>
      </tr>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($list as $item){ ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><a href="<?php echo site_url("admin/stories/edit/".$item['id']);?>"><?php echo $item["title"]; ?></a></td>
                    <td>
                        <span title="<?php echo $item['content']; ?>">
                            <?php if(mb_strlen($item['content']) >= 30){echo mb_substr($item['content'], 0, 30).'...';}else{echo $item['content'];} ?>
                        </span>
                    </td>
                    <td><?php echo $item['time']; ?></td>
                    <td><?php echo $item['click']; ?></td>
                    <td>
                        <div class="button-group"> 
                            <a class="button border-main" href="<?php echo site_url("admin/stories/edit/".$item['id']);?>"><span class="icon-edit"></span> 编辑</a>
                            <a class="button border-red"  href="<?php echo site_url("admin/stories/del/".$item['id']);?>" ><span class="icon-trash-o"></span> 删除</a> 
                        </div>
                    </td>
                </tr>
            <?php } ?>
         </tbody>  
         <tr>
          <td colspan="8">
              <div class="pagelist"> 
                 <?php if($page > 1){?>
                  <span   style=margin-left:25px>共有<?php echo $start; ?>记录，共<?php echo $page; ?>页</span>
                  <a href="<?php if($id_c!=1){$prev=$id_c-1;echo site_url("admin/stories/index?keywords=".$keywords."&per_page=".$prev);}else{echo "javascript:;";} ?>" aria-label="Previous">上一页</a>
                  <?php echo $page_links; ?>
                  <a href="<?php if($id_c!=$page){$next=$id_c+1;echo site_url("admin/stories/index?keywords=".$keywords."&per_page=".$next);}else{echo "javascript:;";} ?>" aria-label="Next">下一页</a>
                <?php } ?>
            </div>
          </td>     
         </tr>
       
    </table>
  </div>
</body>
</html>