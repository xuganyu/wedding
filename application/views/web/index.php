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
        <?php foreach($banner as $item){?>
            <li> <a href="http://<?php echo $item["banner_url"]; ?>" target="blank"> <img  src="<?php echo base_url("uploads/".$item["banner_thumb"]); ?>" alt="<?php echo $item["banner_title"]; ?>"> </a>
            </li>
        <?php } ?>
    </ul>
  </div>
</div>
<!-- 联系电话、QQ -->
<!-- 最新活动 -->
<div class="zx">
  <div class="zx_photo">
    <div class="photo_img"><a href="http://<?php echo $adve_c["ad_url"]; ?>"><img src="<?php echo base_url("uploads/".$adve_c["ad_thumb"]); ?>" /></a></div>
    <div class="photo_yin"></div>
  </div>
  <div class="zx_li">
    <div class="zxli_bt">
      <div class="zxli_more"><a href="<?php echo site_url('web/showcase'); ?>"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
    </div>
    <div class="zxli_nei">
      <UL>
        <LI> <A href="#"><img src="<?php echo base_url('zeros/web/images/01.jpg'); ?>" /></A> <A href="#">
          <h1>2012年北京婚纱摄影三八妇女节优惠活动...</h1>
          </A> <I>春季到了，各种鲜花即将开放，到处都是花的海洋，不要错过这最美好的季节，赶快和珍...</I>
          <div class="time">
            <P>POST TIME:2013/01/15</P>
            <A href="#"><span>详细阅读</span></A> </div>
        </LI>
        <LI> <A href="#"><img src="<?php echo base_url('zeros/web/images/01.jpg'); ?>" /></A> <A href="#">
          <h1>2012年北京婚纱摄影三八妇女节优惠活动...</h1>
          </A> <I>春季到了，各种鲜花即将开放，到处都是花的海洋，不要错过这最美好的季节，赶快和珍...</I>
          <div class="time">
            <P>POST TIME:2013/01/15</P>
            <A href="#"><span>详细阅读</span></A> </div>
        </LI>
      </UL>
    </div>
  </div>
</div>
<!-- 内景展示 -->     
<div class="zs">
  <div class="njzs_bt"style="background:url(<?php echo base_url("uploads/".$adve_a["ad_thumb"]); ?>) no-repeat;">
    <div class="zxli_more"><a href="#"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
  </div>
  <div class="zs_nei">
    <UL>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 室内婚纱照</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/05.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 室内婚纱照</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/06.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 室内婚纱照</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 室内婚纱照</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
    </UL>
  </div>
</div>

<!-- 外景展示 -->
<div class="zs">
  <div class="wjzs_bt"style="background:url(<?php echo base_url("uploads/".$adve_b["ad_thumb"]); ?>) no-repeat;">
    <div class="zxli_more"><a href="#"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
  </div>
  <div class="zs_nei">
    <UL>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/06.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 婚纱外景·奥斯卡梦幻城堡</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 婚纱外景·奥斯卡梦幻城堡</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/05.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 婚纱外景·奥斯卡梦幻城堡</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
      <LI>
        <div class="boxgrid captionfull"> <a href="#"><img src="<?php echo base_url('zeros/web/images/06.jpg'); ?>"/></a>
          <div class="cover boxcaption">
            <h3>爱在西元前</h3>
            <p>- 婚纱外景·奥斯卡梦幻城堡</p>
            <p>- POST TIME：2012-12-01</p>
          </div>
        </div>
      </LI>
      <li id="dt"></li>
    </UL>
  </div>
</div>

<!-- 客片展示 -->
<div class="kp">
  <div class="kp_bt">
    <div class="bt_top">
      <div class="kp_more"><A href="#"><img src="<?php echo base_url('zeros/web/images/more_01.jpg'); ?>" title="更多"/></A></div>
      <div class="kp_more"><A href="#top"><img src="<?php echo base_url('zeros/web/images/top.jpg'); ?>" title="返回顶部"/></A></div>
    </div>
  </div>
  <div class="kp_kon"></div>
  <div class="kp_nei">
    <UL>
      <LI>
        <a href="#"><img src="<?php echo base_url('zeros/web/images/07.jpg'); ?>" /></a>
        <P>生如夏花</P>
        <I>POST TIME:2013-01-08</I>
      </LI>
      <LI>
        <a href="#"><img src="<?php echo base_url('zeros/web/images/08.jpg'); ?>" /></a>
        <P>生如夏花</P>
        <I>POST TIME:2013-01-08</I>
      </LI>
      <LI>
        <a href="#"><img src="<?php echo base_url('zeros/web/images/07.jpg'); ?>" /></a>
        <P>生如夏花</P>
        <I>POST TIME:2013-01-08</I>
      </LI>
      <LI>
        <a href="#"><img src="<?php echo base_url('zeros/web/images/08.jpg'); ?>" /></a>
        <P>生如夏花</P>
        <I>POST TIME:2013-01-08</I>
      </LI>
      <LI>
        <a href="#"><img src="<?php echo base_url('zeros/web/images/07.jpg'); ?>" /></a>
        <P>生如夏花</P>
        <I>POST TIME:2013-01-08</I>
      </LI>
    </UL>
  </div>
</div>

<!-- 热门套系 -->
<div class="rm">
  <div class="rm_bt">
    <div class="bt_top">
      <div class="kp_more"><A href="#"><img src="<?php echo base_url('zeros/web/images/more_01.jpg'); ?>" title="更多"/></A></div>
      <div class="kp_more"><A href="#top"><img src="<?php echo base_url('zeros/web/images/top.jpg'); ?>" title="返回顶部"/></A></div>
    </div>
  </div>
  <div class="kp_kon"></div>
  <div class="rm_nei">
    <UL>
      <LI><div class="rm_A"><div class="rm_more"><A href="#" title="查看更多">MORE</A></div></div></LI>
      <LI><div class="rm_B"><div class="rm_more"><A href="#" title="查看更多">MORE</A></div></div></LI>
      <LI><div class="rm_C"><div class="rm_more"><A href="#" title="查看更多">MORE</A></div></div></LI>
    </UL>
  </div>
</div>
<div class="home"></div>

<!-- 尾部 -->
<div class="tiao"></div>
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
      <P>版权所有 © 2007-2017 北京xxxx有限公司</P>
      <P>热门推荐：北京婚纱摄影、北京婚纱影楼、婚纱照或婚纱摄影外景，尽在蒙娜丽莎！</P>
    </div>
  </div>
</div>

</body>
</html>
