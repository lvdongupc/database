
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>月消费饼状图</title>
    <script src="js/jquery.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/highcharts-3d.js"></script>
    <script src="js/exporting.js"></script>
    <style>
        #pie{
            width:500px;
            height:500px;
        }
    </style>
</head>
<body>
<div id="pie"></div>
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
</body>
</html>