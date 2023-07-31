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
    <title>预约</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-fileupload.min.css" />
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

        }
        td{
            color: #353F4F;
        }
    </style>
</head>
<body >
<section>
    <div class="left-side sticky-left-side" >
        <div class="logo" >
            <h3 style="color: white ">&nbsp;&nbsp;&nbsp;会议室预约系统</h3>
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
    <div style="margin-left: 240px;  min-height: 1000px;" >
        <div class="page-heading">
            <h3 style="color: white"> 会议室预约 </h3>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            </div>
        </div>
        <div><br></div>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel" style="opacity: 0.85">
                        <header class="panel-heading"> 预约信息 <span class="tools pull-right"></span></header>
                        <div class="panel-body">
                            <form action="book.php" class="form-horizontal " method="post" style="width: 1350px;height: 600px">
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="color:black;">使用原因</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input id="theme" value="" placeholder="原因" class="form-control" name="subject" type="text"/>
                                    </div>
                                    <div><br></div>
                                    <div><br></div>
                                    <div><br></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3"style="color:black;">使用日期</label>
                                    <div class="col-md-3 col-sm-6">
                                        <input class="form-control" id="test2" type="text"name="date"/>
                                        <span id="null1" style="font-size: 12px;">***必填</span>
                                    </div>
                                </div>
                                <div><br></div>
                                <div class="form-group" >
                                    <label class="control-label col-md-3"style="color:black;">使用时间段</label>
                                    <div class="timee">
                                        <div class="col-md-3 col-sm-6" style="width: 180px;">
                                            <select class="form-control m-bot15"  id="starttime" name="s1">
                                                <option>请选择开始时间</option>
                                                <option>08:00</option>
                                                <option>09:00</option>
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
                                        <div class="col-md-3 col-sm-6" style="width: 180px;">
                                            <select class="form-control m-bot15" id="endtime" name="s2">
                                                <option>请选择结束时间</option>
                                                <option>09:00</option>
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
                                <div><br></div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="color:black;">会议室选择</label>
                                    <div class="col-md-3 col-sm-6">
                                        <input type="text" placeholder="会议室" name="hui" class="form-control"/>
                                        <span id="null4" style="font-size: 12px;">***必填</span>
                                    </div>
                                </div>
                                <div><br></div>
                                <div><br></div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" style="color:black;">使用人数</label>
                                    <div class="col-md-2 col-sm-6">
                                        <input id="num" value="" class="form-control" name="sum" type="text" placeholder="请输入数字"/>
                                    </div>
                                </div>

                                <div class="col-lg-10 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center>
                                                <input type="submit" name="submit" value="预约" style="color: white;margin-left: 800px">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['submit'])){
                             $subject = $_POST['subject'];
                             $date = $_POST['date'];
                             $s1 = $_POST['s1'];
                             $s2 = $_POST['s2'];
                             $hui = $_POST['hui'];
                             $sum = $_POST['sum'];
                                $flag=false;
                             $bb=intval($sum);
                             $sql="SELECT * FROM rooms WHERE room_name='$hui'";
                             $result = mysqli_query($conn, $sql);
                             if($result){
                                 $row = mysqli_fetch_assoc($result);
                                 $aa=intval($row['cap']);
                                 if($aa<$bb)
                                 {
                                     $flag=true;
                                     echo '
    <script type="text/javascript">
        var message = "人数超出限制";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "book.php?confirm=1";
        } 
    </script>
';
                                 }
                             }

                                $xx = intval(substr($s1, 0, 2)) * 60 + intval(substr($s1, 3, 2));
                                $yy = intval(substr($s2, 0, 2)) * 60 + intval(substr($s2, 3, 2));


                             $sql="SELECT * FROM reservation WHERE date='$date' AND room_name='$hui'";
                             $result = mysqli_query($conn, $sql);
                             if($result){

                                 while( $row = mysqli_fetch_assoc($result)){
                                             $s3=$row['s1'];
                                             $s4=$row['s2'];
                                     $x = intval(substr($s3, 0, 2)) * 60 + intval(substr($s3, 3, 2));
                                     $y = intval(substr($s4, 0, 2)) * 60 + intval(substr($s4, 3, 2));
                                             if($y<=$xx){
                                                 ;
                                             }
                                             else if($x>=$yy)
                                             {
                                                 ;
                                             }
                                             else
                                             {
                                                 $flag=true;
                                             }
                                 }
                             }
                             else
                             {
                                 echo("sb");
                             }
                             if($flag==true||$xx>$yy){
                                 echo '
    <script type="text/javascript">
        var message = "时间有冲突";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "book.php?confirm=1";
        } 
    </script>
';
                             }

                             if($subject!=null&&$date!=null&&$s1!=null&&$s2!=null&&$hui!=null&&$sum!=null&&$flag==false)
                             {
                                 $sql = "SELECT MAX(id) AS max_value FROM re;"; // 将 column_name 和 table_name 替换为实际的列名和表名

                                 $result = mysqli_query($conn, $sql);

// 检查是否查询成功
                                 if (!$result) {
                                     die("Query failed: " . mysqli_error($conn));
                                 }

                                 $row = mysqli_fetch_assoc($result);
                                 $count = $row['max_value']+1;

                                 $sql="INSERT INTO re VALUES ('$subject','$date','$s1','$s2','$hui','$sum','$count',$username)";

                                 if (mysqli_query($conn, $sql)) {
                                    ;
                                 } else {
                                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                 }
                             }
                            }
                            ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="sticky-footer"  style="opacity: 0.5;"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋</footer>->
    </div>
</section>
</body>
</html>
<?php
mysqli_close($conn);
?>

