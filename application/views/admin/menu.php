<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-home"></span>新闻图管理</h2>
  <ul>
    <li><a href="<?php echo site_url("admin/newsmap");?>" target="right"><span class="icon-caret-right"></span>新闻图列表</a></li>
    <li><a href="<?php echo site_url("admin/ad");?>" target="right"><span class="icon-caret-right"></span>广告图管理</a></li>
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>活动管理</h2>
  <ul>
    <li><a href="<?php echo site_url("admin/news");?>" target="right"><span class="icon-caret-right"></span>活动列表</a></li>
  </ul>
  <h2><span class="icon-pencil-square-o"></span>案例管理</h2>
  <ul>
    <li><a href="<?php echo site_url("admin/stories");?>" target="right"><span class="icon-caret-right"></span>成功故事</a></li>
  </ul>
</div>
<script type="text/javascript">
$(function(){
    $(".leftnav h2").click(function(){
        $(this).next().slideToggle(200);	
        $(this).toggleClass("on"); 
    });
    $(".leftnav ul li a").click(function(){
    	$("#a_leader_txt").attr('href', $(this).attr('href'));
        $("#a_leader_txt").text($(this).text());
        $(".leftnav ul li a").removeClass("on");
        $(this).addClass("on");
    });
});
$(".leftnav").children("ul:last-child").css("padding-bottom","100px");
</script>
<ul class="bread">
  <li><a href="<?php echo site_url("admin/index");?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="<?php echo site_url("admin/index");?>" id="a_leader_txt" target="right">概览</a></li>
  <!-- <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li> -->
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo site_url("admin/index");?>" name="right" width="100%" height="100%"></iframe>
</div>
