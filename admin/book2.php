<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>跨系预约</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css" />


    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">


</head>

<body class="sticky-header">
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">

            <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室管理系统</h3>
        </div>

        <div class="logo-icon text-center">

        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->

            <!--sidebar nav start-->

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
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <a class="toggle-btn"><i class="fa fa-bars"></i></a>

            <div class="menu-right">
                <ul class="notification-menu">

                    <li> <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <img src="images/user.png" alt="" /> 用户中心 <span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <!-- <li><a data-toggle="modal" href="##myModal1"><i class="fa fa-cog"></i>设置</a> </li> -->
                            <li><a onclick="frontQuit()"><i class="fa fa-sign-out"></i>退出登录</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>

        <div class="page-heading">
            <h3> 跨系会议室预约 </h3>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>					</div>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
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
                                        <input  id="theme" class="form-control" name="subject" type="text"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">使用日期</label>
                                    <div class="col-md-3 col-sm-6">
                                        <input class="form-control" id="test2" type="text"/>
                                        <span id="null1" style="font-size: 12px;">***必填</span>
                                        <script src="js/laydate/laydate.js"></script>
                                        <script>
                                            //执行一个laydate实例
                                            laydate.render({
                                                elem: '#test2' //指定元素
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
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
                                        <input id="num" class="form-control" name="sum" type="text" placeholder="请输入数字"/>
                                    </div>
                                </div>
                                <!-- lst ，数据库预约表还没有是否需要多媒体的字段，将其存放在specialneeds -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">是否需要多媒体</label>
                                    <div class="col-sm-9 icheck ">
                                        <div class="square single-row">
                                            <div class="radio ">
                                                <input tabindex="3" type="radio"  value="不需要"name="demo-radio">
                                                <span>不需要 （默认）</span>
                                            </div>
                                        </div>
                                        <div class="square-red single-row">
                                            <div class="radio ">
                                                <input tabindex="3" type="radio"value="需要"  name="demo-radio" >
                                                <span>需要</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">附注</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea  id="specialneeds" rows="6" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-10 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <button id="othersAppointment" type="button" style="width:100px" class="btn btn-rounded btn-primary mb-5" data-toggle="modal" href="#myModal">预约</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">信息学院会议室预约系统</h4>
                                      </div>
                                      <div class="modal-body">
                                        <h4>预约成功，请按照有关规定使用会议室，祝您使用愉快！</h4>
                                      </div>
                                      <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-primary" type="button">确定</button>
                                      </div>
                                    </div>
                                  </div>
                                </div> -->
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer class="sticky-footer"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
        <!--footer section end-->

    </div>
    <!-- main content end-->
</section>


</body>
</html>
