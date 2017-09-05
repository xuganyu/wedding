<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页</title>
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
<div class="banner">
  <div id="focus">
    <ul>
        <?php foreach($banner as $item){?>
            <li> <a href="http://<?php echo $item["banner_url"]; ?>" target="blank"> <img  src="<?php echo base_url("uploads/".$item["banner_thumb"]); ?>" alt="<?php echo $item["banner_title"]; ?>" style="width: 100%;height: 100%;"> </a>
            </li>
        <?php } ?>
    </ul>
  </div>
</div>
<!-- 联系电话、QQ -->
<!-- 最新活动 -->
<div class="zx" style="margin-top: 20px;">
  <div class="zx_photo">
    <div class="photo_img"><a href="http://<?php echo $adve_c["ad_url"]; ?>"><img src="<?php echo base_url("uploads/".$adve_c["ad_thumb"]); ?>" /></a></div>
    <div class="photo_yin"></div>
  </div>
  <div class="zx_li">
    <div class="zxli_bt" style="border-bottom: 1px solid #ddd;">
      <div class="zxli_more"><a href="<?php echo site_url('web/showcase'); ?>"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
    </div>
    <div class="zxli_nei">
      <UL>
        <?php foreach ($activity as $item) {?>
        <LI style="border-bottom: 1px dashed #ddd;">
            <A href="<?php echo site_url("web/showcase/items/".$item["article_id"]); ?>" target="_blank">
                <h1 style="float: none;padding-left: 20px;"><?php if(mb_strlen($item['article_title']) >= 20){echo mb_substr($item['article_title'], 0, 20).'...';}else{echo $item['article_title'];}?></h1>
            </A> 
            <div style="height: 38px;">
                <p style="float: none;font-style: normal;line-height: 19px;color: #aaa;text-indent: 12px;padding-left: 20px;">
                    <?php if(mb_strlen(strip_tags($item['article_content'])) >= 40){echo mb_substr(strip_tags($item['article_content']), 0, 40).'...';}else{echo strip_tags($item['article_content']).'...';}?>
                </p>
            </div>
            <div class="time">
                <div style="float: right;">
                    <P>POST TIME : <?php echo date('Y/m/d', $item['article_stime']); ?></P>
                    <A href="<?php echo site_url("web/showcase/items/".$item["article_id"]); ?>" target="_blank"><span>详细阅读</span></A> 
                </div>
            </div>
        </LI>
        <?php }?>
        <!-- <LI> <A href="#"><img src="<?php echo base_url('zeros/web/images/01.jpg'); ?>" /></A> <A href="#">
          <h1>2012年北京婚纱摄影三八妇女节优惠活动...</h1>
          </A> <I>春季到了，各种鲜花即将开放，到处都是花的海洋，不要错过这最美好的季节，赶快和珍...</I>
          <div class="time">
            <P>POST TIME:2013/01/15</P>
            <A href="#"><span>详细阅读</span></A> </div>
        </LI> -->
      </UL>
    </div>
  </div>
</div>
<!-- 用户展示 --> 
<?php if(strcmp($sex, '2') == 0){?>    
<div class="zs">
  <div class="njzs_bt"style="background:url(<?php echo base_url("zeros/web/images/ban-7_15_01.jpg"); ?>) no-repeat;">
    <div class="zxli_more"><a href="<?php echo site_url('web/search'); ?>"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
  </div>
  <div class="zs_nei" style="background: none;height: 642px;">
    <UL>
        <?php foreach ($males as $male){?>
        <LI style="margin-bottom: 20px;">
        <div class="boxgrid captionfull"> 
            <a href="<?php echo site_url('web/search/info/'.$male['Id']); ?>" target="_blank">
                <img src="<?php echo base_url('uploads/user/'.substr($male['photo'], 0, 6).'/'.$male['photo']); ?>" width="100%" height="100%"/>
            </a>
            <div class="cover boxcaption">
                <h3><?php echo $male['nickname']; ?></h3>
                <p>地区&nbsp;&nbsp;<?php if(empty($male['country'])){ echo $male['province'].'-'.$male['city']; } else { echo $male['province'].'-'.$male['city'].'-'.$male['country']; }?></p>
                <p>注册时间&nbsp;&nbsp;<?php echo date('Y-m-d', strtotime($male['regtime']))?></p>
            </div>
        </div>
        </LI>
        <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
        <?php }?>
        <?php if(count($males) < 8){?>
            <?php for($i=count($males); $i<8; $i++){?>
            <LI style="margin-bottom: 20px;">
            <div class="boxgrid captionfull"> 
                <a href="<?php echo site_url('web/signup'); ?>" target="_blank">
                    <img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>" width="100%" height="100%"/>
                </a>
                <div class="cover boxcaption">
                    <h3>期待您的加入</h3>
                    <p>免费注册</p>
                    <p>开启寻爱之旅</p>
                </div>
            </div>
            </LI>
            <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
            <?php }?>
        <?php }?>
    </UL>
  </div>
</div>
<?php }else if(strcmp($sex, '1') == 0){?>
<div class="zs">
  <div class="njzs_bt"style="background:url(<?php echo base_url("zeros/web/images/ban-7_16_01.jpg"); ?>) no-repeat;">
    <div class="zxli_more"><a href="<?php echo site_url('web/search'); ?>"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
  </div>
  <div class="zs_nei" style="background: none;height: 642px;">
    <UL>
        <?php foreach ($females as $female){?>
        <LI style="margin-bottom: 20px;">
        <div class="boxgrid captionfull"> 
            <a href="<?php echo site_url('web/search/info/'.$female['Id']); ?>" target="_blank">
                <img src="<?php echo base_url('uploads/user/'.substr($female['photo'], 0, 6).'/'.$female['photo']); ?> width="100%" height="100%""/>
            </a>
            <div class="cover boxcaption">
                <h3><?php echo $female['nickname']; ?></h3>
                <p>地区&nbsp;&nbsp;<?php if(empty($female['country'])){ echo $female['province'].'-'.$female['city']; } else { echo $female['province'].'-'.$female['city'].'-'.$female['country']; }?></p>
                <p>注册时间&nbsp;&nbsp;<?php echo date('Y-m-d', strtotime($female['regtime']))?></p>
            </div>
        </div>
        </LI>
        <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
        <?php }?>
        <?php if(count($females) < 8){?>
            <?php for($i=count($females); $i<8; $i++){?>
            <LI style="margin-bottom: 20px;">
            <div class="boxgrid captionfull"> 
                <a href="<?php echo site_url('web/signup'); ?>" target="_blank">
                    <img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>" width="100%" height="100%"/>
                </a>
                <div class="cover boxcaption">
                    <h3>期待您的加入</h3>
                    <p>免费注册</p>
                    <p>开启寻爱之旅</p>
                </div>
            </div>
            </LI>
            <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
            <?php }?>
        <?php }?>
    </UL>
  </div>
</div>
<?php }else{?>
<div class="zs">
  <div class="njzs_bt"style="background:url(<?php echo base_url("zeros/web/images/ban-7_15_01.jpg"); ?>) no-repeat;">
    <div class="zxli_more"><a href="<?php echo site_url('web/search'); ?>"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
  </div>
  <div class="zs_nei" style="background: none;height: 642px;">
    <UL>
        <?php foreach ($males as $male){?>
        <LI style="margin-bottom: 20px;">
        <div class="boxgrid captionfull"> 
            <a href="<?php echo site_url('web/search/info/'.$male['Id']); ?>" target="_blank">
                <img src="<?php echo base_url('uploads/user/'.substr($male['photo'], 0, 6).'/'.$male['photo']); ?>" width="100%" height="100%"/>
            </a>
            <div class="cover boxcaption">
                <h3><?php echo $male['nickname']; ?></h3>
                <p>地区&nbsp;&nbsp;<?php if(empty($male['country'])){ echo $male['province'].'-'.$male['city']; } else { echo $male['province'].'-'.$male['city'].'-'.$male['country']; }?></p>
                <p>注册时间&nbsp;&nbsp;<?php echo date('Y-m-d', strtotime($male['regtime']))?></p>
            </div>
        </div>
        </LI>
        <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
        <?php }?>
        <?php if(count($males) < 8){?>
            <?php for($i=count($males); $i<8; $i++){?>
            <LI style="margin-bottom: 20px;">
            <div class="boxgrid captionfull"> 
                <a href="<?php echo site_url('web/signup'); ?>" target="_blank">
                    <img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>" width="100%" height="100%"/>
                </a>
                <div class="cover boxcaption">
                    <h3>期待您的加入</h3>
                    <p>免费注册</p>
                    <p>开启寻爱之旅</p>
                </div>
            </div>
            </LI>
            <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
            <?php }?>
        <?php }?>
    </UL>
  </div>
</div>
<div class="zs">
  <div class="njzs_bt"style="background:url(<?php echo base_url("zeros/web/images/ban-7_16_01.jpg"); ?>) no-repeat;">
    <div class="zxli_more"><a href="<?php echo site_url('web/search'); ?>"><img src="<?php echo base_url('zeros/web/images/MORE.jpg'); ?>" title="更多" /></a></div>
  </div>
  <div class="zs_nei" style="background: none;height: 642px;">
    <UL>
        <?php foreach ($females as $female){?>
        <LI style="margin-bottom: 20px;">
        <div class="boxgrid captionfull"> 
            <a href="<?php echo site_url('web/search/info/'.$female['Id']); ?>" target="_blank">
                <img src="<?php echo base_url('uploads/user/'.substr($female['photo'], 0, 6).'/'.$female['photo']); ?>" width="100%" height="100%"/>
            </a>
            <div class="cover boxcaption">
                <h3><?php echo $female['nickname']; ?></h3>
                <p>地区&nbsp;&nbsp;<?php if(empty($female['country'])){ echo $female['province'].'-'.$female['city']; } else { echo $female['province'].'-'.$female['city'].'-'.$female['country']; }?></p>
                <p>注册时间&nbsp;&nbsp;<?php echo date('Y-m-d', strtotime($female['regtime']))?></p>
            </div>
        </div>
        </LI>
        <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
        <?php }?>
        <?php if(count($females) < 8){?>
            <?php for($i=count($females); $i<8; $i++){?>
            <LI style="margin-bottom: 20px;">
            <div class="boxgrid captionfull"> 
                <a href="<?php echo site_url('web/signup'); ?>" target="_blank">
                    <img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>" width="100%" height="100%"/>
                </a>
                <div class="cover boxcaption">
                    <h3>期待您的加入</h3>
                    <p>免费注册</p>
                    <p>开启寻爱之旅</p>
                </div>
            </div>
            </LI>
            <li style="width: 22px;height: 285px;overflow: hidden;border: none;"></li>
            <?php }?>
        <?php }?>
    </UL>
  </div>
</div>
<?php }?>

<!-- 成功故事 -->
<div class="kp" style="height: 365px;">
  <div class="kp_bt">
    <div class="bt_top">
      <div class="kp_more"><A href="<?php echo site_url('web/stories')?>"><img src="<?php echo base_url('zeros/web/images/more_01.jpg'); ?>" title="更多"/></A></div>
      <div class="kp_more"><A href="#top"><img src="<?php echo base_url('zeros/web/images/top.jpg'); ?>" title="返回顶部"/></A></div>
    </div>
  </div>
  <div class="kp_kon"></div>
  <div class="kp_nei" style="height: 300px;">
    <UL>
    <?php foreach ($stories as $story){?>
      <LI style="background-size: 100% 100%;height: 265px;">
        <a href="<?php echo site_url('web/stories/detail/'.$story['id']); ?>" target="_blank"><img src="<?php echo base_url('uploads/stories/'.substr($story['image'], 0, 6).'/'.$story['image']); ?>" /></a>
        <P style="height: 44px;"><?php if(mb_strlen($story['title']) >= 15){echo mb_substr($story['title'], 0, 15).'...';}else{echo $story['title'];}?></P>
        <I>发布于&nbsp;<?php echo $story['time']?></I>
      </LI>
    <?php }?>
    <?php if(count($stories) < 5){?>
    <?php for($i=count($stories); $i<5; $i++){?>
      <LI style="background-size: 100% 100%;height: 265px;">
        <a href="#"><img src="<?php echo base_url('zeros/web/images/04.jpg'); ?>" /></a>
        <P style="height: 44px;">敬请期待</P>
        <I>即将发布</I>
      </LI>
    <?php }?>
    <?php }?>
    </UL>
  </div>
</div>

<!-- 尾部 -->
<div class="tiao"></div>
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
