<?php
$conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
if ($conn === false) {
    die("连接失败: " . mysqli_connect_error());
}

$sql='SELECT * FROM reservation WHERE date = CURDATE()';
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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>会议室看板</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* 预约状态样式 */
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
<script>
    // 获取当前日期并格式化输出
    window.onload = function() {
        const date = new Date();
        const year = date.getFullYear();
        const month = ('0' + (date.getMonth() + 1)).slice(-2);
        const day = ('0' + date.getDate()).slice(-2);
        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('current-date').textContent = formattedDate;
    };
</script>
<p>当前日期： <span id="current-date"></span></p>

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