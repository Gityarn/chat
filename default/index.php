<?php
	//设置时区
	date_default_timezone_set('PRC');
	//读取内容
	@$string=file_get_contents('message.txt');
	//如果$string不为空的时候执行，也就是message.txt中有留言数据
	if(!empty($string)){
		//每一段留言有一个分隔符，但是最后多出了一个&^。因此，我们需要将$^删掉
		$string=rtrim($string,'&^');
		//以&^切成数组
		$arr=explode('&^',$string);
		//数组倒序排列
		$arr=array_reverse($arr);
		//将留言内容读取
		foreach($arr as $value){
			list($username,$content,$time)=explode('$#',$value);
			echo '用户名:<font color="gree">'.$username.'</font>内容:<font color="red">'.$content.'</font>时间:'.date('Y-m-d H:i:s',$time);
			echo '<hr/>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
</head>
<body>
	<h1>普鲁士联邦</h1>
	<form action="write.php" method="post">
		用户名：<input type="text" name="username"><br/>
		内容：<br/><textarea name="content"></textarea><br/>
		<input type="submit" value="提交"/>
	</form>
</body>
</html>