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
<div class="middle-part">
    <div class="reg-box-left">

        <form id="register_form" action="<?php echo site_url('web/signup/register'); ?>" method="post" enctype="multipart/form-data" onsubmit="return check_form(this);">
            <div class="reg-form">
                <!-- 性别 -->
                <div class="col-form">

                    <label>我的性别：</label>
                    <div class="za-radio" id="sex_radio">

                        <input type="radio" name="sex" value="1" id="sex_1" <?php {if ($info[0]->sex=="1"){echo "checked";}} ?> ><label for="sex_1" class="label_m">男</label>
                        <input type="radio" name="sex" value="2" id="sex_0" <?php {if ($info[0]->sex=="2"){echo "checked";}} ?>><label for="sex_0" class="label_w">女</label>

                        <img src="<?php echo base_url('uploads/user/'.substr($info[0]->photo, 0, 6).'/'.$info[0]->photo); ?>"/>


                    </div>
                    <b class="check_tip" id="sex_tip"></b>
                </div>
                <!-- 生日 -->
                <div class="col-form">
                    <label>出生日期：</label>

                    <div class="za-item-selector">
                        <input name="birthday" type="text" id="birthday" value="<?php echo $info[0]->birthday?>">
                    </div>
                    <b class="check_tip" id="nickname_tip"></b>
                </div>
                <!-- 地区 -->
                <div class="col-form">
                    <label>工作地区：</label>
                    <div class="za-item-selector">
                        <input name="area" type="text" id="area" value="<?php echo $info[0]->area ?>">
                    </div>
                    <b class="check_tip" id="nickname_tip"></b>
                </div>
                <!-- 姻姻-->
                <div class="col-form">
                    <label>婚姻状况：</label>
                    <div class="za-radio marry-radio" id="MaritalStatus">
                        <input type="radio" name="marriage" value="1" id="mar_0" <?php {if ($info[0]->marriage=="1"){echo "checked";}} ?>><label for="mar_0">未婚</label>
                        <input type="radio" name="marriage" value="2" id="mar_1" <?php {if ($info[0]->marriage=="2"){echo "checked";}} ?>><label for="mar_1">离异</label>
                        <input type="radio" name="marriage" value="3" id="mar_2" <?php {if ($info[0]->marriage=="3"){echo "checked";}} ?>><label for="mar_2">丧偶</label>
                    </div>
                    <b class="check_tip tip_br" id="marriage_tip"></b>
                </div>
                <!-- 身高 -->
                <div class="col-form">
                    <label>我的身高：</label>
                    <div class="za-item-selector">
                        <input name="height" type="text" id="height" value="<?php echo $info[0]->height ?>">
                    </div>
                    <b class="check_tip" id="nickname_tip"></b>
                    <b class="check_tip" id="height_tip"></b>
                </div>
                <!-- 学历 -->
                <div class="col-form">
                    <label>我的学历：</label>
                    <div class="za-item-selector">
                        <input name="education" type="text" id="education" value="<?php echo $edu;?>">
                    </div>
                    <b class="check_tip" id="nickname_tip"></b>

                </div>
                <!-- 月薪 -->
                <div class="col-form">
                    <label>我的月薪：</label>
                    <div class="za-item-selector">
                        <input name="saraly" type="text" id="saraly" value="<?php echo $saraly;?>">
                    </div>
                    <b class="check_tip" id="nickname_tip"></b>

                </div>
                <div class="form-line"></div>
                <!-- 其他 -->
                <div class="col-form">
                    <label>我的昵称：</label>
                    <div class="za-item-selector">
                        <input name="nickname" type="text" id="nickname_input" value="<?php echo $info[0]->nickname ?>">
                    </div>
                    <b class="check_tip" id="nickname_tip"></b>
                </div>
                <div class="col-form">
                    <label>我的手机号：</label>
                    <div class="za-item-selector">
                        <input name="phone" type="text" id="phone_input" value="<?php echo $info[0]->phone?>">
                    </div>
                    <b class="check_tip" id="phone_tip"></b>
                </div>

                <div class="form-line"></div>

                <div class="col-form">
                    <label>自我介绍：</label>
                    <div class="za-item-selector">
                        <textarea name="intro" id="intro_input"><?php echo $info[0]->intro ?></textarea>
                    </div>
                    <b class="check_tip" id="intro_tip"></b>
                </div>
                <br><br><br><br><br><br>
                            <div class="top-link">
                                <a href="<?php echo site_url('web/search')?>">返回</a>

                            </div>


                <div class="form-line"></div>
            </div>
        </form>
    </div>
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
</body>
</html>