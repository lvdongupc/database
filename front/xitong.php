<?php
session_start(); // 启动会话
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
<?php
 $conn = mysqli_connect("localhost", "root", "123456", "james");

 // 检查连接是否成功
 if ($conn === false) {
     die("连接失败: " . mysqli_connect_error());
 }



 ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="#" type="image/png">
        <title>系统消息</title>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">
        <style>
            .message-list {
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            .message-list h2 {
                margin-top: 0;
                font-size: 24px;
                color: #333;
            }

            .message-list ul {
                list-style: none;
                padding: 0;
                margin: 10px 0 0 0;
            }

            .message-list li {
                margin-bottom: 20px;
                display: flex;
            }

            .message-text {
                flex-grow: 1;
                border: 1px solid #ccc;
                padding: 10px;
                border-radius: 5px;
                margin-right: 10px;
            }

            .message-time {
                font-size: 12px;
                color: #999;
                align-self: center;
            }

            .no-message {
                font-size: 18px;
                color: #f00;
                padding: 10px;
            }
            body{
                background-image: url("66.JPG");
                background-size: cover;
                z-index: -1;
                font-family: "Arial Black", sans-serif;
                font-weight: 900;
            }
        </style>
    </head>
    <body >
    <section>
        <div class="left-side sticky-left-side">
            <div >
                <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室预约系统</h3>
            </div>
            <div class="logo-icon text-center">
            </div>
            <div class="left-side-inner">
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <br>
                    <li><a href="index.php"><i class="fa fa-home"></i> <span>首页</span></a></li>
                    <li><a href="message.php"><i class="fa fa-archive"></i> <span>我须留意</span></a></li>
                    <li><a href="search.php"><i class="fa fa-cogs"></i> <span>会议室查询</span></a> </li>
                    <li class="menu-list"><a href="book.php"><i class="fa fa-file-text"></i> <span>我要预约</span></a></li>
                    <li><a href="conferenceall.php"><i class="fa fa-bullhorn"></i> <span>预约情况</span></a> </li>
                    <li><a href="book_list.php"><i class="fa fa-bullhorn"></i> <span>我的预约</span></a> </li>
                    <li><a href="current.php"><i class="fa fa-bullhorn"></i> <span>当前会议</span></a> </li>
                    <li><a href="xitong.php"><i class="fa fa-bullhorn"></i> <span>系统消息</span></a> </li>
                    <li><a href="lun.php"><i class="fa fa-bullhorn"></i> <span>论坛留言</span></a> </li>
                    <li><a href="weather.html"><i class="fa fa-bullhorn"></i> <span>天气预报</span></a> </li>
                </ul>
            </div>
        </div>

        <div >
            <div class="menu-right">
                <ul class="notification-menu">
                    <li> <a href="frontlogin.php" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <img src="images/user.png" alt="" /> 退出登录 <span class="caret"></span> </a></li>
                </ul>
            </div>
        </div>
        <div><br></div>
        <div><br></div>

        <div  style="margin-left: 240px;  min-height: 1000px;" >
            <div class="page-heading">
                <h3 style="color: white">
                    系统消息
                </h3>
                <div class="state-info">
                    <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>					</div>
            </div>

            <div class="wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <section >
                            <header class="panel-heading" style="color: white">
                                会议提醒
                                <span class="tools pull-right"></span>
                            </header>
                        </section>
                    </div>
                </div>
            </div>
            <div class="panel" style="opacity:0.85;background-color: white; padding: 10px; width: 1350px;height: 500px;margin-top: 50px;margin-left: 10px;overflow-y:scroll;">
            <?php
            $sql = "SELECT * FROM message WHERE username='$username'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo '<div class="message-list">';
                echo '<h2>你的消息:</h2>';
                echo '<ul>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>';
                    echo '<div class="message-text" style="  color: #353F4F;">' . $row['m1'] . '</div>';
                    echo '<div class="message-time" style="  color: #353F4F;">' . $row['m2'] . '</div>';
                    echo '</li>';
                }
                echo '</ul>';
                echo '</div>';
            } else {
                echo '<div class="no-message">';
                echo '没有找到消息。';
                echo '</div>';
            }
            ?>
            </div>
            <div id="demo4"></div>
            <footer class="sticky-footer" style="opacity: 0.5;"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
        </div>

    </section>
    </body>
    </html>
 <?php
 mysqli_close($conn);

 ?>