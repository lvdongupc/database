<!doctype html>
<html lang="zh-cmn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/register.css"/>
    <link rel="stylesheet" href="css/layui.css"/>
    <title>用户注册</title>
    <style>
        .background{
            display:block;
            position: fixed;
            background: url("hbu01.JPG");
            background-repeat: no-repeat;
            background-size: cover;
            top:0px;
            height:100%;
            width: 100%;
            z-index: -10;
            overflow: hidden;
            background-color: #000;
            transition: background-image 0.5s ease-in-out; /* 添加渐变效果 */
        }
    </style>
</head>
<body>
<div class="background" id="myDiv"></div>
<script>
    var count = 1;
    var images = ['hbu01.jpg', 'hbu02.jpg', 'hbu03.jpg', 'hbu04.jpg'];
    var maxCount = images.length;
    var intervalID = setInterval(changeImg, 3000); // 每3秒自动切换图片

    function changeImg() {
        count++;
        if (count > maxCount) {
            count = 1;
        }

        var div = document.getElementById("myDiv");
        var img = new Image();
        img.src = images[count - 1];
        img.onload = function() {
            div.style.backgroundImage = "url('" + img.src + "')";
        };
    }
</script>
<script>
    var count = 1;
    var maxCount = 4;
    var intervalID = setInterval(changeImg, 3000);  // 每3秒自动切换图片
    function changeImg() {
        count++;
        if (count > maxCount) {
            count = 1;
        }
        var div = document.getElementById("myDiv");
        div.style.backgroundImage = "url('hbu0" + count + ".jpg')";  // 根据计数器更换背景图片
    }
</script>
<div class="main">
    <div class="header">
        <div class="portal-logo">
            <img style="height:100%" src="image/logo-1.png"/>
        </div>
        <div class="portal-title">
            会议室管理系统
        </div>
    </div>
    <div class="container">
        <div class="notice-panel">
            <div class="notice-box">
                <div class="notice-title">
                    系统使用说明
                </div>
                <div class="notice-break-line"></div>
                <div class="notice-content">
                    <p>温馨提示:</p>
                    <p>1.用户名为教师工号或学生学号，初始密码为身份证号除“X”之外的后六位数字（外籍人员为护照号），用户密码 有密码强度要求</p>
                    <p>2、会议室实行网上预约使用与管理。注意：最晚提前一天进行预约。</p>
                    <p>3、会议室预约时段为：8:00-18：00(提示：预约时间必须落在系统划定时间段内，时间需按照系统原有时间格式输入）</p>
                    <p>4、建议使用电脑设备访问本系统。</p>
                    <p>5、建议浏览器：IE10+ 、Edge 、火狐谷歌</p>
                    <p>6、如会议室多媒体设备使用前发生故障、损坏或配件丢失，要及时上报综合办公室，未及时上报发现后责任一律由最后使用人承担。</p>
                </div>
            </div>
        </div>
        <div class="login-panel">
            <div class="login-box">

                <div id="nav" class="login-nav only-auth">

                    <div class="on" data-type="local" id="local">用户注册</div>

                </div>
                <form class="el-form el-form--label-top" method="post" action="register.php" >
                    <input name="auth_type" type="hidden" value="local"/>
                    <div class="wechat-qrcode" style="margin-top: 20px">

                        <div id="wechat-qrcode"></div>

                    </div>

                    <div class="login-form-item">
                        <div class="el-input user-no">
                            <input  id="number" placeholder="职工号"
                                    type="text" name="username1">
                        </div>
                    </div>
                    <div class="login-form-item">
                        <div class="el-input user-input">
                            <input id="name" placeholder="姓名"
                                   type="text" name="username2">
                        </div>
                    </div>

                    <div class="login-form-item password-field">
                        <div class="el-input email-input">
                            <input id="mailbox" placeholder="邮箱地址" type="email" name="adress">
                        </div>
                    </div>
                    <div class="login-form-item password-field">
                        <div class="el-input password-input">
                            <input  placeholder="密码" id="pw" type="password" name="password1">
                        </div>
                    </div>
                    <div class="login-form-item password-field">
                        <div class="el-input password-input">
                            <input  placeholder="确认密码" id="pw2" type="password" name="confirm_password">
                        </div>
                    </div>
                    <div class="upper-login-field">
                        <div class="remember-field">
                            <span><input type="checkbox" name="remember_cookie" style="vertical-align:baseline;"></span>
                            <span>管理员</span>
                        </div>
                    </div>
                    <div>
                        <br>
                    </div>
                    <input type="submit" name="submit" value="注册">
                    <div>
                        <br>
                    </div>
                    <a href="forget.php">忘记密码</a>
                    <a href="frontlogin.php">立即登录</a>
                </form>
        </div>
    </div>
</div>
</body>

</html>
