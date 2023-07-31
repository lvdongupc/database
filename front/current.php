<?php
$conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
if ($conn === false) {
    die("连接失败: " . mysqli_connect_error());
}


date_default_timezone_set('Asia/Shanghai'); // 设置时区为亚洲/上海
$currentDate = date('Y-m-d');

date_default_timezone_set('Asia/Shanghai');

// 获取当前时间的小时数
$currentHour = date('H');
$currentHourStr = $currentHour . ':00';


$currentDateTime1 = new DateTime();
$currentDateTime1->modify('+1 hour');
$currentHour1DateTime = $currentDateTime1->format('Y-m-d H:00:00');
$currentHour1Str = date('H:i', strtotime($currentHour1DateTime));

$currentDateTime2 = new DateTime();
$currentDateTime2->modify('+2 hour');
$currentHour2DateTime = $currentDateTime2->format('Y-m-d H:00:00');
$currentHour2Str = date('H:i', strtotime($currentHour2DateTime));

$array = array();
for($i = 0; $i < 12; $i++) {
    $array[$i] = array(0, 0);
}


$sql="SELECT * FROM reservation WHERE date='$currentDate'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $s1=$row['s1'];
        $s2=$row['s2'];
        $room_id=$row['room_id'];
        if($currentHour1Str<=$s1||$currentHourStr>=$s2)
        {
            ;
        }
        else
        {
            $array[$room_id][0]=1;
        }

        if($currentHour2Str<=$s1||$currentHour1Str>=$s2)
        {
            ;
        }
        else
        {
            $array[$room_id][1]=1;
        }
    }
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
    <title>当前会议</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css"/>
    <link rel="stylesheet" href="css/layui.css"/>
    <style>
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
<body >
<section>
    <div class="left-side sticky-left-side">
        <div  >
            <div><br></div>
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
    <div style="margin-left: 240px;  min-height: 1000px;" >
        <div class="page-heading" >
            <h3 style="color: white">
                当前会议
            </h3>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>					</div>
        </div>
        <div><br></div>
        <div class="wrapper" >
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel" style="opacity: 0.85;width: 1350px" >
                        <header class="panel-heading">
                            当前会议室使用情况
                            <span class="tools pull-right"></span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <table class="display table table-bordered" id="hidden-table-info" >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>会议室</th>
                                        <th>所属地址</th>
                                        <th>当前时间段</th>
                                        <th>下一个时间段</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td >会议室1</td>
                                        <td>唐岛湾校区</td>
                                        <?php
                                        if($array[0][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[0][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>会议室2</td>
                                        <td>唐岛湾校区</td>
                                        <?php
                                        if($array[1][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[1][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>会议室3</td>
                                        <td>古镇口校区</td>
                                        <?php
                                        if($array[2][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[2][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>会议室4</td>
                                        <td>唐岛湾校区</td>
                                        <?php
                                        if($array[3][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[3][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>会议室5</td>
                                        <td>古镇口校区</td>
                                        <?php
                                        if($array[4][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[4][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>会议室6</td>
                                        <td>古镇口校区</td>
                                        <?php
                                        if($array[5][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[5][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>会议室7</td>
                                        <td>古镇口校区</td>
                                        <?php
                                        if($array[6][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[6][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>会议室8</td>
                                        <td>北京校区</td>
                                        <?php
                                        if($array[7][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[7][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>会议室9</td>
                                        <td>东营校区</td>
                                        <?php
                                        if($array[8][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[8][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>会议室10</td>
                                        <td>克拉玛依校区</td>
                                        <?php
                                        if($array[9][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[9][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>会议室11</td>
                                        <td>克拉玛依校区</td>
                                        <?php
                                        if($array[10][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[10][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>会议室12</td>
                                        <td>唐岛湾校区</td>
                                        <?php
                                        if($array[11][0]){
                                            echo'<td><span class="label label-danger label-mini">使用中</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }
                                        if($array[11][1]){
                                            echo'<td><span class="label label-danger label-mini">已预约</span></td>';
                                        }
                                        else{
                                            echo' <td><span class="label label-primary label-mini">空闲中</span></td>';
                                        }

                                        ?>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
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