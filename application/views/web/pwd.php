<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<link rel="shortcut icon" href="<?php echo base_url('zeros/web/images/icon.png'); ?>" type="image/x-icon" />
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

<style>
.col-form {
    height: 28px;
    margin: 40px;
    line-height: 32px;
	text-align: center;
}
.za-item-selector {
    width: 287px;
    height: 36px;
    line-height: 36px;
	margin: 0 auto;
}
.za-item-selector input {
    background: #F8F8F8 none repeat scroll 0 0;
    border: 1px solid #c9c9c9;
    border-radius: 4px;
    cursor: pointer;
    height: 37px;
    padding-left: 15px;
    position: relative;
    width: 243px;
    overflow: hidden;
    color: #666;
    font: 13px/1.5 tahoma,arial,ËÎÌå;
}
.reg-btn {
    background-color: #ff6060;
    height: 41px;
    width: 260px;
    border: 0 none;
    border-radius: 6px;
    color: #fff;
    cursor: pointer;
    font-family: "Microsoft Yahei";
    font-size: 20px;
    transition: background-color 0.3s ease 0s;
}
.reg-btn:hover {
	background-color: #eb5858;
}
.tip {
	display: none;
	font-size: 12px;
	color: red;
	line-height: 20px;
	float: left;
	padding-left: 20px;
}
</style>

</head>

<body>
<div class="top"></div>
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
<div class="zy">
  <div class="zy_bt">
    <div class="bt_01"></div>
    <div class="bt_02">修改密码</div>
    <div class="bt_03"></div>
    <div class="bt_04"></div>
    <div class="bt_05"></div>
  </div>
  
  <div style="widows: 985px;height: 350px;text-align: center;">
    <div style="width: 500px;height: 20px;margin: 20px auto;border-bottom: 1px dashed #ddd;">
    </div>
    <div style="width: 500px;margin: 0 auto;text-align: center;">
        <form action="<?php echo site_url('web/login/do_pwd'); ?>" method="post" onsubmit="return submit_valid()">
        <div class="col-form">
			<div class="za-item-selector">
				<input name="old_pwd" type="password" id="old_pwd_input" placeholder="请输入原密码" onblur="form_valid(this);" />
				<span class="tip"></span>
			</div>
		</div>
        <div class="col-form">
			<div class="za-item-selector">
				<input name="password" type="password" id="pwd_input" placeholder="请输入新密码" onblur="form_valid(this);" />
				<span class="tip"></span>
			</div>
		</div>
        <div class="col-form">
			<div class="za-item-selector">
				<input name="repassword" type="password" id="repwd_input" placeholder="请再次输入新密码" onblur="form_valid(this);" />
				<span class="tip"></span>
			</div>
		</div>
		<div>
    		<input class="reg-btn" value="提交" type="submit" />
		</div>
	   </form>
    </div>
    <div style="width: 500px;height: 20px;margin: 10px auto;border-bottom: 1px dashed #ddd;"></div>
    <div style="margin: 0 auto;text-align: center;width: 500px;color: #666;height: 50px;">
    </div>
  </div>
  
  <br></br>
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

<script>
function form_valid(dom){
	var value = $(dom).val();
	if($(dom).attr('name') == 'old_pwd'){
    	if(value == ''){
		    $(dom).next().html('* 必填');
		    $(dom).next().show();
		    return false;
    	}else{
		    $(dom).next().hide();
		    return true;
    	}
	}else if($(dom).attr('name') == 'password'){
		if(value == ''){
		    $(dom).next().html('* 必填');
		    $(dom).next().show();
		    return false;
    	}else{
		    $(dom).next().hide();
		    return true;
    	}
	}else{
		if(value == ''){
		    $(dom).next().html('* 必填');
		    $(dom).next().show();
		    return false;
    	}else if(value != $('#pwd_input').val()){
    		$(dom).next().html('* 两次输入的密码不一致');
		    $(dom).next().show();
		    return false;
    	}else{
		    $(dom).next().hide();
		    return true;
    	}
	}
}
function submit_valid(){
	var oldpwd = $('#old_pwd_input').val();
	var password = $('#pwd_input').val();
	var repassword = $('#repwd_input').val();
	if(password == '' || repassword == '' || old_pwd == '' || !form_valid('#old_pwd_input') || !form_valid('#pwd_input') || !form_valid('#repwd_input')){
		return false;
	}else{
	    return true;
	}
}
</script>

</body>
</html>
