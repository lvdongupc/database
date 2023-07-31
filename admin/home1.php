<!DOCTYPE html>
<html>
<head>
    <title>ThinkWin CR会议室管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/hh.css"/>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            background-image: url("image/1.jpg");
            background-size: cover;
        }

    </style>
</head>
<body>
<?php
// 如果会话已经启动，则重定向到主页
session_start();
if(isset($_SESSION['username'])){
    header('location: index.php');
}
?>
<div class="frame">
    <form method="post" action="login.php">
    <h1>会议室管理系统登录</h1>
    <label>账户:</label>
    <input type="text" name="username"><br>
    <label>密码:</label>
    <input type="password" name="password"><br>
    <input type="submit" name="submit" value="登录">
    <a href="home2.php" class="register-link">注册</a>
    </form>
    <div class="page active">
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 1</p>
                <p>容纳人数：18人</p>
            </div>
        </div>
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 2</p>
                <p>容纳人数：20人</p>
            </div>
        </div>
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 3</p>
                <p>容纳人数：12人</p>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 4</p>
                <p>容纳人数：8人</p>
            </div>
        </div>
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 5</p>
                <p>容纳人数：25人</p>
            </div>
        </div>
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 6</p>
                <p>容纳人数：30人</p>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 7</p>
                <p>容纳人数：13人</p>
            </div>
        </div>
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 8</p>
                <p>容纳人数：18人</p>
            </div>
        </div>
        <div class="container">
            <img src="2.png" >
            <div class="text">
                <p>会议室 9</p>
                <p>容纳人数：5人</p>
            </div>
        </div>
    </div>
    <p></p>
    <button id="prev" class="a">上一页</button>
    <button id="next" class="b">下一页</button>
</div>
<script src="hua.js"></script>
</body>
</html>