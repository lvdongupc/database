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
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>高校MRBS会议室预约系统</title>
    <link href="css/clndr.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="styless.css">
    <style>

        input[type=submit] {
            display: inline-block;
            line-height: 1;
            white-space: nowrap;
            cursor: pointer;
            background:  #424f63;
            border: 1px solid #dcdfe6;
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
        .table-box {
            margin: 100px auto;
            width: 1024px;
        }

        /* 滚动条宽度 */
        ::-webkit-scrollbar {
            width: 8px;
            background-color: transparent;
        }

        /* 滚动条颜色 */
        ::-webkit-scrollbar-thumb {
            background-color: #27314d;
        }

        table {
            width: 600px;
            border-spacing: 0px;
            border-collapse: collapse;

        }

        table caption{
            font-weight: bold;
            font-size: 24px;
            line-height: 50px;
        }

        table th, table td {
            height: 50px;
            text-align: center;
            border: 1px solid gray;
        }

        table thead {
            color: white;
            background-color: #38F;
        }

        table tbody {
            display: block;
            width: calc(100% + 8px); /*这里的8px是滚动条的宽度*/
            height: 300px;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        table tfoot {
            background-color: #71ea71;
        }

        table thead tr, table tbody tr, table tfoot tr {
            box-sizing: border-box;
            table-layout: fixed;
            display: table;
            width: 100%;
        }

        table tbody tr:nth-of-type(odd) {
            background: #EEE;
        }

        table tbody tr:nth-of-type(even) {
            background: #FFF;
        }

        table tbody tr td{
            border-bottom: none;
        }
        .reserved {
            background-color: green;
            color: white;
            font-weight: bold;
        }

        .vacant {
            background-color: #f5f5f5;
            color: white;
            font-weight: bold;
        }

        .disabled {
            background-color: red;
            color: white;
            font-weight: bold;
        }
        .green-box {
            width: 50px;
            height: 10px;
            background-color: gray;
        }
        body{
            background-image: url("66.JPG");
            background-size: cover;
            z-index: -1;
            font-family: "Arial Black", sans-serif;
            font-weight: 900;

        }
        td{
            color: #353F4F;
        }
        #time {
            color: white;
        }
    </style>
</head>
<body>
<section>
    <div class="left-side sticky-left-side">
        <div class="logo" >
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

    <div style="margin-left: 240px;  min-height: 1000px;" >
        <div class="page-heading">
            <h3 style="color: white;margin-top: 135px;margin-left: 50px"> 首页 </h3>
            <h1 id="time" style="margin-left: 50px"></h1>
            <div class="state-info">
                <iframe name="weather_inc" src="http://i.tianqi.com/index.php?c=code&id=2&num=1" width="220" height="70" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
            </div>
        </div>
        <section class="panel" style="background-color: white; padding: 10px; width: 650px;height: 400px;margin-top: 50px;margin-left: 50px">
        <table style="margin-left: 20px">
            <thead>
            <tr>
                <th>会议室</th>
                <th>8:00-9:00</th>
                <th>9:00-10:00</th>
                <th>10:00-11:00</th>
                <th>11:00-12:00</th>
                <th>12:00-13:00</th>
                <th>13:00-14:00</th>
                <th>14:00-15:00</th>
                <th>15:00-16:00</th>
                <th>16:00-17:00</th>
                <th>17:00-18:00</th>
            </tr>
            </thead>
            <tr>
                <td>会议室 1</td>
                <td id="room1-1"></td>
                <td id="room1-2"></td>
                <td id="room1-3"></td>
                <td id="room1-4"></td>
                <td id="room1-5"></td>
                <td id="room1-6"></td>
                <td id="room1-7"></td>
                <td id="room1-8"></td>
                <td id="room1-9"></td>
                <td id="room1-10"></td>
            </tr>
            <tr>
                <td>会议室 2</td>
                <td id="room2-1"></td>
                <td id="room2-2"></td>
                <td id="room2-3"></td>
                <td id="room2-4"></td>
                <td id="room2-5"></td>
                <td id="room2-6"></td>
                <td id="room2-7"></td>
                <td id="room2-8"></td>
                <td id="room2-9"></td>
                <td id="room2-10"></td>
            </tr>
            <tr>
                <td>会议室 3</td>
                <td id="room3-1"></td>
                <td id="room3-2"></td>
                <td id="room3-3"></td>
                <td id="room3-4"></td>
                <td id="room3-5"></td>
                <td id="room3-6"></td>
                <td id="room3-7"></td>
                <td id="room3-8"></td>
                <td id="room3-9"></td>
                <td id="room3-10"></td>
            </tr>
            <tr>
                <td>会议室 4</td>
                <td id="room4-1"></td>
                <td id="room4-2"></td>
                <td id="room4-3"></td>
                <td id="room4-4"></td>
                <td id="room4-5"></td>
                <td id="room4-6"></td>
                <td id="room4-7"></td>
                <td id="room4-8"></td>
                <td id="room4-9"></td>
                <td id="room4-10"></td>
            </tr>
            <tr>
                <td>会议室 5</td>
                <td id="room5-1"></td>
                <td id="room5-2"></td>
                <td id="room5-3"></td>
                <td id="room5-4"></td>
                <td id="room5-5"></td>
                <td id="room5-6"></td>
                <td id="room5-7"></td>
                <td id="room5-8"></td>
                <td id="room5-9"></td>
                <td id="room5-10"></td>
            </tr>
            <tr>
                <td>会议室 6</td>
                <td id="room6-1"></td>
                <td id="room6-2"></td>
                <td id="room6-3"></td>
                <td id="room6-4"></td>
                <td id="room6-5"></td>
                <td id="room6-6"></td>
                <td id="room6-7"></td>
                <td id="room6-8"></td>
                <td id="room6-9"></td>
                <td id="room6-10"></td>
            </tr>
            <tr>
                <td>会议室 7</td>
                <td id="room7-1"></td>
                <td id="room7-2"></td>
                <td id="room7-3"></td>
                <td id="room7-4"></td>
                <td id="room7-5"></td>
                <td id="room7-6"></td>
                <td id="room7-7"></td>
                <td id="room7-8"></td>
                <td id="room7-9"></td>
                <td id="room7-10"></td>
            </tr>
            <tr>
                <td>会议室 8</td>
                <td id="room8-1"></td>
                <td id="room8-2"></td>
                <td id="room8-3"></td>
                <td id="room8-4"></td>
                <td id="room8-5"></td>
                <td id="room8-6"></td>
                <td id="room8-7"></td>
                <td id="room8-8"></td>
                <td id="room8-9"></td>
                <td id="room8-10"></td>
            </tr>
            <tr>
                <td>会议室 9</td>
                <td id="room9-1"></td>
                <td id="room9-2"></td>
                <td id="room9-3"></td>
                <td id="room9-4"></td>
                <td id="room9-5"></td>
                <td id="room9-6"></td>
                <td id="room9-7"></td>
                <td id="room9-8"></td>
                <td id="room9-9"></td>
                <td id="room9-10"></td>
            </tr>
            <tr>
                <td>会议室 10</td>
                <td id="room10-1"></td>
                <td id="room10-2"></td>
                <td id="room10-3"></td>
                <td id="room10-4"></td>
                <td id="room10-5"></td>
                <td id="room10-6"></td>
                <td id="room10-7"></td>
                <td id="room10-8"></td>
                <td id="room10-9"></td>
                <td id="room10-10"></td>
            </tr>
            <tr>
                <td>会议室 11</td>
                <td id="room11-1"></td>
                <td id="room11-2"></td>
                <td id="room11-3"></td>
                <td id="room11-4"></td>
                <td id="room11-5"></td>
                <td id="room11-6"></td>
                <td id="room11-7"></td>
                <td id="room11-8"></td>
                <td id="room11-9"></td>
                <td id="room11-10"></td>
            </tr>
            <tr>
                <td>会议室 12</td>
                <td id="room12-1"></td>
                <td id="room12-2"></td>
                <td id="room12-3"></td>
                <td id="room12-4"></td>
                <td id="room12-5"></td>
                <td id="room12-6"></td>
                <td id="room12-7"></td>
                <td id="room12-8"></td>
                <td id="room12-9"></td>
                <td id="room12-10"></td>
            </tr>
        </table>
            <div style="display: inline-block; margin-left: 400px; margin-top: 10px;">空闲</div>
            <div style="display: inline-block; width: 50px; height: 10px; background-color:  #f5f5f5;"></div>
            <div style="display: inline-block; margin-left: 20px; margin-top: 10px;">会议预约</div>
            <div style="display: inline-block; width: 50px; height: 10px; background-color: green;"></div>
        </section>
        <?php

        $conn = mysqli_connect("localhost", "root", "123456", "james");

        // 检查连接是否成功
        if ($conn === false) {
            die("连接失败: " . mysqli_connect_error());
        }
        $sql="SELECT * FROM reservation WHERE date =CURDATE()";

        $result = mysqli_query($conn, $sql);
        $matrix = array(
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0),
        );
        if (mysqli_num_rows($result) > 0){// 输出数据
            while($row = mysqli_fetch_assoc($result)) {
                $room_id = $row["room_id"];
                $s1 = $row["s1"];
                $s2 = $row["s2"];
                if($s1=="08:00")$s1=0;
                else if($s1=="09:00")$s1=1;
                else if($s1=="10:00")$s1=2;
                else if($s1=="11:00")$s1=3;
                else if($s1=="12:00")$s1=4;
                else if($s1=="13:00")$s1=5;
                else if($s1=="14:00")$s1=6;
                else if($s1=="15:00")$s1=7;
                else if($s1=="16:00")$s1=8;
                else if($s1=="17:00")$s1=9;
                else if($s1=="18:00")$s1=10;


                if($s2=="08:00")$s2=0;
                else if($s2=="09:00")$s2=1;
                else if($s2=="10:00")$s2=2;
                else if($s2=="11:00")$s2=3;
                else if($s2=="12:00")$s2=4;
                else if($s2=="13:00")$s2=5;
                else if($s2=="14:00")$s2=6;
                else if($s2=="15:00")$s2=7;
                else if($s2=="16:00")$s2=8;
                else if($s2=="17:00")$s2=9;
                else if($s2=="18:00")$s2=10;


                for($i=$s1;$i<=$s2-1;$i++)
                {
                    $matrix[$room_id][$i]=1;
                }
            }
        }
        else
        {
            ;
        }
        ?>
        <script>
            // 假设以下二维数组表示各个会议室在不同时段的预约情况，1表示已预约，0表示未预约。
            // 假设以下二维数组表示各个会议室在不同时段的预约情况，1表示已预约，0表示未预约。
            var schedule = <?php echo json_encode($matrix); ?>;

            // 通过循环将二维数组中的值显示在表格中
            for (var i = 0; i < schedule.length; i++) {
                for (var j = 0; j < schedule[i].length; j++) {
                    var cellId = "room" + (i + 1) + "-" + (j+1);  // 获取单元格的ID，例如："room1-am"
                    var cell = document.getElementById(cellId);             // 获取单元格元素
                    if (schedule[i][j] == 1) {
                        cell.classList.add("reserved");                       // 根据已预约状态添加样式
                    } else if (schedule[i][j] == 0) {
                        cell.classList.add("vacant");                         // 根据未预约状态添加样式
                    } else {
                        cell.classList.add("disabled");                       // 根据禁用状态添加样式
                    }
                }
            }



        </script>

            <footer class="sticky-footer" style="opacity: 0.5;"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
        </div>
        <div id="wrap" style="margin-left: 1100px;margin-top: -800px">
            <div class="date">
                <!-- Clock -->
                <div id="clock">
                    <ul class="circle">

                    </ul>
                    <div class="dot"></div>
                    <div class="hour"></div>
                    <div class="minute"></div>
                    <div class="sec"></div>
                </div>
                <div id="now">
                    <p></p>
                    <p></p>
                </div>
            </div>
            <div id="ctrls">
                <a href="javascript:;" id="option"></a>
                <div id="arrows">
                    <a href="javscript:;" id="prev"></a>
                    <a href="javascript:;" id="next"></a>
                </div>
            </div>
            <ul class="week">
                <li class="date-week">日</li>
                <li class="date-week">一</li>
                <li class="date-week">二</li>
                <li class="date-week">三</li>
                <li class="date-week">四</li>
                <li class="date-week">五</li>
                <li class="date-week">六</li>
            </ul>
            <div id="main">
                <div class="board"></div>
            </div>
        </div>

        <script src="./main.js"></script>
        <script>
            (function(){
                var ulList = document.querySelector('.circle');
                var hourDom = document.querySelector('.hour');
                var minuteDom = document.querySelector('.minute');
                var secDom = document.querySelector('.sec');
                //度数
                var deg = 30;
                ulList.innerHTML = renderDegree();
                function renderDegree(){
                    var html = ''
                    for(var i=0;i<12;i++){
                        html += '<li class="degree" style="transform:rotate('+deg*i+'deg)"></li>';
                    }
                    return html;
                }
                runPointer();
                setInterval(runPointer,1000);
                //指针运行
                function runPointer(){
                    var date = new Date();
                    var sec = date.getSeconds();
                    var minute = date.getMinutes() + sec/60;
                    var hour = date.getHours() + minute/60;
                    var secDeg = sec*360/60 ;
                    var minuteDeg = minute * 360/60 ;
                    var hourDeg = hour * 30;
                    hourDom.style.transform = `rotate(${hourDeg-90}deg)`;
                    minuteDom.style.transform = `rotate(${minuteDeg}deg)`;
                    secDom.style.transform = `rotate(${secDeg+45}deg)`;
                }
            })();
            (function(){
                var days = document.querySelectorAll('#now p');
                //周数组
                var weekArr = ['日','一','二','三','四','五','六'];
                //定义显示的天数
                var showDay = 42;
                //当天日期对象
                var dayNow = new Date();
                var yearNow = dayNow.getFullYear();
                var monthNow = dayNow.getMonth();
                var dateNow = dayNow.getDate();
                //记录切换的日期
                var checkYear = yearNow;
                var checkMonth = monthNow;
                var checkDate = dateNow;
                //显示框
                var main = document.querySelector('.board');
                var bigMain = document.querySelector('#main');
                //显示日期
                function getDay(){
                    var year = dayNow.getFullYear();
                    var month = dayNow.getMonth()+1;
                    var day = dayNow.getDate();
                    var dateStr = year+'年'+addZero(month)+'月'+addZero(day)+'日';
                    var week = dayNow.getDay();
                    //年月日
                    days[0].innerHTML = dateStr;
                    days[1].innerHTML = '星期'+weekArr[week];
                }
                function addZero(num){
                    return num<10 ? '0'+num : ''+num;
                }
                getDay();
                //创建日期视图思路
                //一共有42个格子
                //日期视图由上个月，今个月，下个月组成
                //首先找到这个月第一天处于周几，这样就可以知道上个月要填多少天进去，下个月同理，找到最后一天。
                function renderDayView(month,year,dom){
                    var lastMonth = month+1;
                    if(lastMonth == 12){
                        lastMonth = 0;
                    }
                    //获取这个月有多少天
                    var dayNum = new Date(year,lastMonth,0).getDate();
                    //获取这个月第一天第一天周几
                    var weekIndex = new Date(year,month,1).getDay();
                    //获取上个月最后一天
                    var prevMonthDay = new Date(year,month,0).getDate();

                    //拼接ul
                    var insertUl = '<ul class="date">';
                    for(var i=0;i< showDay; i++){
                        //拼接上个月的
                        if(i<weekIndex){
                            insertUl += '<li class="date-cell other-date">'+ (prevMonthDay+i+1 - weekIndex ) +'</li>';
                        }else if(i-weekIndex<dayNum){
                            //今个月的
                            if(i +1 - weekIndex == dateNow && year == yearNow && month == monthNow){
                                // 就是·今日·
                                insertUl += '<li class="date-cell active">'+ (i +1 - weekIndex ) +'</li>';
                            }else{
                                insertUl += '<li class="date-cell">'+ (i +1 - weekIndex ) +'</li>';
                            }
                        }else{
                            //下个月的
                            insertUl += '<li class="date-cell other-date">'+  (i - dayNum-weekIndex+1) +'</li>';
                        }
                    }
                    dom.innerHTML = insertUl;
                }
                //渲染月份
                function renderMonth(year,dom){
                    var insertUl = '<ul class="month">';
                    for (var i =1;i<=12;i++){
                        if(i==monthNow+1 && year == yearNow){
                            insertUl += '<li class="month-cell active">'+i+'月</li>';
                        }else{
                            insertUl += '<li class="month-cell">'+i+'月</li>';
                        }
                    }
                    insertUl += '</ul>';
                    dom.innerHTML = insertUl;
                    var li = dom.querySelectorAll("li");
                    li.forEach(function(item){
                        item.onclick = function(){
                            //更换月份
                            checkMonth = parseInt(this.innerHTML)-1;
                            optionFlag = 0;
                            createView();
                        };
                    });
                }
                //渲染年份
                //显示16个年份,10个今年的，最前面有前十年的（4个）,后面十年的2个
                function renderYear(year,dom){
                    var nowYearBegin = Math.floor(year/10)*10;
                    var insertUl = '<ul class="year">';
                    for(i=0;i<16;i++){
                        if(i<4){
                            insertUl += '<li class="year-cell other-yaer">'+(nowYearBegin+i-4)+'</li>';
                        }else if(i-4<10){
                            if(nowYearBegin+i-4 == yearNow){
                                insertUl += '<li class="year-cell active">'+(nowYearBegin+i-4)+'</li>';
                            }else{
                                insertUl += '<li class="year-cell">'+(nowYearBegin+i-4)+'</li>';
                            }
                        }else{
                            insertUl += '<li class="year-cell  other-yaer">'+(nowYearBegin+i-4)+'</li>';
                        }
                    }
                    insertUl += '</ul>';
                    dom.innerHTML = insertUl;
                    var li = dom.querySelectorAll("li");
                    li.forEach(function(item){
                        item.onclick = function(){
                            //更换年份
                            checkYear = parseInt(this.innerHTML);
                            optionFlag = 1;
                            createView();
                        };
                    });
                }






                //获取切换按钮
                var optionBtn = document.querySelector('#option');
                var optionType = 0;//定义0为日视图 1为月视图 2为年视图
                var optionFlag;
                optionBtn.onclick = function(){
                    optionFlag = optionType+1;
                    if(optionFlag > 2){
                        optionType = 2;
                    }else{
                        createView();
                    }
                }
                //渲染视图
                //加进出动画效果在从日到年，还有另外从年到日
                function createView(){
                    if(optionFlag == undefined){
                        optionBtn.innerHTML = checkYear+'年'+addZero(checkMonth+1)+'月';
                        renderDayView(checkMonth,checkYear,main);
                        return;
                    }
                    if(optionType<optionFlag){
                        bigMain.innerHTML = '<div class="toHide board"></div><div class="toShow board"></div>';
                        var dom = document.querySelectorAll('.board');
                        switch(optionFlag){
                            case 1:
                                //日视图切换到月份视图
                                optionBtn.innerHTML = checkYear+'年';
                                renderMonth(checkYear,dom[1]);
                                renderDayView(checkMonth,checkYear,dom[0]);
                                optionType = optionFlag;
                                break;
                            case 2:
                                //月视图切换到年时图
                                var YearBegin = Math.floor(checkYear/10)*10;
                                optionBtn.innerHTML = YearBegin+'-'+(YearBegin+9)+'年';
                                renderYear(checkYear,dom[1]);
                                renderMonth(checkYear,dom[0]);
                                optionType = optionFlag;
                                break;
                        }
                    }else{
                        bigMain.innerHTML = '<div class="toBlow board"></div><div class="toNarrow board"></div>';
                        var dom = document.querySelectorAll('.board');
                        switch(optionFlag){
                            case 0:
                                //月视图切换到日视图
                                optionBtn.innerHTML = checkYear+'年'+addZero(checkMonth+1)+'月';
                                renderMonth(checkYear,dom[0]);
                                renderDayView(checkMonth,checkYear,dom[1]);
                                optionType = optionFlag;
                                break;
                            case 1:
                                //年视图切换到月时图
                                optionBtn.innerHTML = checkYear+'年';
                                renderMonth(checkYear,dom[1]);
                                renderYear(checkYear,dom[0]);
                                optionType = optionFlag;
                                break;
                        }
                    }
                }
                createView();


                //上下切换
                var prev = document.querySelector('#prev');
                var next = document.querySelector('#next');
                //上滑
                prev.onclick = function(){
                    slideView(-1);
                };
                //下滑
                next.onclick = function(){
                    slideView(1);
                }
                function slideView(index){
                    if(index<0){
                        //上滑
                        bigMain.innerHTML = '<div class="bottomOut board"></div><div class="board toBottom"></div>';
                        var board = bigMain.querySelectorAll(".board");
                        viewMove(index,board);
                    }else{
                        //下滑
                        bigMain.innerHTML = '<div class="topOut board"></div><div class="board toTop"></div>';
                        var board = bigMain.querySelectorAll(".board");
                        viewMove(index,board);
                    }
                }
                //上滑下滑视图对象封装
                function viewMove(type,board){
                    //先看处于什么视图
                    switch(optionType){
                        case 0:
                            renderDayView(checkMonth,checkYear,board[0]);
                            //日视图
                            if(type<0){
                                checkMonth--;
                            }else{
                                // 月份加1
                                checkMonth++;
                            }
                            //实例化切换后的对象
                            slideDate(checkMonth,checkYear);
                            optionBtn.innerHTML = checkYear+'年'+addZero(checkMonth+1)+'月';
                            renderDayView(checkMonth,checkYear,board[1]);
                            break;
                        case 1:
                            //月视图
                            renderMonth(checkYear,board[0]);
                            if(type<0){
                                checkYear--;
                            }else{
                                checkYear++;
                            }
                            //实例化切换后的对象
                            slideDate(checkMonth,checkYear);
                            optionBtn.innerHTML = checkYear+'年';
                            renderMonth(checkYear,board[1]);
                            break;
                        case 2:
                            //年时图
                            renderYear(checkYear,board[0]);
                            if(type<0){
                                checkYear = checkYear-10;
                            }else{
                                checkYear = checkYear+10;
                            }
                            //实例化切换后的对象
                            slideDate(checkMonth,checkYear);
                            var YearBegin = Math.floor(checkYear/10)*10;
                            optionBtn.innerHTML = YearBegin+'-'+(YearBegin+9)+'年';
                            renderYear(checkYear,board[1]);
                    }
                }
                //重新实例化日期对象
                function slideDate(month,year){
                    var date = new Date(year,month);
                    checkYear = date.getFullYear();
                    checkMonth = date.getMonth();
                }
            })()
        </script>
    </div>

</section>
<script>
    function updateTime() {
        var now = new Date();
        var year = now.getFullYear();
        var month = (now.getMonth() + 1).toString().padStart(2, '0');
        var date = now.getDate().toString().padStart(2, '0');
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');
        var timeString = year + '-' + month + '-' + date + ' ' + hours + ':' + minutes + ':' + seconds;
        document.getElementById('time').innerHTML = timeString;
    }

    setInterval(updateTime, 1000); //每隔1秒钟更新一次时间
</script>
<script>
    function showForm(){
        document.getElementById("ind").style.display="block";
    }

</script>
</body>
</html>
<?php
mysqli_close($conn);
?>
