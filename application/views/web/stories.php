<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="shortcut icon" href="<?php echo base_url('zeros/admin/images/icon.png'); ?>" type="image/x-icon" />
<link href="<?php echo base_url('zeros/web/css/css.css'); ?>" rel="stylesheet" type="text/css" />
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
<div class="top"></div>
<div class="nav">
  <UL>
    <LI><a href="<?php echo site_url('web/index'); ?>">首页<I>HOME</I></a></LI>
    <LI><a href="<?php echo site_url('web/search'); ?>">搜索<I>SEARCH SHOW</I></a></LI>
    <LI><a href="<?php echo site_url('web/stories'); ?>">成功故事<I>SUCCSEE STORIES</I></a></LI>
    <LI><a href="<?php echo site_url('web/showcase'); ?>">热帖推荐<I>LOVE SHOWCASE</I></a></LI>
    <LI><a href="<?php echo site_url('web/video'); ?>">视频展示<I>VIDEO SHOW</I></a></LI>
    <LI><a href="<?php echo site_url('web/signup'); ?>">会员注册<I>SIGN UP</I></a></LI>
    <LI><a href="<?php echo site_url('web/company'); ?>">公司简介<I>COMPANY PROFILE</I></a></LI>
  </UL>
</div>
<div class="banner">
  <div id="focus">
    <ul>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
      <li><a href="#" target="_blank"><img src="<?php echo base_url('zeros/web/images/ban-7_06.jpg'); ?>"/></a></li>
    </ul>
  </div>
</div>
<!-- 联系电话、QQ -->
<div class="tel">
  <div class="tel_01"></div>
  <div class="tel_02"></div>
  <div class="tel_03"></div>
</div>

<!-- 子页修改 图片展示 列表 -->
<div class="zy">
  <div class="zy_bt">
    <div class="bt_01"></div>
    <div class="bt_02">最新活动</div>
    <div class="bt_03"></div>
    <div class="bt_04"></div>
    <div class="bt_05"><A href="#">返回首页</A>·<A href="#">最新活动</A>·<A href="#">最新活动</A></div>
  </div>
  <div class="zy_left">
    <div class="left_list">
      <ul>
        <li><A href="#">最新活动</A></li>
        <li><A href="#">热门活动</A></li>
        <li><A href="#">所有活动</A></li>
      </ul>
    </div>
    <div class="left_tj">
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
  </div>
  <div class="zy_right">
    <div class="txbj_nei">
      <UL>
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
      </UL>
    </div>
  </div>
  <div class="clear"></div>
</div>


<div class="home"></div>

<!-- 尾部 -->
<div class="footer">
  <div class="footer_01">
    <div class="footer1">
      <div class="f_nav">
        <UL>
          <LI><a href="#"><P>返回首页</P><P>HOME</P></a></LI>
          <LI><a href="#"><P>关于我们</P><P>ABOUT US</P></a></LI>
          <LI><a href="#"><P>作品展示</P><P>WORKS</P></a></LI>
          <LI><a href="#"><P>服务价格</P><P>SERVICES</P></a></LI>
          <LI><a href="#"><P>外景地</P><P>SPCATICNS</P></a></LI>
          <LI><a href="#"><P>最新动态</P><P>NEWS</P></a></LI>
          <LI><a href="#"><P>联系我们</P><P>CONTACT</P></a></LI>
          <LI><a href="#"><P>客户交流</P><P>BBS</P></a></LI>
          <LI><a href="#"><P>在线订单</P><P>ORDER</P></a></LI>
          <LI><a href="#"><P>视频展示</P><P>VIDEO</P></a></LI>
        </UL>
      </div>
      <div class="f_top"><a href="#top"><img src="<?php echo base_url('zeros/web/images/ban-7_30_02.jpg'); ?>" /></a></div>
    </div>
  
    <div class="footer3">
      <P>版权所有 © 2007-2017 北京xxx有限公司</P>
      <P>热门推荐：北京婚纱摄影、北京婚纱影楼、婚纱照或婚纱摄影外景，尽在蒙娜丽莎！</P>
    </div>
  </div>
</div>


</body>
</html>
