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
</head>
<body class="sticky-header">
<section>
    <div class="left-side sticky-left-side">
        <div class="logo">
            <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室管理系统</h3>
        </div>
        <div class="logo-icon text-center"> </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <br>
                <li><a href="index.php"><i class="fa fa-home"></i> <span>首页</span></a></li>
                <li><a href="message.php"><i class="fa fa-archive"></i> <span>我须留意</span></a></li>
                <li><a href="search.php"><i class="fa fa-cogs"></i> <span>会议室查询</span></a> </li>
                <li class="menu-list"><a href="book.php"><i class="fa fa-file-text"></i> <span>我要预约</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="book.php">本系预约</a></li>
                        <li><a href="book2.php">跨系预约</a></li>
                    </ul>
                </li>
                <li><a href="conferenceall.php"><i class="fa fa-bullhorn"></i> <span>预约情况</span></a> </li>
                <li><a href="book_list.php"><i class="fa fa-bullhorn"></i> <span>我的预约</span></a> </li>
            </ul>
        </div>
    </div>
    <div class="main-content" >
        <div class="header-section">
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <div class="menu-right">
                <ul class="notification-menu">
                    <li> <a href="frontlogin.php" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <img src="images/user.png" alt="" /> 退出登录 <span class="caret"></span> </a></li>
                </ul>
            </div>
        </div>
        <div class="page-heading">
            <h3> 会议室查询 </h3>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            </div>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-6 col-xs-11" style="width: 30%;">
                                    <input class="form-control" id="test2" placeholder="请选择日期" type="text" style="width: 200px;"/>
                                    <a class="btn btn-primary" style="position: absolute; margin-left: 200px; margin-top: -34px;" id="bt">开始查询</a>

                                </div>
                            </div>
                            <div class="panel-body" id="show1" style="display: none;">
                                <div class="adv-table editable-table ">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                        <thead>
                                        <tr>
                                            <th>会议ID</th>
                                            <th>会议室</th>
                                            <th>所属系别</th>
                                            <th>占用时间</th>
                                        </tr>
                                        </thead>
                                        <tbody id="searchshow1">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="panel">
                        <header class="panel-heading"> 空闲会议室查询结果 </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                    <tr>
                                        <th>会议室</th>
                                        <th>地址</th>
                                        <th>容量</th>
                                        <th>所属系别</th>
                                        <th>本系预约</th>
                                        <th>跨系预约</th>
                                        <th>备注</th>
                                    </tr>
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
        <footer class="sticky-footer"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
    </div>
</section>
</body>
</html>
