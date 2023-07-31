<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>公告发布</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <style>
        input[type=submit] {
            display: inline-block;
            line-height: 1;
            white-space: nowrap;
            cursor: pointer;
            background: #fff;
            border: 1px solid #dcdfe6;
            color: #606266;
            -webkit-appearance: none;
            text-align: center;
            box-sizing: border-box;
            outline: 0;
            transition: .1s;
            font-weight: 500;
            border-radius: 4px;
            height: 60px;
            width: 100px;
            margin-left: 1100px;
        }
        body{
            background-image: url("ui.JPG");
            background-size: cover;
            z-index: -1;
            font-family: "Arial Black", sans-serif;
            font-weight: 900;
            color: #6f42c1;
        }
        td{
            color: #88be14;
        }
    </style>
</head>
<body >
<section>
    <div class="left-side sticky-left-side">
        <div class="logo">
            <h3 style="color: white" >&nbsp;&nbsp;&nbsp;会议室管理系统</h3>
        </div>
        <div class="logo-icon text-center">
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <br>
                <li><a href="indexs.php"><i class="fa fa-home"></i> <span>会议室审核</span></a></li>
                <li><a href="room.php"><i class="fa fa-building-o"></i> <span>会议室管理</span></a></li>
                <li><a href="users.php"><i class="fa fa-users"></i> <span>用户管理</span></a></li>
                <li><a href="publish.php"><i class="fa fa-comment-o"></i> <span>信息发布</span></a></li>
                <li><a href="message.php"><i class="fa fa-archive"></i> <span>信息管理</span></a></li>
                <li><a href="luntan.php"><i class="fa fa-archive"></i> <span>论坛热度</span></a></li>
                <li><a href="book_list.php"><i class="fa fa-bullhorn"></i> <span>预约情况</span></a> </li>
                <li><a href="analyze.php"><i class="fa fa-tasks"></i> <span>数据统计</span></a></li>
                <li><a href="ana.php"><i class="fa fa-tasks"></i> <span>数据分析</span></a></li>
            </ul>
        </div>
    </div>
    <div >
        <div class="menu-right">
            <ul class="notification-menu">
                <li> <a href="../front/frontlogin.php" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <img src="images/user.png" alt="" /> 退出登录 <span class="caret"></span> </a></li>
            </ul>
        </div>
    </div>
    <div><br></div>
    <div><br></div>
    <div style="margin-left: 240px;  min-height: 1000px;" >
        <div class="page-heading">
            <h3 style="margin-left: 10px">
                我须留意
            </h3>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel" style="opacity: 0.85;width: 1350px">
                        <header class="panel-heading">
                            <form action="publisher.php" method="post">
                            <label for="exampleInputEmail1" style="color:  #0f6674">标题</label>
                            <input type="text" class="form-control" name="title">
                            <label style="margin-top:20px ;color:  #0f6674" for="exampleInputPassword1">作者</label>
                            <input type="text" class="form-control" name="author">
                            <label style="margin-top:20px;color:  #0f6674" for="name">消息内容</label>
                            <input type="text" class="form-control" name="message">
                                <div>
                                    <br>
                                </div>
                                <input type="submit" name="submit" value="发布" style="margin-left: 1220px; color:white;background-color:  #424f63">
                            </form>
                        </header>
                    </section>
                </div>
            </div>
        </div>
        <footer class="sticky-footer" style="opacity: 0.5"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋   </footer>
    </div>
</section>
</body>
</html>
