<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>城市</td>
        <td><input type="text" class="region"></td>
    </tr>
    <tr>
        <td>token</td>
        <td><input type="text" class="token"></td>


    </tr>
    <td><input type="button" value="搜索" class="ti"></td>

</table>
<div class="ju"></div>
<script src="js/jquery.js"></script>
<script>
    $('.ti').click(function(){
        var region=$('.region').val();
        var token=$('.token').val();
        var url='?r=port/list';
        $.get(url,{region:region,token:token},function(mms){
            if(mms)
            {
              $('.ju').html(mms);
            }else
            {
                alert('token不正确');
            }
        })
    })
</script>
</body>
</html>