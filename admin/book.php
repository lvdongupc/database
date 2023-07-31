<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>本系预约</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>
<body class="sticky-header">
<section>
    <div class="left-side sticky-left-side">
        <div class="logo">
            <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室管理系统</h3>
        </div>
        <div class="logo-icon text-center">
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <br>
                <li><a href="index.php"><i class="fa fa-home"></i> <span>首页</span></a></li>
                <li><a href="message.php"><i class="fa fa-archive"></i> <span>我须留意</span></a></li>
                <li><a href="search.php"><i class="fa fa-cogs"></i> <span>会议室查询</span></a> </li>
                <!-- <li><a href="book.html"><i class="fa fa-file-text"></i> <span>我要预约</span></a> </li> -->
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
                    <li> <a href="frontlogin.php" class="btn btn-default dropdown-toggle" > <img src="images/user.png" alt="" /> 退出登录 <span class="caret"></span> </a></li>
                </ul>
            </div>
        </div>
        <div class="page-heading">
            <h3> 本系会议室预约 </h3>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            </div>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading"> 预约信息 <span class="tools pull-right">
				</span>
                        </header>
                        <div class="panel-body">
                            <form action="#" class="form-horizontal ">
                                <div class="form-group">
                                    <label class="control-label col-md-3">使用原因</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="theme" value="" placeholder="默认无原因" class="form-control" name="subject" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">使用日期</label>
                                    <div class="col-md-3 col-sm-6">
                                        <input class="form-control" id="test2" type="text"/>
                                        <span id="null1" style="font-size: 12px;">***必填</span>
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label class="control-label col-md-3">使用时间段</label>
                                    <div class="timee"><!--  style="position: relative;" -->
                                        <div class="col-md-3 col-sm-6" style="width: 180px;">
                                            <select class="form-control m-bot15"  id="starttime">
                                                <option>请选择开始时间</option>
                                                <option>8:00</option>
                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>

                                            </select>
                                            <span id="null2" style="font-size: 12px;">***必填</span>
                                        </div>
                                        <!-- <span >------</span> -->
                                        <div class="col-md-3 col-sm-6" style="width: 180px;">
                                            <select class="form-control m-bot15" id="endtime">
                                                <option>请选择结束时间</option>

                                                <option>9:00</option>
                                                <option>10:00</option>
                                                <option>11:00</option>
                                                <option>12:00</option>
                                                <option>13:00</option>
                                                <option>14:00</option>
                                                <option>15:00</option>
                                                <option>16:00</option>
                                                <option>17:00</option>
                                                <option>18:00</option>
                                            </select>
                                            <span id="null3" style="font-size: 12px;">***必填</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">会议室选择</label>
                                    <div class="col-md-3 col-sm-6">
                                        <select class="form-control m-bot15" id="room">
                                            <option>请选择会议室</option>
                                        </select>
                                        <span id="null4" style="font-size: 12px;">***必填</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">使用人数</label>
                                    <div class="col-md-2 col-sm-6">
                                        <input id="num" value="" class="form-control" name="sum" type="text" placeholder="请输入数字"/>
                                    </div>
                                </div>

                                <div class="col-lg-10 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <button id="ownerAppointment" type="button" style="width:100px" class="btn btn-rounded btn-primary mb-5" data-toggle="modal" href="#myModal">预约</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="sticky-footer"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋</footer>->
    </div>
</section>



</body>
</html>
