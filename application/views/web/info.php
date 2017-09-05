<!DOCTYPE html>
<html>
<head>
    <title>会员注册</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url('zeros/web/images/icon.png'); ?>" type="image/x-icon" />
    <link href="<?php echo base_url('zeros/web/css/sign.css'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url('zeros/web/css/css.css'); ?>" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url('zeros/web/js/cropper/cropper.css'); ?>" rel="stylesheet" type="text/css" media="all" />

    <script src="<?php echo base_url('zeros/web/js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('zeros/web/js/layer/layer.js'); ?>"></script>
    <script src="<?php echo base_url('zeros/web/js/cropper/cropper.js'); ?>"></script>
</head>
<body class="sign-body">
<div class="top" style="text-align: center;">
    <div style="width: 985px;height: 134px;margin: 0 auto;text-align: right;">
        <?php $login = get_user_info();?>
        <?php if(empty($login)){?>
            <div class="top-link">
                <a href="<?php echo site_url('web/signup')?>">注册</a>
                <a href="<?php echo site_url('web/login')?>">登录</a>
            </div>
        <?php }?>
    </div>
</div>
<!-- 导航栏 -->
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
<!-- <div class="sign-top-buttons">
<a href="index.html">登录</a><a href="signup.html" class="sign-active">注册</a>
</div>
<br>
<br> -->
<div style="height: 50px;width: 100%;"></div>
<div class="zy" style="text-align: center;">
    <div class="zy_bt">
        <div class="bt_01"></div>
        <div class="bt_02">个人信息详情</div>
        <div class="bt_03"></div>
        <div class="bt_04"></div>
        <div class="bt_05"></div>
    </div>
</div>
<!-- 注册信息 -->
<div class="middle-part" style="height: auto;">
    <div class="reg-box-left">
        <div class="reg-form">
            <!-- 性别 -->
            <div class="col-form">
                <label>我的性别：</label>
                <div class="za-radio" id="sex_radio">
                    <?php if ($info[0]->sex=="1"){ ?>
                    <label for="sex_1" class="label_m">男</label>
                    <?php }else{ ?>
                    <label for="sex_0" class="label_w">女</label>
                    <?php } ?>
                </div>
            </div>
            <!-- 生日 -->
            <div class="col-form">
                <label>出生日期：</label>
                <div class="za-item-selector">
                    <p><?php echo $info[0]->birthday?></p>
                </div>
            </div>
            <!-- 地区 -->
            <div class="col-form">
                <label>工作地区：</label>
                <div class="za-item-selector">
                    <p><?php echo $info[0]->province.'-'.$info[0]->city.'-'.$info[0]->country ?></p>
                </div>
            </div>
            <!-- 姻姻-->
            <div class="col-form">
                <label>婚姻状况：</label>
                <div class="za-radio marry-radio" id="MaritalStatus">
                    <?php if ($info[0]->marriage=="1"){ ?>
                    <p>未婚</p>
                    <?php } else if ($info[0]->marriage=="2"){ ?>
                    <p>离异</p>
                    <?php } else { ?>
                    <p>丧偶</p>
                    <?php } ?>
                </div>
            </div>
            <!-- 身高 -->
            <div class="col-form">
                <label>我的身高：</label>
                <div class="za-item-selector">
                    <p><?php echo $info[0]->height ?></p>
                </div>
            </div>
            <!-- 学历 -->
            <div class="col-form">
                <label>我的学历：</label>
                <div class="za-item-selector">
                    <p><?php echo $edu;?></p>
                </div>

            </div>
            <!-- 月薪 -->
            <div class="col-form">
                <label>我的月薪：</label>
                <div class="za-item-selector">
                    <p><?php echo $saraly;?></p>
                </div>

            </div>
            <div class="form-line"></div>
            <!-- 其他 -->
            <div class="col-form">
                <label>我的昵称：</label>
                <div class="za-item-selector">
                    <p><?php echo $info[0]->nickname ?></p>
                </div>
            </div>
            <div class="col-form">
                <label>我的手机号：</label>
                <div class="za-item-selector">
                    <p><?php echo $info[0]->phone?></p>
                </div>
            </div>

            <div style="height: 20px;border-bottom: 1px dashed #ddd;width: 750px;margin: 0 29px;"></div>

            <div class="col-form" style="width: 900px;">
                <label>自我介绍：</label>
                <div class="za-item-selector" style="width: 600px;height: auto;">
                    <p><?php echo $info[0]->intro ?></p>
                </div>
            </div>
            <br/>
            <br/>
        </div>
    </div>
    <div class="reg-box-right">
        <img src="<?php echo base_url('uploads/user/'.substr($info[0]->photo, 0, 6).'/'.$info[0]->photo); ?>" width="200px" height="284px"/>
    </div>
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