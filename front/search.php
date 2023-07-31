<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>空闲会议室查询</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <style>
        input[type=submit] {
            display: inline-block;
            line-height: 1;
            white-space: nowrap;
            cursor: pointer;
            background:  #424f63;
            border: 1px solid #dcdfe6;

            -webkit-appearance: none;
            text-align: center;
            box-sizing: border-box;
            outline: 0;
            transition: .1s;
            font-weight: 500;
            border-radius: 4px;
            height: 60px;
            width: 100px;
        }
        body{
            background-image: url("66.JPG");
            background-size: cover;
            z-index: -1;
            font-family: "Arial Black", sans-serif;
            font-weight: 900;
            color: #6f42c1;
        }
        td{
            color: #353F4F;
        }
    </style>
</head>
<body>
<section>
    <div class="left-side sticky-left-side">
        <div class="logo">
            <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室预约系统</h3>
        </div>
        <div class="logo-icon text-center"> </div>
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
            <h3 style="color: white"> 会议室查询 </h3>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            </div>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section >
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-6 col-xs-11" style="width: 30%;">
                                    <form action="search.php", method="post">
                                    <input  id="test2" placeholder="请选择日期" type="text" style="width: 200px; margin-left: -30px" name="time">
                                    <input type="submit" name="submit" value="开始查询" style="color: white;">
                                    </form>
                                </div>
                            </div>
                    </section>
                    <section class="panel" style="opacity: 0.85;height: 620px;width: 1350px">
                        <header class="panel-heading"> 会议室已占用查询结果 </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                    <tr>
                                        <th>会议室</th>
                                        <th>地址</th>
                                        <th>容量</th>
                                        <th>占用情况</th>
                                    </tr>
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "123456", "james");

                                    // 检查连接是否成功
                                    if ($conn === false) {
                                        die("连接失败: " . mysqli_connect_error());
                                    }
                                    if(isset($_POST['submit'])) {
                                        $time = $_POST['time'];
                                        if ($time != null) {
                                            $sql = "SELECT * FROM reservation WHERE '$time'=date";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {// 输出数据
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["room_name"] . "</td>";
                                                    echo "<td>" . $row["dizhi"] . "</td>";
                                                    echo "<td>" . $row["cap"] . "</td>";
                                                    echo "<td>" . $row["s1"]. '-' .$row["s2"] . "</td>";
                                                    echo "<tr>";
                                                }
                                            }
                                        }
                                    }


                                    ?>
                                    </thead>
                                    <tbody id="searchshow">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="demo4"></div>
        <footer class="sticky-footer"style="opacity: 0.5;"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
    </div>
</section>
</body>
</html>
