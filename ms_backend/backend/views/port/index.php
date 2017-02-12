<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>接口</title>
</head>
<style>
	#form{
		width: 25%;
		float: left;
		height: 350px;
	}
	#result{
		width: 35%;
		float: left;
		border: 1px solid gray;
		height: 440px;
	}
	li{
		list-style: none;
	}
</style>
<body>
	<div id="form">
	<h2 style="margin-left:40px;">app模拟请求器</h2>
		<ul>
			<li>
				请求地址：<input type="text" name="url" style="width:213px;">
			</li>
			<br>
			<li>
				<span>
					请求方式：
					<input type="radio" name="method" value="get">get
				</span>
				&nbsp;&nbsp;
				<span>		
					<input type="radio" name="method" value="post">post
				</span>
			</li>
			<br>
			<li>
				<span>
					头像：<input type="file" name="img">
				</span>
			</li>
			<li id="InputsWrapper">
				<span>参数名称：<input type="text" name="dname[]" style="width:70px;"></span><span>参数值：<input type="text" name="d_value[]" style="width:70px;"></span>
			</li>
			<br>
			<br>
			<br>
			<li>
				<span><input type="button" id="add_btn" value="添加一个参数"></span>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span><input type="button" id="sub_btn" value="提交" style="width:80px;"></span>
			</li>
		</ul>
	</div>
	<br>
	<li>返回结果</li>
	<br>
	<li>
		<textarea id="result" style="font-size:14px;">
		
		</textarea>
	</li>
</body>
</html>
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function() {  
  
		var MaxInputs       = 8; //maximum input boxes allowed  
		var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID  
		var x = InputsWrapper.length; //initlal text box count  
		var FieldCount=1; //to keep track of text box added  
		  
		$("#add_btn").click(function (e)  //on add input button click  
		{  
	        if(x <= MaxInputs) //max input box allowed  
	        {  
	            FieldCount++; //text box added increment  
	            //add input box  
	            $(InputsWrapper).after('<br><li id="InputsWrapper"><span>参数名称：<input type="text" name="dname[]'+FieldCount+'" style="width:70px;"></span><span>参数值：<input type="text" name="d_value[]'+FieldCount+'" style="width:70px;"></span></li>');  
	            x++; //text box increment  
	        }  
	        else
	        {			
	        	alert("傻逼，有那么多参数吗？");
	        	return false;  
	        }
		});  
	});  

	$("#sub_btn").click(function(){
		var img=$("input[name='img']").val();
		var port_url = $("input[name='url']").val();
		var method = '';
		var url='?r=port/img';
		$.get(url,{img:img},function(mms){
			$("#result").html(mms);
		})
		$("input[name='method']").each(function(){
			if(this.checked)
			{
				method = $(this).val();
			}
		})

		var dname = [],d_value = [];
        $("input[name^=dname]").each(function(a_Idx, a_Elmt) { dname.push(a_Elmt.value); });
        $("input[name^=d_value]").each(function(a_Idx, a_Elmt) { d_value.push(a_Elmt.value); });
        var dname = dname.join(",");
        var d_value = d_value.join(",");

		$.ajax({
			url   : "?r=port/request",
			type  : 'post',
			data  : "port_url="+port_url+"&method="+method+"&dname="+dname+"&d_value="+d_value,
			success:function(msg)
			{
				$("#result").html(msg);
			}
		})
	})
</script>