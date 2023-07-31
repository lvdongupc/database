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
    <title>用户管理</title>
    <link href="css/table-responsive.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <style>
        input[type=submit] {
            display: inline-block;
            line-height: 1;
            white-space: nowrap;
            cursor: pointer;
            background: #fff;
            border: 1px solid #dcdfe6;
            color: #606266;
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
            background-image: url("ui.JPG");
            background-size: cover;
            z-index: -1;
            font-family: "Arial Black", sans-serif;
            font-weight: 900;
            color: #6f42c1;
        }
        td{
            color:  #0f6674;
        }
    </style>
</head>
<body >
<section>
    <div class="left-side sticky-left-side" >
        <div class="logo">
            <h3 style="color: white ">&nbsp;&nbsp;&nbsp;会议室管理系统</h3>
        </div>
        <div class="logo-icon text-center">
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <br>
                <li><a href="indexs.php"><i class="fa fa-home"></i> <span>会议室审核</span></a></li>
                <li><a href="room.php"><i class="fa fa-building-o"></i> <span>会议室管理</span></a></li>
                <li><a href="users.php"><i class="fa fa-users"></i> <span>用户管理</span></a></li>
                <li><a href="publish.php"><i class="fa fa-comment-o"></i> <span>信息发布</span></a></li>
                <li><a href="message.php"><i class="fa fa-archive"></i> <span>信息管理</span></a></li>
                <li><a href="luntan.php"><i class="fa fa-archive"></i> <span>论坛热度</span></a></li>
                <li><a href="book_list.php"><i class="fa fa-bullhorn"></i> <span>预约情况</span></a> </li>
                <li><a href="analyze.php"><i class="fa fa-tasks"></i> <span>数据统计</span></a></li>
                <li><a href="ana.php"><i class="fa fa-tasks"></i> <span>数据分析</span></a></li>
            </ul>
        </div>
    </div>
    <div >
        <div class="menu-right">
            <ul class="notification-menu">
                <li> <a href="../front/frontlogin.php" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <img src="images/user.png" alt="" /> 退出登录 <span class="caret"></span> </a></li>
            </ul>
        </div>
    </div>
    <div><br></div>
    <div><br></div>
    <div style="margin-left: 240px;  min-height: 1000px;" >
        <div class="page-heading">
            <h3 style="margin-left: 10px">
                用户管理
            </h3>
        </div>

        <div class="wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel" style="opacity: 0.85;width: 1350px">
                        <div class="panel-body" style="padding-bottom:40px">
                            <div class="adv-table editable-table ">
                                <div class="clearfix">
                                    <div class="btn-group">
                                        <input style="color: white;background-color: #4DC7A0" type="submit" name="submit" value="添加用户" onclick="showForm()">
                                    </div>
                                    <div>
                                        <br>
                                    </div>
                                    <form  style="display: none" method="post" action="users.php" id = "tj">
                                        <input  id="number" placeholder="教职工号" type="text" name="username1">
                                        &nbsp;&nbsp;
                                        <input  placeholder="密码" id="pw" type="password" name="password1">
                                        &nbsp;&nbsp;
                                        <input id="mailbox" placeholder="邮箱" type="email" name="adress">
                                        &nbsp;&nbsp;
                                        <input id="name" placeholder="姓名" type="text" name="username2">
                                        &nbsp;&nbsp;
                                        <input id="sf" placeholder="是否为管理员" type="text" name="sf">
                                        &nbsp;&nbsp;
                                        <input type="submit" name="submit" value="提交">
                                    </form>
                                    <?php
                                    if(isset($_POST['submit'])) {

                                        $username1 = $_POST['username1'];
                                        $password1 = $_POST['password1'];
                                        $adress = $_POST['adress'];
                                        $username2 = $_POST['username2'];
                                        $sf = $_POST['sf'];
                                        if($username1!=null&&$password1!=null&&$adress!=null&&$username2!=null&&$sf!=null) {
                                            $sql = "INSERT INTO 账户 (username,  password, adress,governer,name) VALUES ('$username1',  '$password1', '$adress','$sf','$username2')";
                                            if (mysqli_query($conn, $sql)) {
                                                ;
                                            } else {
                                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                            }
                                        }
                                    }
                                    ?>
                                    <div>
                                        <br>
                                    </div>
                                </div>
                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                    <tr>
                                        <th style="width:12%">教职工号</th>
                                        <th style="width:12%">密码</th>
                                        <th style="width:7%">邮箱</th>
                                        <th style="width:15%">姓名</th>

                                    </tr>
                                    <?php

                                    $sql="SELECT * FROM 账户";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0){// 输出数据
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["username"] . "</td>";
                                            echo "<td>" . $row["password"] . "</td>";
                                            echo "<td>" . $row["adress"] . "</td>";
                                            echo "<td>" . $row["name"] . "</td>";
                                            echo "<tr>";
                                        }
                                    }
                                    ?>

                                    </thead>
                                    <tbody class="bo"></tbody>
                                </table>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


        <footer class="sticky-footer" style="opacity: 0.5"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋  </footer>
    </div>
</section>
<script>
    function showForm(){
        document.getElementById("tj").style.display="block";
    }

</script>
</body>
</html>
<?php
mysqli_close($conn);
?>
