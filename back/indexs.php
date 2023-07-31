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
    <title>待审核会议室预约请求</title>
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
    <div class="left-side sticky-left-side">
        <div class="logo">
            <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室管理系统</h3>
        </div>
        <div class="logo-icon text-center"></div>
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
            <h3>
                待审核会议室预约请求
            </h3>
        </div>
        <form id="form" method="post" action="indexs.php">
            <input type="hidden" name="id" id="id" value="">
        </form>
        <?php
        if(isset($_POST['id'])){
            $id=$_POST['id'];
            $sql="SELECT * FROM re WHERE id='$id'";
            $result = mysqli_query($conn, $sql);
            if($result) {
                $row = mysqli_fetch_assoc($result);
                $reason=$row['reason'];
                $date=$row['date'];
                $s1=$row['s1'];
                $s2=$row['s2'];
                $room_name=$row['room_name'];
                $usecount=$row['usecount'];
                $id=$row['id'];
                $username=$row['username'];
            }


            $sql = "SELECT COUNT(*) as count FROM reservation";
            $result = mysqli_query($conn, $sql);
            $count=1;
            if($result) {
                $row = mysqli_fetch_assoc($result);
                $count = $row['count']+1;

            }

            $sql="SELECT * FROM rooms WHERE room_name='$room_name'";
            $result = mysqli_query($conn, $sql);
            if($result){
                $row = mysqli_fetch_assoc($result);
                $room_id=$row['room_id'];
                $cap=$row['cap'];
                $dizhi=$row['dizhi'];
            }

            $sql="INSERT INTO reservation(reservation_id,room_id,username,s1,s2,date,room_name,dizhi,cap,reason) VALUES ('$count','$room_id','$username','$s1','$s2','$date','$room_name','$dizhi','$cap','$reason')";

            if (mysqli_query($conn, $sql)) {
                ;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            $sql="DELETE FROM re WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
                ;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        }
        ?>
        <div class="wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel" style="opacity: 0.85;width: 1350px;height: 700px">
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                                <div class="clearfix"></div>
                                <div class="space15"></div>
                                <div><br></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead >
                                    <tr >
                                        <th style="width:8%">预约者姓名</th>
                                        <th style="width:10%">会议室名称</th>
                                        <th style="width:10%">预约原因</th>
                                        <th style="width:10%">会议时间</th>
                                        <th style="width:8%">参会人数</th>
                                        <th style="width:8%">id</th>
                                        <th style="width:8%">审核</th>
                                    </tr>
                                    <?php
                                    $sql="SELECT * FROM re";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0){// 输出数据
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["username"] . "</td>";
                                            echo "<td>" . $row["room_name"] . "</td>";
                                            echo "<td>" . $row["reason"] . "</td>";
                                            echo "<td>" . $row["date"] . '-'. $row["s1"]. '-' .$row["s2"] ."</td>";
                                            echo "<td>" . $row["usecount"] . "</td>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td><button onclick=\"submitForm(" . $row["id"] . ")\">通过</button></td>";
                                            echo "<tr>";
                                        }
                                    }
                                    ?>
                                    </thead>
                                    <tbody id="content">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="sticky-footer"style="opacity: 0.5;">  2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
    </div>
</section>
<script>
    function showForm(){
        document.getElementById("tin").style.display="block";
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
