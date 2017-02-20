<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top" id="add">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="?r=aibum/aibumadd" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td>商品ID</td>
                    <td><input type="text" name="goods_id"/></td>
                </tr>
            <tbody id="addTr">
                <tr>
                    <td><input type="file" name="img[]"/></td>
                    <td></td>
                </tr>
                </tbody>
                <tr>
                    <td><input type="submit" value="提交"/></td>
                    <td><input type="button" id="getAtr" value="追加内容"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script>
    $(function(){
        $("#getAtr").click(function(){
            $str='';
            $str+="<tr>";
            $str+="<td><input type='file' name='img[]'/></td>";
            $str+="<td onClick='getDel(this)'><input type='button' value='删除追加'/></td>";
            $str+="</tr>";
            $("#addTr").append($str);
        });
    });

    function getDel(k){
        $(k).parent().remove();
    }
</script>
</body></html>