<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="shortcut icon" href="<?php echo base_url('zeros/admin/images/icon.png'); ?>" type="image/x-icon" />
<link href="<?php echo base_url('zeros/web/css/css.css'); ?>" rel="stylesheet" type="text/css" />
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

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
<!-- 子页修改 图片展示 内容 -->
<div class="sc">
  <div class="sc_bt" style="text-align:center">
    <div class="bt_01"></div>
    <div class="bt_02">公司简介</div>
    <div class="bt_03"></div>
    <div class="bt_04"></div>
  </div>
<div class="zy">
  <div class="zy_imgli" style="text-align: center;">
    <div class="img_bt" style="width: 800px;border-bottom: 1px solid #ddd;margin: 0 auto;">
      
      <P  style="text-align:center;width: 800px">北京航天亿成信息咨询服务中心</P>
    </div>
    <div class="img_nei">
      <UL>
        <LI><img src="<?php echo base_url('zeros/web/images/company.jpg'); ?>" /></LI>
        <LI>
            <p style="text-align: left;text-indent: 2em;">北京航天亿成信息咨询服务中心：是由几位航天系统离退休的人员创立的，服务于航天系统的单身员工及面向全社会各类人群提供婚介、家政等多项生活信息的服务机构。为单身者提供征婚、交友联谊活动，为空巢老人提供老年生活互助服务。我们的宗旨是以真诚、热情帮您解决生活中的困难好烦恼，以低廉的价格为您提供真实可靠、严谨细致的服务，您的满意是我们的最大目标。</p>
        </LI>
      </UL>
    </div>
  
  </div>
  <div class="clear"></div>
</div>
</div>
<div style="width: 900px;text-align: center;margin: 0 auto 40px auto;">
    <div style="width:785px;height:550px;border:#ccc solid 1px;margin: 0 auto;" id="dituContent"></div>
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
      <P>Copyright © 20xx-2017 版权所有：北京xxxx有限公司</P>
    </div>
  </div>
</div>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(116.408142,39.81372);//定义一个中心点坐标
        map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.disableScrollWheelZoom();//禁用地图滚轮放大缩小，默认禁用(可不写)
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
                        }
    
    //标注点数组
    var markerArr = [{title:"北京航天亿成信息咨询服务中心",content:"地址：北京市丰台区南苑路111号<br/><br/>电话：67985160",point:"116.408084|39.813145",isOpen:1,icon:{w:23,h:25,l:23,t:21,x:9,lb:12}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
</body>
</html>
