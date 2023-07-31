<?php

if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $author = $_POST['author'];
  $message = $_POST['message'];

    $conn = mysqli_connect("localhost", "root", "123456", "james");

    // 检查连接是否成功
    if ($conn === false) {
        die("连接失败: " . mysqli_connect_error());
    }

    if($title!=null&&$author!=null&&$message!=null){
        date_default_timezone_set('Asia/Shanghai');
        $current_time = date('Y-m-d H:i:s');
        $sql = "SELECT MAX(id) AS max_value FROM 留意;"; // 将 column_name 和 table_name 替换为实际的列名和表名

        $result = mysqli_query($conn, $sql);

// 检查是否查询成功
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $row = mysqli_fetch_assoc($result);
        $count = $row['max_value']+1;

        $sql="INSERT INTO 留意 VALUES ('$title', '$author','$message','$current_time','$count')";
        if (mysqli_query($conn, $sql)) {
            header('location:publish.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);

}
?>