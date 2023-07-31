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
    <title>会议室使用情况</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <style>
        body{
            background-image: url("66.JPG");
            background-size: cover;
            z-index: -1;
            font-family: "Arial Black", sans-serif;
            font-weight: 900;
            color: #6f42c1;
        }
        td {
            color: #353F4F;
        }
    </style>
</head>
<body>
<section>
    <div class="left-side sticky-left-side">
        <div >
            <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室预约系统</h3>
        </div>
        <div class="logo-icon text-center"></div>
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

    <div style="margin-left: 240px;  min-height: 1000px;" >
        <div class="page-heading">
            <h3 style="color: white">
                预约情况
            </h3>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>					</div>
        </div>
        <div><br></div>
        <div class="wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel" style="opacity: 0.85;width: 1350px">
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                                <div class="clearfix"></div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" >
                                    <thead>
                                    <tr>
                                        <th style="width:5%">会议ID</th>
                                        <th style="width:8%">预约者工号</th>
                                        <th style="width:10%">使用原因</th>
                                        <th style="width:10%">会议室</th>
                                        <th style="width:10%">会议日期</th>
                                        <th style="width:10%">会议时间</th>
                                    </tr>
                                    <?php
                                    $sql="SELECT * FROM reservation";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0){// 输出数据
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["reservation_id"] . "</td>";
                                            echo "<td>" . $row["username"] . "</td>";
                                            echo "<td>" . $row["reason"] . "</td>";
                                            echo "<td>" . $row["room_name"] . "</td>";
                                            echo "<td>" . $row["date"] . "</td>";
                                            echo "<td>" . $row["s1"]. '-' .$row["s2"] . "</td>";
                                            echo "<tr>";
                                        }
                                    }
                                    ?>
                                    </thead>
                                    <tbody id="content"></tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="sticky-footer"style="opacity: 0.5;"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
    </div>
</section>
</body>
</html>
<?php
mysqli_close($conn);
?>
