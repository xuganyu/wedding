<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="shortcut icon" href="<?php echo base_url('zeros/admin/images/icon.png'); ?>" type="image/x-icon" />
<link href="<?php echo base_url('zeros/web/css/bootstrap.css'); ?>" rel="stylesheet" />
<link href="<?php echo base_url('zeros/web/css/default.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('zeros/web/css/all.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('zeros/web/css/common.css'); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url('zeros/web/css/css.css'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('zeros/web/js/jquery-2.1.4.min.js'); ?>"></script>
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
$(function(){
	$('select').selectlist({
		zIndex: 10,
		width: 150,
		height: 40
	});		
})

</script>


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
        <div class="top-name">
            <span>Hi, <a href="#" class="top-pointer"><?php echo $login['user_nickname']; ?>&nbsp;<span>&nbsp;▾&nbsp;</span></a></span>
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
<div style="height: 50px;width: 100%;"></div>
<div class="sc">
  <div class="sc_bt">
    <div class="bt_01"></div>
    <div class="bt_02">活动详情</div>
    <div class="bt_03"></div>
    <div class="bt_04"></div>
   </div>
   <br>
  <section class="article-content">
       <div class="article-protect-body">
          <ul>
               <li>
                  <h1  style="text-align: center"><?php echo $edit["article_title"]; ?></h1> 
                  <h4 style="text-align:left;font-weight: normal;font-style: oblique;">发布时间：<?php echo date("Y-m-d H:i",$edit["article_stime"]); ?></h4>
                </li>
                <span style="text-indent: 2em;padding: 0 20px;text-align: left;"><?php echo $edit["article_content"]; ?></span>
		         <div class="jiathis_style_24x24">
					<a class="jiathis_button_qzone"></a>
					<a class="jiathis_button_tsina"></a>
					<a class="jiathis_button_tqq"></a>
					<a class="jiathis_button_weixin"></a>
					<a class="jiathis_button_renren"></a>
					<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
					<a class="jiathis_counter_style"></a>
				  </div>
           </ul>
              <img src="<?php echo base_url('zeros/web/images/pro1.jpg'); ?>" />
        </div>
   </section>
 </div>
<div class="clear"></div>

<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>



<div class="home" style="padding-bottom: 0;"></div>
<div class="tiao"></div>

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
      <P>版权所有 © 2007-2017 北京xxxx有限公司</P>
      <P>热门推荐：北京婚纱摄影、北京婚纱影楼、婚纱照或婚纱摄影外景，尽在蒙娜丽莎！</P>
    </div>
  </div>
</div>
<script src="<?php echo base_url('zeros/web/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('zeros/web/js/jquery.selectlist.js'); ?>"></script>

</body>
</html>
