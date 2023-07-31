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
        <title>系统消息</title>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">
        <style>
            .message-list {
                padding: 10px;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            .message-list h2 {
                margin-top: 0;
                font-size: 24px;
                color: #333;
            }

            .message-list ul {
                list-style: none;
                padding: 0;
                margin: 10px 0 0 0;
            }

            .message-list li {
                margin-bottom: 20px;
                display: flex;
            }

            .message-text {
                flex-grow: 1;
                border: 1px solid #ccc;
                padding: 10px;
                border-radius: 5px;
                margin-right: 10px;
            }

            .message-time {
                font-size: 12px;
                color: #999;
                align-self: center;
            }

            .no-message {
                font-size: 18px;
                color: #f00;
                padding: 10px;
            }
            body{
                background-image: url("66.JPG");
                background-size: cover;
                z-index: -1;
                font-family: "Arial Black", sans-serif;
                font-weight: 900;
            }
            #form-overlay {
                display:none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            #form-container {
                display:none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 1000;
                background-color: #fff;
                padding: 20px;
                box-shadow: 0px 0px 10px rgba(0,0,0,.3);
            }
            td{
                color: #353F4F;
            }
            th{
                 color: #6f42c1;
            }
        </style>
    </head>
    <body >
    <section>
        <div class="left-side sticky-left-side">
            <div >
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

        <div  style="margin-left: 240px;  min-height: 1000px;" >
            <div class="page-heading">
                <h3 style="color: white">
                    石大论坛
                </h3>
                <div class="state-info">
                    <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>					</div>
            </div>

            <button onclick="showForm()" style="margin-left: 15px;width: 60px;height: 40px">发帖</button>
            <div id="form-overlay"></div>
            <div id="form-container">
                <form style="width: 300px;height: 150px" method="post" action="lun.php">
                    <label for="name">姓名:</label>
                    <input type="text" id="name" name="name"><br><br>
                    <label for="email">内容:</label>
                    <input type="text" id="email" name="email"><br><br>
                    <input type="submit" value="提交" name="submit">
                </form>
                <button onclick="hideForm()">关闭</button>
            </div>
            <?php
            if(isset($_POST['submit'])) {

                date_default_timezone_set('Asia/Shanghai');
                $current_time = date('Y-m-d H:i:s');
                $zan=0;
                $message=$_POST['email'];
                 $ff=$username;
                $sql = "SELECT COUNT(*) as count FROM lun";
                $result = mysqli_query($conn, $sql);
                $count=1;
                if($result) {
                    $row = mysqli_fetch_assoc($result);
                    $count = $row['count']+1;

                }
                if($count!=null&&$current_time!=null&&$ff!=null&&$message!=null) {
                    $sql = "INSERT INTO lun VALUES ('$message','$ff','$zan','$current_time','$count')";
                    if (mysqli_query($conn, $sql)) {
                        ;
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }

            }
            else
            {
                ;
            }
            ?>

            <div class="page-heading">
                <h3 style="margin-left: 0px ;color: white;font-size: 15px">
                    帖子详情:
                </h3>
            </div>

            <form id="form" method="post" action="lun.php">
                <input type="hidden" name="id" id="id" value="">
            </form>
            <?php
            if(isset($_POST['id'])) {

                $id = $_POST['id'];
                if($id!=null) {
                    $sql = "UPDATE lun SET zan=zan+1 WHERE id='$id'";
                    if (mysqli_query($conn, $sql)) {
                        ;
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }


            }
            ?>
            <div class="wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel" style="margin-left: -15px;opacity: 0.85;height: 600px;width: 1350px">
                            <div class="panel-body">
                                <div class="adv-table editable-table ">
                                    <div class="clearfix"></div>
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" >
                                        <thead>
                                        <tr>
                                            <th style="width:5%">发布者</th>
                                            <th style="width:8%">发布时间</th>
                                            <th style="width:10%">发布内容</th>
                                            <th style="width:5%">点赞数</th>
                                            <th style="width:5%">操作</th>
                                        </tr>
                                        <?php
                                        $sql="SELECT * FROM lun";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0){// 输出数据
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row["username"] . "</td>";
                                                echo "<td>" . $row["time"] . "</td>";
                                                echo "<td>" . $row["message"] . "</td>";
                                                echo "<td>" . $row["zan"] . "</td>";
                                                echo "<td><button onclick=\"submitForm(" . $row["id"] . ")\">点赞</button></td>";
                                                echo "<tr>";
                                            }
                                        }
                                        ?>
                                        </thead>
                                        <tbody id="content"></tbody>
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
    <script>
        var schedule = <?php echo json_encode($username); ?>;
        var nameInput = document.getElementById("name");
        nameInput.value = schedule; // 将姓名输入框的值设为"John Doe"
        nameInput.disabled = true; // 将姓名输入框设为只读，禁止用户在输入框中输入其他值
    </script>
    <script>
        var formOverlay = document.getElementById("form-overlay");
        var formContainer = document.getElementById("form-container");

        function showForm() {
            formOverlay.style.display = "block";
            formContainer.style.display = "block";
        }

        function hideForm() {
            formOverlay.style.display = "none";
            formContainer.style.display = "none";
        }
    </script>
    <script>
        function submitForm(id) {
            document.getElementById("id").value = id;
            document.getElementById("form").submit();
        }
    </script>
    </body>
    </html>
<?php
mysqli_close($conn);

?>