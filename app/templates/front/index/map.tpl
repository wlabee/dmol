<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hello, World</title>
<style type="text/css">
html{height:100%}
body{height:100%;margin:0px;padding:0px}
#container{height:100%}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak={%$bm_ak%}">
//v2.0版本的引用方式：src="http://api.map.baidu.com/api?v=2.0&ak=您的密钥"
//v1.4版本及以前版本的引用方式：src="http://api.map.baidu.com/api?v=1.4&key=您的密钥&callback=initialize"
</script>
</head>

<body>
<div id="container"></div>
<script type="text/javascript">
var map = new BMap.Map("container");          // 创建地图实例
var point = new BMap.Point(106.526964,29.590267);  // 创建点坐标
map.centerAndZoom(point, 18);                 // 初始化地图，设置中心点坐标和地图级别
var opts = {type: BMAP_NAVIGATION_CONTROL_SMALL}
map.addControl(new BMap.NavigationControl(opts));

var marker = new BMap.Marker(point);        // 创建标注
map.addOverlay(marker);                     // 将标注添加到地图中
</script>
</body>
</html>
