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

<style>
#story_title {
	text-align: center;
	line-height: 70px;
	font-size: 17px;
}
#story_content {
	width: 985px;
	text-align: center;
}
#story_content .story_center {
	margin: 0 auto;
	width: 785px;
	text-align: left;
}
/* #story_image {
    float: right; 
    margin: 10px 0 0 10px;  
} */
#story_content p { 
    line-height: 26px;
	font-size: 14px;
}
#story_footer {
	float: right;
	font-size: 14px;
	font-style: oblique;
	color: #666;
	padding-right: 15px;
}
.form-line {
    width: 800px;
    height: 20px;
    margin: 20px auto;
    border-bottom: 1px dashed #ddd;
}
.comment_title {
	background-color: rgb(255, 170, 187);
	width: 785px;
	height: 30px;
	margin: 0 auto;
	border-radius: 3px;
}
.comment_title .ct-l{
	float: left;
}
.comment_title .ct-r{
	float: right;
}
.ct-l span {
	padding-left: 15px;
	line-height: 30px;
	font-size: 14px;
	color: #666;
}
.ct-r a {
	padding-right: 15px;
	line-height: 30px;
	font-size: 14px;
	text-decoration: none;
	color: #666;
}
#comment_input {
	height: 100px;
	width: 785px;
	padding-top: 20px;
	margin: 0 auto;
}
#comment_content {
	box-sizing: border-box;
	padding: 5px 10px;
	height: 85px;
	line-height: 24px;
	border: 1px solid #f3f5f2;
	border-radius: 5px 0 0 5px;
	border-right: 0;
	resize: none;
	width: 700px;
	float: left;
	color: #666;
	font-size: 14px;
}
#comment_submit {
	height: 85px;
	width: 85px;
	background-color: #F23756;
	border: #F23756;
	border-radius: 0 5px 5px 0;
	float: right;
	color: white;
	cursor: pointer;
}
</style>
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
<div class="zy">
  <div class="zy_bt">
    <div class="bt_01"></div>
    <div class="bt_02" id="story_back" style="cursor: pointer;">成功故事</div>
    <div class="bt_03"></div>
    <div class="bt_04"></div>
    <div class="bt_05"></div>
  </div>
  <!-- <div class="zy_left">
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
    <?php echo $story['id']?>
    </div>
  </div> -->
  
  <!-- 标题 -->
  <div id="story_title">
    <h1><?php echo $story['title']; ?></h1>
  </div>
  
  <!-- 内容 -->
  <div id="story_content">
    <div class="story_center">
        <img src="<?php echo base_url('uploads/stories/'.substr($story['image'], 0, 6).'/'.$story['image']); ?>" alt="" id="story_image" />
        <p style="text-indent: 2em;"><?php echo $story['content']; ?></p>
        <div class="clear" style="height: 10px;"></div>
        <div id="story_footer">发布时间：<?php echo $story['time']; ?></div>
    </div>
  </div>
  
  <!-- 评论 -->
  <div class="form-line"></div>
  <div class="comment_title">
    <div class="ct-l"><span>评论</span></div>
    <div class="ct-r"><a href="javascript:send_focus();">[发评论]</a></div>
  </div>
  <div>
    <?php if(count($comment) == 0){?>
    <div style="height: 30px;width: 785px;margin: 0 auto;color: #666;padding: 25px;text-indent: 2em;">暂无评论</div>
    <?php }?>
    <?php foreach($comment as $item){?>
    <div style="width: 785px;margin: 0 auto;">
        <div style="margin: 25px;border-bottom: 1px solid #ddd;">
            <?php if(empty($item['to'])){?>
                <p>
                    <a href="javascript:;" style="color: #666;font-style: oblique;" title="回复<?php echo $item['from']; ?>" onclick="comment_to(<?php echo $item['from_id']; ?>,'<?php echo $item['from']; ?>');">
                    <?php echo $item['from']; ?>
                    </a>：
                </p>
                <p><?php echo $item['content']; ?></p>
                <p style="text-align: right;color: #666;font-style: oblique;font-size: 12px;"><?php echo $item['time'];?></p>
            <?php }else{?>
                <p>
                    <a href="javascript:;" style="color: #666;font-style: oblique;" title="回复<?php echo $item['from']; ?>" onclick="comment_to(<?php echo $item['from_id']; ?>,'<?php echo $item['from']; ?>');">
                    <?php echo $item['from']; ?>
                    </a>&nbsp;&nbsp;回复&nbsp;&nbsp;
                    <a href="javascript:;" style="color: #666;font-style: oblique;" title="回复<?php echo $item['from']; ?>" onclick="comment_to(<?php echo $item['from_id']; ?>,'<?php echo $item['from']; ?>');">
                    <?php echo $item['to']; ?>
                    </a>：
                </p>
                <p><?php echo $item['content']; ?></p>
                <p style="text-align: right;color: #666;font-style: oblique;font-size: 12px;"><?php echo $item['time'];?></p>
            <?php }?>
        </div>
    </div>
    <?php }?>
  </div>
  <div class="comment_title">
    <div class="ct-l"><span>发评论</span></div>
  </div>
  <div style="width: 785px;margin: 5px auto;">
      <div id="comment_input_tip" style="width: auto;height: 20px;border: 1px solid #666;border-radius: 4px;color: #666;display: none;">
        <span style="padding-left: 8px;" name="itip"></span>&nbsp;&nbsp;
        <span style="float: right;padding-right: 7px;cursor: pointer;" onclick="tip_close(this)">x</span>
      </div>
  </div>
  <div id="comment_input">
    <form action="<?php echo site_url('web/stories/write_comment'); ?>" method="post">
        <input type="hidden" id="comment_to" name="to_id" />
        <input type="hidden" id="story_id" name="story_id" value="<?php echo $story['id']; ?>"/>
        <textarea id="comment_content" name="content" placeholder="<?php if(!$login_status){echo '请登录后，发表评论';}else{echo '请发表评论';}?>"></textarea>
        <input value="评论" type="submit" id="comment_submit" <?php if(!$login_status){echo 'disabled="disabled"';} ?> />
    </form>
  </div>
  <br></br>
  <div class="clear"></div>
</div>


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
      <P>版权所有 © 2007-2017 北京xxx有限公司</P>
      <P>热门推荐：北京婚纱摄影、北京婚纱影楼、婚纱照或婚纱摄影外景，尽在蒙娜丽莎！</P>
    </div>
  </div>
</div>
<script>
$(window).load(function(){
	var image = new Image();
	image.src = '<?php echo base_url('uploads/stories/'.substr($story['image'], 0, 6).'/'.$story['image']); ?>';
	var width = image.width, height = image.height;
	if(width/height >= 3.5){
	    if(width >= 650){
		    width = 785;
		    height = image.height*785/image.width;
	    }else{
	        width = 400;
	        height = image.height*400/image.width;
	    }
	}else{
        width = 300;
        height = image.height*300/image.width;
	}
	var style = 'margin: 10px 0 0 10px;float: right;width: ' + width + 'px;height: ' + height + 'px;';
	$('#story_image').attr('style', style);
});
$('#story_back').click(function(){
	window.location.href = '<?php echo site_url('web/stories'); ?>';
});
function send_focus(){
	$('#comment_content').focus();
};
function comment_to(to_id,to){
	$('#comment_to').val(to_id);
	$('#comment_input_tip').find("span[name='itip']").html('回复' + to);
	$('#comment_input_tip').css('display','inline-block');
	$('#comment_content').focus();
};
function tip_close(dom){
	$('#comment_to').val('');
	$(dom).parent().hide();
}
</script>

</body>
</html>
