<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>数据统计</title>
    <link href="css/clndr.css" rel="stylesheet">
    <link rel="stylesheet" href="js/morris-chart/morris.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/highcharts-3d.js"></script>
    <script src="js/exporting.js"></script>
    <script src="//api.map.baidu.com/api?type=webgl&v=1.4&ak=u8HEvUwfeRo32ocaDRZnEi3ZT0y8GMs1"></script>
    <style>
        #pie{
            width:500px;
            height:500px;
        }
        #container {
            overflow: hidden;
            width: 100%;
            height: 100%;
            margin: 0;
            font-family: "微软雅黑";
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
            color: #88be14;
        }
    </style>
</head>
<body >
<section>
    <div class="left-side sticky-left-side">
        <div class="logo" >
            <h3 style="color: white">&nbsp;&nbsp;&nbsp;会议室管理系统</h3>
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <br>
                <li><a href="indexs.php"><i class="fa fa-home"></i> <span>会议室审核</span></a></li>
                <li><a href="room.php"><i class="fa fa-building-o"></i> <span>会议室管理</span></a></li>
                <li><a href="users.php"><i class="fa fa-users"></i> <span>用户管理</span></a></li>
                <li><a href="publish.php"><i class="fa fa-comment-o"></i> <span>信息发布</span></a></li>
                <li><a href="message.php"><i class="fa fa-archive"></i> <span>公告管理</span></a></li>
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
                数据分析
            </h3>
        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel deep-purple-box">
                    </div>
                </div>
            </div>
        </div>
        <div id="pie" style="margin-left: 50px;height: 600px;width: 600px;margin-top: -5px"></div>
        <script>
            //			875.2

            $.ajax({
                url: 'jj.php',
                dataType: 'json',
                success: function (data) {
                    var chartData = []; // 用于存储 HighChart 数据的数组
                    // 遍历 PHP 返回的数据，构造 HighChart 数据格式
                    $.each(data, function (key, value) {
                        chartData.push({
                            name: key,
                            y: value
                        });
                    });
                    // 将 HighChart 数据传递到图表中
                    $('#pie').highcharts({
                        title:{
                            text:'预约时间分布图'
                        },
                        subtitle:{
                            text:'2023年6月'
                        },
                        chart:{
                            type:'pie',// 定义图标类型为饼状图
                            options3d:{// 设置3d信息
                                enabled:true,
                                alpha:30,//围绕x轴旋转的度数
                                beta:0//围绕y轴旋转的度数
                            }
                        },
                        series:[{
                            type:'pie',
                            name:'花费',
                            data:[
                                {
                                    name: '上午',
                                    y:5,
                                    sliced: true,//默认选中
                                    selected: true//设置点其他的时候，合拢
                                },
                                ['下午',4],
                                ['上午-下午',4],

                            ]
                        }],
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions:{
                            pie:{
                                allowPointSelect: true,//是否允许选择
                                cursor:'pointer',
                                depth:35,//3d视图的深度
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                }
                            }
                        },
                        credits:{
                            text:"lvdong",
                            href:"https://github.com/puffing/highcharts02",
                            style:{
                                color:'green',
                                fontWeight:'bold',
                                fontSize:'14px'
                            },
                            position:{
                                y:-20
                            }

                        }
                    })
                }
            });


        </script>
    </div>
    <div id="container" style="width:600px;height: 600px;margin-top: -850px;margin-left: 980px"></div>
    <footer class="sticky-footer" style="opacity: 0.5;margin-left: 230px"> 2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋   </footer>
</section>
</body>
</html>
<script>
    var map = new BMapGL.Map('container');
    var beijingPoint = new BMapGL.Point(116.398, 39.912); // 北京市中心坐标
    var qingdaoPoint = new BMapGL.Point(120.382, 36.067); // 青岛中心坐标
    var dongyingPoint = new BMapGL.Point(118.659, 37.432); // 东营中心坐标
    var kelamayiPoint = new BMapGL.Point(84.899, 45.585); // 克拉玛依中心坐标
    map.centerAndZoom(beijingPoint, 5);
    var beijingMarker = new BMapGL.Marker(beijingPoint);
    var qingdaoMarker = new BMapGL.Marker(qingdaoPoint);
    var dongyingMarker = new BMapGL.Marker(dongyingPoint);
    var kelamayiMarker = new BMapGL.Marker(kelamayiPoint);
    map.addOverlay(beijingMarker); // 将点标记添加到地图
    map.addOverlay(qingdaoMarker);
    map.addOverlay(dongyingMarker);
    map.addOverlay(kelamayiMarker);

    // 创建信息窗口
    var beijingOpts = {
        width: 200,
        height: 100,
        title: '北京市',
    };
    var beijingInfoWindow = new BMapGL.InfoWindow('地址：中国石油大学北京会议室', beijingOpts);
    var qingdaoOpts = {
        width: 200,
        height: 100,
        title: '青岛市',
    };
    var qingdaoInfoWindow = new BMapGL.InfoWindow('地址：中国石油大学唐岛湾、古镇口会议室', qingdaoOpts);
    var dongyingOpts = {
        width: 200,
        height: 100,
        title: '东营市',
    };
    var dongyingInfoWindow = new BMapGL.InfoWindow('地址：中国石油大学东营会议室', dongyingOpts);
    var kelamayiOpts = {
        width: 200,
        height: 100,
        title: '克拉玛依市',
    };
    var kelamayiInfoWindow = new BMapGL.InfoWindow('地址：中国石油大学克拉玛依会议室', kelamayiOpts);

    // 点标记添加点击事件
    map.openInfoWindow(beijingInfoWindow, beijingPoint); // 开启信息窗口
    beijingMarker.addEventListener('click', function () {
        map.openInfoWindow(beijingInfoWindow, beijingPoint); // 开启信息窗口
    });
    qingdaoMarker.addEventListener('click', function () {
        map.openInfoWindow(qingdaoInfoWindow, qingdaoPoint); // 开启信息窗口
    });
    dongyingMarker.addEventListener('click', function () {
        map.openInfoWindow(dongyingInfoWindow, dongyingPoint); // 开启信息窗口
    });
    kelamayiMarker.addEventListener('click', function () {
        map.openInfoWindow(kelamayiInfoWindow, kelamayiPoint); // 开启信息窗口
    });
</script>

