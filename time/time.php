
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" type="text/css" href="/lvdong/css/hh.css"/>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .calendar {
            width: 560px;
            height: 420px;
            margin: 100px auto;
            font-family: "微软雅黑";
            margin-left: 50px;
        }

        .title {
            width: 560px;
            height: 210px;
            background: #1abc9c;
            position: relative;
            text-align: center;
        }

        .title #left {
            width: 60px;
            height: 210px;
            color: #ffffff;
            position: absolute;
            text-decoration: none;
            left: 0px;
            margin-top: 0px;
            text-align: center;
            line-height: 210px;
        }

        .title #right {
            width: 60px;
            height: 210px;
            color: #ffffff;
            position: absolute;
            text-decoration: none;
            right: 0px;
            margin-top: 0px;
            text-align: center;
            line-height: 200px;
        }

        .title #left:hover {
            background-color: #FFA500;
        }

        .title #right:hover {
            background-color: #FFA500;
        }

        .title #now {
            position: absolute;
            top: 50%;
            margin-top: -20px;
            margin-left: -40px;
            color: #ffffff;
        }

        .week {
            width: 80px;
            height: 30px;
            background-color: #dddddd;
            color: #888d91;
            float: left;
            text-align: center;
            line-height: 30px;
        }

        .day {
            width: 80px;
            height: 30px;
            background-color: #eeeeee;
            color: #8f8d99;
            float: left;
            text-align: center;
            line-height: 30px;
        }
        a{
            color: black;
            text-decoration: none;
        }
        table {
            width: 700px;
            border-collapse: collapse;
            margin-bottom: 20px;
            float: right;
            margin-right: 100px;
            margin-top: -500px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            font-weight: bold;
        }

        td.available {
            background-color: #82e0aa;
        }

        td.booked {
            background-color: #e74c3c;
            color: white;
        }
        .reserved {
            background-color: green;
            color: white;
            font-weight: bold;
        }

        .vacant {
            background-color: gray;
            color: white;
            font-weight: bold;
        }

        .disabled {
            background-color: red;
            color: white;
            font-weight: bold;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            background-image: url("../admin/image/1.jpg");
            background-size: cover;
        }

    </style>
</head>

<body>
&nbsp &nbsp
<a href="govern.php">会议管理</a>
<div class="calendar">
    <!--显示日期部分-->
    <div class="title">
        <a id="left" href="#"></a>
        <span id="now">November<br>2017</span>
        <a id="right" href="#">></a>
    </div>
    <div>
        <div class="week">Mo</div>
        <div class="week">Tu</div>
        <div class="week">We</div>
        <div class="week">Th</div>
        <div class="week">Fr</div>
        <div class="week">Sa</div>
        <div class="week">Su</div>
    </div>
    <div id="days">
        <div class="day" id="day1"></div>
        <div class="day" id="day2"></div>
        <div class="day" id="day3"></div>
        <div class="day" id="day4"></div>
        <div class="day" id="day5"></div>
        <div class="day" id="day6"></div>
        <div class="day" id="day7"></div>

        <div class="day" id="day8"></div>
        <div class="day" id="day9"></div>
        <div class="day" id="day10"></div>
        <div class="day" id="day11"></div>
        <div class="day" id="day12"></div>
        <div class="day" id="day13"></div>
        <div class="day" id="day14"></div>

        <div class="day" id="day15"></div>
        <div class="day" id="day16"></div>
        <div class="day" id="day17"></div>
        <div class="day" id="day18"></div>
        <div class="day" id="day19"></div>
        <div class="day" id="day20"></div>
        <div class="day" id="day21"></div>

        <div class="day" id="day22"></div>
        <div class="day" id="day23"></div>
        <div class="day" id="day24"></div>
        <div class="day" id="day25"></div>
        <div class="day" id="day26"></div>
        <div class="day" id="day27"></div>
        <div class="day" id="day28"></div>

        <div class="day" id="day29"></div>
        <div class="day" id="day30"></div>
        <div class="day" id="day31"></div>
        <div class="day" id="day32"></div>
        <div class="day" id="day33"></div>
        <div class="day" id="day34"></div>
        <div class="day" id="day35"></div>

        <div class="day" id="day36"></div>
        <div class="day" id="day37"></div>
        <div class="day" id="day38"></div>
        <div class="day" id="day39"></div>
        <div class="day" id="day40"></div>
        <div class="day" id="day41"></div>
        <div class="day" id="day42"></div>
    </div>
</div>
<script src="hh.js"></script>
<form style="display: none"  method="post" action="time.php" id = "dates-form">
     <input type="text" id ="dates" name="dates">
</form>
<main>
    <table class="schedule">
        <thead>
        <tr>
            <th>会议室</th>
            <th>上午</th>
            <th>下午</th>
            <th>晚上</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>会议室 1</td>
            <td id="room1-am"></td>
            <td id="room1-pm"></td>
            <td id="room1-night"></td>
        </tr>
        <tr>
            <td>会议室 2</td>
            <td id="room2-am"></td>
            <td id="room2-pm"></td>
            <td id="room2-night"></td>
        </tr>
        <tr>
            <td>会议室 3</td>
            <td id="room3-am"></td>
            <td id="room3-pm"></td>
            <td id="room3-night"></td>
        </tr>
        <tr>
            <td>会议室 4</td>
            <td id="room4-am"></td>
            <td id="room4-pm"></td>
            <td id="room4-night"></td>
        </tr>
        <tr>
            <td>会议室 5</td>
            <td id="room5-am"></td>
            <td id="room5-pm"></td>
            <td id="room5-night"></td>
        </tr>
        <tr>
            <td>会议室 6</td>
            <td id="room6-am"></td>
            <td id="room6-pm"></td>
            <td id="room6-night"></td>
        </tr>
        <tr>
            <td>会议室 7</td>
            <td id="room7-am"></td>
            <td id="room7-pm"></td>
            <td id="room7-night"></td>
        </tr>
        <tr>
            <td>会议室 8</td>
            <td id="room8-am"></td>
            <td id="room8-pm"></td>
            <td id="room8-night"></td>
        </tr>
        <tr>
            <td>会议室 9</td>
            <td id="room9-am"></td>
            <td id="room9-pm"></td>
            <td id="room9-night"></td>
        </tr>

        </tbody>
    </table>
</main>
<?php

$conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
if ($conn === false) {
    die("连接失败: " . mysqli_connect_error());
}

if(isset($_POST['dates']))
{
    $dd=$_POST['dates'];

    $sql="SELECT * FROM reservation WHERE date ='$dd'";

}
else
{
    $sql="SELECT * FROM reservation WHERE date =CURDATE()";
}


$result = mysqli_query($conn, $sql);
$matrix = array(
    array(0, 0, 0),
    array(0, 0, 0),
    array(0, 0, 0),
    array(0, 0, 0),
    array(0, 0, 0),
    array(0, 0, 0),
    array(0, 0, 0),
    array(0, 0, 0),
    array(0, 0, 0),
);
if (mysqli_num_rows($result) > 0){// 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        $room_id = $row["room_id"];
        $s1 = $row["s1"];
        $s2 = $row["s2"];
        if($s1=="上午")
        {
            $s1=0;
        }
        else if($s1=="下午")
        {
            $s1=1;
        }
        else if($s1=="晚上")
        {
            $s1=2;
        }
        if($s2=="上午")
        {
            $s2=0;
        }
        else if($s2=="下午")
        {
            $s2=1;
        }
        else if($s2=="晚上")
        {
            $s2=2;
        }


        for($i=$s1;$i<=$s2;$i++)
        {
            $matrix[$room_id][$i]=1;
        }
    }
}
else
{
    echo($dd);
}
?>
<script>
    // 假设以下二维数组表示各个会议室在不同时段的预约情况，1表示已预约，0表示未预约。
    // 假设以下二维数组表示各个会议室在不同时段的预约情况，1表示已预约，0表示未预约。
    var schedule = <?php echo json_encode($matrix); ?>;

    // 通过循环将二维数组中的值显示在表格中
    for (var i = 0; i < schedule.length; i++) {
        for (var j = 0; j < schedule[i].length; j++) {
            var cellId = "room" + (i + 1) + "-" + getTimeRange(j);  // 获取单元格的ID，例如："room1-am"
            var cell = document.getElementById(cellId);             // 获取单元格元素
            if (schedule[i][j] == 1) {
                cell.innerText = "已预约";
                cell.classList.add("reserved");                       // 根据已预约状态添加样式
            } else if (schedule[i][j] == 0) {
                cell.innerText = "未预约";
                cell.classList.add("vacant");                         // 根据未预约状态添加样式
            } else {
                cell.innerText = "禁用";
                cell.classList.add("disabled");                       // 根据禁用状态添加样式
            }
        }
    }

    // 根据时间段的索引获取对应的字符串
    function getTimeRange(index) {
        if (index === 0) {
            return "am";
        } else if (index === 1) {
            return "pm";
        } else {
            return "night";
        }
    }
</script>
</body>

</html>