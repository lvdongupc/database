<?php

session_start();
// 创建数据库连接
$conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
if ($conn === false) {
    die("连接失败: " . mysqli_connect_error());
}

// 从表单中获取数据
$username=$_SESSION['username'];
$start_date = $_POST['start-date'];
$start_time = $_POST['start-time'];
$end_time = $_POST['end-time'];
$room = $_POST['room'];

if($start_time==1)
{
    $start_time="上午";
}
else if($start_time==2)
{
    $start_time="下午";
}
else if($start_time==3)
{
    $start_time="晚上";
}
if($end_time==1)
{
    $end_time="上午";
}
else if($end_time==2)
{
    $end_time="下午";
}
else if($end_time==3)
{
    $end_time="晚上";
}

$sql="SELECT s1,s2 FROM reservation WHERE date='$start_date'AND room_id=$room";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    echo '
    <script type="text/javascript">
        var message = "已被预约";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "govern.php?confirm=1";
        } 
    </script>
';
}
else
{
    $sql = "SELECT COUNT(*) as count FROM reservation";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = $row['count'];
    $count++;
    $sql="INSERT INTO reservation VALUES ($count,$room,'$username','$start_time','$end_time','$start_date')";
    if (mysqli_query($conn, $sql)) {
        header('location: govern.php');
    } else {
        echo '
    <script type="text/javascript">
        var message = "插入失败";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "govern.php?confirm=1";
        } 
    </script>
';
    }

}

// 在数据库中插入新纪录



$conn->close();
?>



