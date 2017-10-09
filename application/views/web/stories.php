<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成功故事</title>
<link rel="shortcut icon" href="<?php echo base_url('zeros/admin/images/icon.png'); ?>" type="image/x-icon" />
<link href="<?php echo base_url('zeros/web/css/css.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('zeros/web/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('zeros/web/js/jquery.min.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.boxgrid.captionfull').hover(function(){
			$(".cover", this).stop().animate({top:'180px'},{queue:false,duration:180});
		}, function() {
			$(".cover", this).stop().animate({top:'284px'},{queue:false,duration:180});
		});
	});
</script>
<script type="text/javascript">
$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	
	//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);
	$("#focus .btnBg").css("opacity",0.2);

	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$("#focus .btn span").css("opacity",0.9).mouseenter(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0.9).trigger("mouseenter");

	//上一页、下一页按钮透明度处理
	$("#focus .preNext").css("opacity",0.2).hover(function() {
		$(this).stop(true,false).animate({"opacity":"1"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0.4"},300);
	});

	//上一页按钮
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//下一页按钮
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$("#focus ul").css("width",sWidth * (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},3000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.2"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
	}
});

</script>
<!--[if lte IE 6]>
<style type="text/css">
body { behavior:url("csshover.htc"); }
</style>
<![endif]-->
</head>

<body>
<div class="top" style="text-align: center;">
    <div style="width: 985px;height: 134px;margin: 0 auto;text-align: right;">
        <?php $login = get_user_info();?>
        <?php if(empty($login)){?>
        <div class="top-link">
            <a href="<?php echo site_url('web/signup')?>">注册</a>
            <a href="<?php echo site_url('web/login')?>">登录</a>
        </div>
        <?php }else{?>
        <div class="pf-user">
            <div class="pf-user-photo">
                <img src="<?php echo base_url('uploads/user/'.$login['user_photo']); ?>" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
            </div>
            <h4 class="pf-user-name ellipsis"><?php echo $login['user_nickname']; ?></h4>
            <i class="fa fa-angle-double-down xiala"></i>

            <div class="pf-user-panel">
                <ul class="pf-user-opt">
                    <li>
                        <a href="<?php echo site_url('web/login/self_info');?>">
                            <i class="fa fa-user-o"></i>
                            <span class="pf-opt-name">用户信息</span>
                        </a>
                    </li>
                    <li class="pf-modify-pwd">
                    	<a href="<?php echo site_url('web/login/pwd');?>">
                            <i class="fa fa-lock"></i>
                            <span class="pf-opt-name">修改密码</span>
                        </a>
                    </li>
                    <li class="pf-logout">
                        <a href="<?php echo site_url('web/login/logout');?>">
                            <i class="fa fa-power-off"></i>
                            <span class="pf-opt-name">退出</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<div class="nav" style="text-align: center;">
    <div style="width: 80%;text-align: center;margin: 0 auto;">
      <UL style="display: table;width: auto;">
        <LI><a href="<?php echo site_url('web/index'); ?>">首页<I>HOME</I></a></LI>
        <LI><a href="<?php echo site_url('web/search'); ?>">搜索<I>SEARCH SHOW</I></a></LI>
        <LI><a href="<?php echo site_url('web/stories'); ?>">成功故事<I>SUCCSEE STORIES</I></a></LI>
        <LI><a href="<?php echo site_url('web/showcase'); ?>">活动推荐<I>LOVE SHOWCASE</I></a></LI>
        <!-- <LI><a href="<?php echo site_url('web/video'); ?>">视频展示<I>VIDEO SHOW</I></a></LI>
        <LI><a href="<?php echo site_url('web/signup'); ?>">会员注册<I>SIGN UP</I></a></LI> -->
        <LI><a href="<?php echo site_url('web/company'); ?>">公司简介<I>COMPANY PROFILE</I></a></LI>
      </UL>
    </div>
</div>
<!-- <div class="banner">
  <div id="focus">
    <ul>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
    </ul>
  </div>
</div> -->
<!-- 联系电话、QQ -->
<!-- <div class="tel">
  <div class="tel_01"></div>
  <div class="tel_02"></div>
  <div class="tel_03"></div>
</div> -->
<div style="height: 50px;width: 100%;"></div>
<!-- 子页修改 图片展示 列表 -->
<div class="zy" style="text-align: center;">
  <div class="zy_bt">
    <div class="bt_01"></div>
    <div class="bt_02">成功故事</div>
    <div class="bt_03"></div>
    <div class="bt_04"></div>
    <div class="bt_05"><A href="<?php echo site_url('web/stories/index').'?order=click'; ?>">按点击量排序</A>·<A href="<?php echo site_url('web/stories/index').'?order=time'; ?>">时间排序</A><!-- ·<A href="#">最新活动</A> --></div>
  </div>
  <!-- <div class="zy_left">
    <div class="left_list">
      <ul>
        <li><A href="#">最新活动</A></li>
        <li><A href="#">热门活动</A></li>
        <li><A href="#">所有活动</A></li>
      </ul>
    </div> -->
    <!-- <div class="left_tj">
      <div class="tj_bt"><img src="<?php echo base_url('zeros/web/images/sub01_03_19.jpg'); ?>" /></div>
      <div class="tj_nei">
        <UL>
          <LI><a href="#">赵薇—致青春上映在即 选定八月为...</a></LI>
          <LI><a href="#">八月照相馆副总经理张毅：我需要...</a></LI>
          <LI><a href="#">搜狐报道：八月照相馆引领最新摄...</a></LI>
          <LI><a href="#">珂兰钻石-北京CBD旗舰店介绍</a></LI>
          <LI><a href="#">八月照相馆携手步步为赢打造网络...</a></LI>
          <LI><a href="#">55BBS《风云对话》八月照相馆总...</a></LI>
        </UL>
      </div>
    </div>
  </div> -->
  <div style="width: 785px;margin: 40px auto;text-align: center;">
    <div class="txbj_nei" style="margin: 0 auto;">
      <UL>
        <?php foreach ($list as $item) {?>
        <LI style="margin-bottom: 40px;padding-bottom: 8px;border-bottom: 2px #eeeeee solid;">
          <div class="txbj_img">
            <a href="<?php echo site_url('web/stories/detail/'.$item['id']); ?>" target="_blank">
                <img src="<?php echo base_url('uploads/stories/'.$item['image']); ?>" title="<?php echo $item['title']; ?>" style="width: 100%;" />
            </a>
          </div>
          <div class="txbj_wen01">
            <h4 style="text-align: left;"><?php echo $item['title']; ?></h4>
            <h5><?php echo mb_substr($item['content'], 0, 20).'...'; ?></h5>
          </div>
          <div class="txbj_wen02">
            <div class="wenli"><P>点击</P><I><?php echo $item['click']; ?></I></div>
            <div class="wenli"><P>评论</P><I>0</I></div>
          </div>
        </LI>
        <?php }?>
        <!-- <LI>
          <div class="txbj_img"><a href="#"><img src="<?php echo base_url('zeros/web/images/09.jpg'); ?>" title="特惠套系—E"/></a></div>
          <div class="txbj_wen01"><h4>2017年6月成功成为情侣</h4><h5>相知相守，信守一生</h5></div>
          <div class="txbj_wen02">
            <div class="wenli"><P>点击</P><I>284</I></div>
            <div class="wenli"><P>评论</P><I>0</I></div>
          </div>
        </LI>
        <LI>
          <div class="txbj_img"><a href="#"><img src="<?php echo base_url('zeros/web/images/09.jpg'); ?>" title="特惠套系—E"/></a></div>
          <div class="txbj_wen01"><h4>2017年6月成功成为情侣</h4><h5>相知相守，信守一生</h5></div>
          <div class="txbj_wen02">
            <div class="wenli"><P>点击</P><I>284</I></div>
            <div class="wenli"><P>评论</P><I>0</I></div>
          </div>
        </LI>
        <LI>
          <div class="txbj_img"><a href="#"><img src="<?php echo base_url('zeros/web/images/09.jpg'); ?>" title="特惠套系—E"/></a></div>
          <div class="txbj_wen01"><h4>2017年6月成功成为情侣</h4><h5>相知相守，信守一生</h5></div>
          <div class="txbj_wen02">
            <div class="wenli"><P>点击</P><I>284</I></div>
            <div class="wenli"><P>评论</P><I>0</I></div>
          </div>
        </LI>
        <LI>
          <div class="txbj_img"><a href="#"><img src="<?php echo base_url('zeros/web/images/09.jpg'); ?>" title="特惠套系—E"/></a></div>
          <div class="txbj_wen01"><h4>2017年6月成功成为情侣</h4><h5>相知相守，信守一生</h5></div>
          <div class="txbj_wen02">
            <div class="wenli"><P>点击</P><I>284</I></div>
            <div class="wenli"><P>评论</P><I>0</I></div>
          </div>
        </LI> -->
      </UL>
    </div>
    <div style="width: 785px;height: 50px;;margin: 0 auto;text-align: center;">
        <div style="width: 705px;margin: 0 auto;">
            <div class="img_pagr" style="float: right;">
                <?php if($page > 1){?>
                <a href="<?php if($id_c!=1){$prev=$id_c-1;echo site_url("web/stories/index?order=".$order."&per_page=".$prev);}else{echo "javascript:;";} ?>">上一页</a>
                <?php echo $page_links; ?>
                <a href="<?php if($id_c!=$page){$next=$id_c+1;echo site_url("web/stories/index?order=".$order."&per_page=".$next);}else{echo "javascript:;";} ?>">下一页</a>
                <?php }?>
            </div>
        </div>
    </div>
  </div>
  <div class="clear"></div>
</div>


<div class="tiao"></div>

<!-- 尾部 -->
<div class="footer" style="height: 155px;">
  <div class="footer_01" style="height: 155px;">
    <div class="footer1" style="height: 60px;">
      <div class="f_top" style="float: right;"><a href="#top"><img src="<?php echo base_url('zeros/web/images/ban-7_30_02.jpg'); ?>" /></a></div>
    </div>
    <div class="footer3">
      <P>Copyright © 20xx-2017 版权所有：北京航天亿成信息咨询服务中心</P>
    </div>
  </div>
</div>


</body>
</html>
