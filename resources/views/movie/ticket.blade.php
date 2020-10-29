<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul li{
            float: left;
            width: 100px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            border: red solid 1px;
            list-style: none;
        }
    </style>
</head>
<body>
    <!-- <ul>
        <li color = 'blue'>蓝色</li>
        <li color = 'yellow''>黄色</li>
        <li color = 'red'>红色</li>
    </ul> -->
    <form action="gggou" method="GET">
    @foreach($movieinfo as $v)
        <div id="div1" style="height: 110px;width: 110px;border: darkseagreen solid 1px;float: left;">{{$v['m_number']}}</div>
    @endforeach
    <input type="submit" value="购买">
    </form>
</body>
</html>
<script src="/jquery.js"></script>
<script>
    $(document).on("click","#div1",function(){
            _number = $(this).text()
            $.get('/addd',{m_number:_number},function(d){
				if(d=='ok'){
                    alert(11112)
					$(this).css('background-color','red')
				}else{
					alert(11)
				}
			},'json')
        })
</script>