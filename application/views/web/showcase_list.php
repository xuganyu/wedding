<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="shortcut icon" href="<?php echo base_url('zeros/admin/images/icon.png'); ?>" type="image/x-icon" />
<link href="<?php echo base_url('zeros/web/css/default.min.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('zeros/web/css/css.css'); ?>" rel="stylesheet" type="text/css" />
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
<!-- 子页修改 图片展示 内容 -->
<div style="height: 50px;width: 100%;"></div>
<div class="zy">
  <div class="zy_bt">
    <div class="bt_01"></div>
    <div class="bt_02">活动推荐</div>
    <div class="bt_03"></div>
    <div class="bt_04"></div>
    <div class="bt_05"></div>
  </div>
    
  </div>
  <div class="clear"></div>
</div>

<section class="article-content" style="margin: 40px auto;">
       <div class="article-protect-body" style="margin-bottom: 0;">
          <ul>
              <?php foreach($list as $item){ ?> 
                <li style="line-height: 20px;border-bottom: 1px dashed #ddd;padding-top: 9px;">
                    <a href="<?php echo site_url("web/".$id_a."/items/".$item["article_id"]); ?>"target="_blank">
                     <span style="float: none;padding-left: 10px;color: #666;"><?php if(mb_strlen($item['article_title']) >= 15){echo mb_substr($item['article_title'], 0, 15).'...';}else{echo $item["article_title"];} ?></span>
                      <span style="float: right;padding-right: 10px;color: #666;font-weight: normal;font-style: oblique;"><?php echo date("Y-m-d",$item["article_stime"]); ?></span>
                    </a>
                </li>
                <?php } ?>
            </ul>
              <img src="<?php echo base_url('zeros/web/images/pro1.jpg'); ?>" style="max-width: 42%;"/>
        </div>
        <div class="pages">
            	<?php if($page > 1){?>
                <div class="page" style="text-align: center;">
                	<div class="img_pagr">
                	<a href="<?php if($id_c!=1){$prev=$id_c-1;echo site_url("web/showcase/index/".$prev);}else{echo "javscript:";} ?>">上一页</a>
                       <?php echo $page_links; ?>
                    <a href="<?php if($id_c!=$page){$next=$id_c+1;echo site_url("web/showcase/index/".$next);}else{echo "javscript:";} ?>">下一页</a>
                    </div>
                </div> 
                <?php } ?>
            </div>
            
    </section>
    
<!-- 热门套系 -->
<!--<div class="rm">
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
</div>  -->

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


</body>
</html>
