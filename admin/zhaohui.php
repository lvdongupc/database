<?php

session_start();

if(isset($_POST['submit'])) {


    $conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
    if ($conn === false) {
        die("连接失败: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $adress = $_POST['adress'];
    $password = $_POST['password'];


    $sql = "UPDATE 账户 SET password='$password' WHERE username='$username' AND adress='$adress'";
    $result = mysqli_query($conn, $sql);

// 执行查询


    if (mysqli_affected_rows($conn) == 1) {
        echo '
    <script type="text/javascript">
        var message = "找回成功";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "frontlogin.php?confirm=1";
        } 
    </script>
';
    } else {
        echo '
    <script type="text/javascript">
        var message = "验证失败";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "frontlogin.php?confirm=1";
        } 
    </script>
';
    }







    mysqli_close($conn);


}

?>