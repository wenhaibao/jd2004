<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/test/uploadadd" method="post" enctype="multipart/form-data">
    @csrf
        <input type="file" name="img"><input type="submit" value="提交">
    </form>    
    <img src="{{env('CDN_URL')}}/storage/img/aaa.jpg" alt="">
</body>
</html>