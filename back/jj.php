<?php
$conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
if ($conn === false) {
    die("连接失败: " . mysqli_connect_error());
}
$sql="SELECT COUNT(*) as count FROM shang ";
$result = mysqli_query($conn, $sql);
$count1=0;
$count2=0;
$count3=0;

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $count1 = $row["count"];
} else {
    $count1=0;
}

$sql="SELECT COUNT(*) as count FROM xia ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $count2 = $row["count"];
} else {
    $count2=0;
}

$sql="SELECT COUNT(*) as count FROM reservation ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $count3 = $row["count"];
} else {
    $count3=0;
}

$data['上午'] = $count1;
$data['下午'] = $count2;
$data['上午-下午'] = $count3-$count2-$count1;
echo json_encode($data);
mysqli_close($conn);


?>