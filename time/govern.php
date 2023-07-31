<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>会议室管理系统 - 新增会议</title>
    <link rel="stylesheet" type="text/css" href="/lvdong/css/hh.css"/>
    <style>
        form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f2f2f2;
            width: 350px;
            height: 450px;
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
    <h1>会议室管理系统</h1>
    <form method="post" action="chaun.php">
        <div class="form-row">
            <label for="title">会议主题：</label>
            <input type="text" id="title" name="title" autofocus required>
        </div>
        <div>
            <label for="people">创建人员：</label>
            <span style="color: #8B4513;"><?php echo $_SESSION['username']; ?></span>
        </div>
        <div>
            <label for="start-date">开始日期：</label>
            <input type="date" id="start-date" name="start-date" onchange="updateEndDate()" required>
            <select id="start-time" name="start-time" required>
                <option value="">请选择时间</option>
                <option value="1">上午</option>
                <option value="2">下午</option>
                <option value="3">晚上</option>
            </select>
        </div>
        <div id="end-date-container">
            <label for="end-date">结束日期：</label>
            <input type="date" id="end-date" name="end-date" required>
            <select id="end-time" name="end-time" required>
                <option value="">请选择时间</option>
                <option value="1">上午</option>
                <option value="2">下午</option>
                <option value="3">晚上</option>
            </select>
        </div>

        <script>
            function updateEndDate() {
                var startDate = document.getElementById("start-date").value;
                document.getElementById("end-date").value = startDate;
                document.getElementById("end-date").setAttribute("disabled", true);
                document.getElementById("submit-btn").setAttribute("disabled", false);
            }
        </script>
        <div class="form-row">
            <label for="room">会议室：</label>
            <select id="room" name="room" required>
                <option value="">请选择会议室</option>
                <option value="1">会议室1</option>
                <option value="2">会议室2</option>
                <option value="3">会议室3</option>
                <option value="4">会议室4</option>
                <option value="5">会议室5</option>
                <option value="6">会议室6</option>
                <option value="7">会议室7</option>
                <option value="8">会议室8</option>
                <option value="9">会议室9</option>
            </select>
        </div>
        <div class="form-row">
            <label for="description">会议描述：</label>
            <textarea id="description" name="description" rows="5" cols="50"></textarea>
        </div>
        <div class="form-row">
            <button type="submit">保存</button>
            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            <button type="reset">重置</button>
        </div>
    </form>
</body>
</html>