<html>
<head>
<title>应用名称 - @yield('title')</title>
</head>
<body>
@section('sidebar')
这里是侧边栏
@show
<div class="container" style="width: 100px; border: solid red;;height:100px; border: solid red;">
@yield('content')
</div>
</body>
</html>