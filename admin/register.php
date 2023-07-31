<?php
// 开始会话
session_start();

// 处理提交的表单
if(isset($_POST['submit'])){
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $confirm_password = $_POST['confirm_password'];
    $adress = $_POST['adress'];

    // 检查两次输入的密码是否相符
    if($password1 !== $confirm_password){


        echo '
    <script type="text/javascript">
        var message = "密码有误,请再次尝试";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "frontregister.php?confirm=1";
        } 
    </script>
';
    }
    else if($password1==null||$username1==null||$confirm_password==null||$adress==null)
    {
        echo '
    <script type="text/javascript">
        var message = "输入为空,请再次尝试";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "frontregister.php?confirm=1";
        } 
    </script>';
    }
    else
    {
        $conn = mysqli_connect("localhost", "root", "123456", "james");

        // 检查连接是否成功
        if ($conn === false) {
            die("连接失败: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO 账户 (username,  password, adress) VALUES ('$username1',  '$password1', '$adress')";


        if (mysqli_query($conn, $sql)) {
            echo "新记录插入成功";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }



        mysqli_close($conn);

        echo '
    <script type="text/javascript">
        var message = "账户创建成功";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "frontlogin.php?confirm=1";
        } 
    </script>';


    }
}
?>