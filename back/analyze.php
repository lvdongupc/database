<?php
$conn = mysqli_connect("localhost", "root", "123456", "james");

// 检查连接是否成功
if ($conn === false) {
    die("连接失败: " . mysqli_connect_error());
}
$date11 = "2023-06-04";
$date12 = "2023-06-08";
$date21 = "2023-06-09";
$date22 = "2023-06-13";
$date31 = "2023-06-14";
$date32 = "2023-06-18";
$date41 = "2023-06-19";
$date42 = "2023-06-23";
$date51 = "2023-06-24";
$date52 = "2023-06-28";

$date1="6.4-6.8";
$date2="6.9-6.13";
$date3="6.14-6.18";
$date4="6.19-6.23";
$date5="6.24-6.28";
$a=[$date1,$date2,$date3,$date4,$date5];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE date>= '$date11' AND date<= '$date12'");
$row = mysqli_fetch_assoc($result);
$count1 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE date>= '$date21' AND date<= '$date22'");
$row = mysqli_fetch_assoc($result);
$count2 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE date>= '$date31' AND date<= '$date32'");
$row = mysqli_fetch_assoc($result);
$count3 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE date>= '$date41' AND date<= '$date42'");
$row = mysqli_fetch_assoc($result);
$count4 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE date>= '$date51' AND date<= '$date52'");
$row = mysqli_fetch_assoc($result);
$count5 = $row["count"];

$b=array($count1,$count2,$count3,$count4,$count5);


$s1="例会";
$s2="团委会议";
$s3="党支部会议";
$s4="EI会议";

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation ");
$row = mysqli_fetch_assoc($result);
$sc = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE reason='$s1'");
$row = mysqli_fetch_assoc($result);
$sc1 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE reason='$s2'");
$row = mysqli_fetch_assoc($result);
$sc2 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE reason='$s3'");
$row = mysqli_fetch_assoc($result);
$sc3 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE reason='$s4'");
$row = mysqli_fetch_assoc($result);
$sc4 = $row["count"];

$sc=(float)$sc;
$sc1=(float)$sc1;
$sc2=(float)$sc2;
$sc3=(float)$sc3;
$sc4=(float)$sc4;
$sc1=$sc1/$sc;
$sc2=$sc2/$sc;
$sc3=$sc3/$sc;
$sc4=$sc4/$sc;

$sc1=number_format($sc1, 2);
$sc2=number_format($sc2, 2);
$sc3=number_format($sc3, 2);
$sc4=number_format($sc4, 2);


$t1="唐岛湾校区";
$t2="古镇口校区";
$t3="北京校区";
$t4="东营校区";
$t5="克拉玛依校区";

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE dizhi='$t1'");
$row = mysqli_fetch_assoc($result);
$tf1 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE dizhi='$t2'");
$row = mysqli_fetch_assoc($result);
$tf2 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE dizhi='$t3'");
$row = mysqli_fetch_assoc($result);
$tf3 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE dizhi='$t4'");
$row = mysqli_fetch_assoc($result);
$tf4 = $row["count"];

$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM reservation WHERE dizhi='$t5'");
$row = mysqli_fetch_assoc($result);
$tf5 = $row["count"];

mysqli_close($conn);
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
    <title>数据统计</title>
    <link href="css/clndr.css" rel="stylesheet">
    <link rel="stylesheet" href="js/morris-chart/morris.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
    <style>
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
<body>
<script src="echarts.js"></script>
<section >
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

        <div class="page-heading">
            <h3 style="margin-left: 200px">
                数据统计
            </h3>
        </div>
        <div  class="panel" style="background-color: white; padding: 10px; width: 1350px;height: 800px;margin-top: 0px;margin-left: 220px;opacity: 0.85">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel deep-purple-box">
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="main" style="width:80%;height:400px;margin: 0 auto ;margin-left: 130px"></div>
                <div class="col-md-4" style="margin-left: 250px">
                    <div class="panel" style="margin-left: -150px;height: 350px;border: 2px solid #0f6674">
                        <header class="panel-heading">
                            会议主题统计
                        </header>
                        <div class="panel-body">
                            <ul class="goal-progress">
                                <li>

                                    <div class="details">
                                        <div class="title">
                                           <p style="color:#00a0e9;">团委会议</p>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:66.7%">
                                                <span class="">
                                                    <?php
                                                    echo("$sc2");
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div class="details">
                                        <div class="title">
                                            <p style="color:#4cae4c;">例会</p>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 33.3%">
                                                <span class="">
                                                    <?php
                                                    echo("$sc1");
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="details">
                                        <div class="title">
                                            <p style="color: #856404">党支部会议</p>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                <span class="">
                                                    <?php
                                                    echo("$sc3");
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div class="details">
                                        <div class="title">
                                            <p style="color: firebrick">EI会议</p>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                <span class="">
                                                    <?php
                                                    echo("$sc4")
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="PieData" style="margin-left: 800px ;width: 600px ;height: 400px"></div>
            </div>
        </div>
        <footer class="sticky-footer" style="opacity: 0.5; margin-left: 230px">2023 &copy; 青岛软件学院、计算机科学与技术学院会议室管理系统 by 计算2101吕栋 </footer>
    </div>
</section>
<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
<script type="text/javascript">
    var a = <?php echo json_encode($a); ?>;
    var b = <?php echo json_encode($b); ?>;
    // 路径配置
    require.config({
        paths: {
            echarts: 'http://echarts.baidu.com/build/dist'
        }
    });

    // 使用
    require(
        [
            'echarts',
            'echarts/chart/bar', // 使用柱状图就加载bar模块，按需加载
            'echarts/chart/line'
        ],
        function (ec) {
            // 基于准备好的dom，初始化echarts图表
            var myChart = ec.init(document.getElementById('main'));

            var option = { //具体细节的描述
                title: {
                    text: '借用次数随时间的关系表',
                    textStyle: {
                        color: '#0f6674', // 修改 text 颜色
                        fontStyle: 'normal', // 设置字体风格为 normal
                        fontWeight: 'bold', // 设置字体粗细为 bold
                        fontSize: 20 // 设置字体大小
                    },
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['times']
                },
                toolbox: { //可以选择具体数据，柱状图，折线图，还原，保存图片的的切换选择
                    show: true,
                    feature: {
                        dataView: {
                            show: true,
                            readOnly: false
                        },
                        magicType: {
                            show: true,
                            type: ['line', 'bar'] //可选折线图和柱状图
                        },
                        restore: {
                            show: true  //恢复默认
                        },
                        saveAsImage: {
                            show: true // 存储为图片的功能
                        }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: a,
                    name: 'date',
                    position: 'left',
                    axisLine: { // 设置x轴颜色
                        lineStyle: {
                            color: 'black'
                        }
                    },
                    axisLabel: { // 设置x轴标签颜色
                        textStyle: {
                            color: 'black'

                        }
                    },
                    splitLine: { // 设置x轴分割线颜色
                        lineStyle: {
                            color: 'black'
                        }
                    }
                }],
                yAxis: [{
                    type: 'value',
                    name: '借用次数',
                    position: 'left',
                    axisLine: { // 设置y轴颜色
                        lineStyle: {
                            color: 'black'
                        }
                    },
                    axisLabel: { // 设置y轴标签颜色
                        textStyle: {
                            color: '#0f6674'

                        }
                    },
                    splitLine: { // 设置y轴分割线颜色
                        lineStyle: {
                            color: 'black'
                        }
                    }
                }],
                series: [{
                    name: 'times',
                    type: 'line',// bar
                    data: b,
                    color:'black',
                }
                ]
            };





            // 为echarts对象加载数据
            myChart.setOption(option);
        }
    );
</script>
<script>
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('PieData'));
    var tf1 = <?php echo json_encode($tf1); ?>;
    var tf2 = <?php echo json_encode($tf2); ?>;
    var tf3 = <?php echo json_encode($tf3); ?>;
    var tf4 = <?php echo json_encode($tf4); ?>;
    var tf5 = <?php echo json_encode($tf5); ?>;

    option = {
        title: {
            text: '会议室使用情况',
            subtext: '饼状图',
            left: 'center',
            textStyle: {
                color: '#0f6674', // 修改标题颜色
                fontStyle: 'normal', // 设置字体风格为 normal
                fontWeight: 'bold', // 设置字体粗细为 bold
                fontSize: 20 // 设置字体大小
            },
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },

        series : [
            {
                type: 'pie',
                radius : '65%',
                center: ['50%', '50%'],
                selectedMode: 'single',
                data:[
                    {value: tf1, name: '唐岛湾校区',},
                    {value:tf2, name: '古镇口校区'},
                    {value:tf3, name: '北京校区'},
                    {value:tf4, name: '东营校区'},
                    {value:tf5, name: '克拉玛依校区'}
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
</body>
</html>
