<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>天气API示例</title>
</head>
<body>
<h1>当前天气情况</h1>
<div id="weather"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    const apiKey = 'Snlm8SkwZ0F5My7NI'; //你的API Key
    const city = '青岛'; //要查询的城市名
    const apiUrl = `https://api.seniverse.com/v3/weather/now.json?key=${apiKey}&location=${city}&language=zh-Hans&unit=c`; //API请求URL地址

    //发送API请求
    $.ajax({
        url: apiUrl,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            //处理API响应
            const temperature = res.results[0].now.temperature; //获取当前气温
            const weather = res.results[0].now.text; //获取当前天气状况
            //更新HTML页面
            const weatherDiv = document.querySelector('#weather');
            weatherDiv.innerHTML = `当前气温：${temperature}℃，天气状况：${weather}`;
        },
        error: function(err) {
            console.log(err);
        },
    });
</script>
</body>
</html>