<?php
// 标准的用户名和密码

// 开始会话
session_start();

// 处理提交的表单
if(isset($_POST['submit'])){

    // 连接到数据库
    $conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
    if ($conn === false) {
        die("连接失败: " . mysqli_connect_error());
    }

// 编写SQL查询语句
    $sql = "SELECT username, password,governer FROM 账户";

// 执行查询
    $result = mysqli_query($conn, $sql);

// 如果查询结果不为空，则遍历结果集并处理数据

    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;


    if (mysqli_num_rows($result) > 0)
    {// 输出数据
        while($row = mysqli_fetch_assoc($result)) {
            $standard_username = $row["username"];
            $standard_password = $row["password"];
            $sb = $row["governer"];
            if ($username === $standard_username && $password === $standard_password) {
                // 设置会话变量并重定向到主页面
                $_SESSION['username'] = $username;

               if($sb=="否"){header('location: index.php');}
               else {header('location: ../back/indexs.php');}

            }
        }
    }


// PHP代码
    echo '
    <script type="text/javascript">
        var message = "账户和密码不一致";
        if (confirm(message)) {
            // 用户点击了确认按钮
            window.location.href = "frontlogin.php?confirm=1";
        } 
    </script>
';


// 关闭连接
    mysqli_close($conn);


    // 检查凭据是否正确

}
?>



