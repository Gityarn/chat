<?php
    //报告所有错误
    //error_reporting(E_ALL);
    if (filesize('message.txt') > 15360) {
	//如果文件大于15KB
	    file_put_contents('message.txt','');
	    //那么就将其清空
	}
	//追加方式打开文件
	$fp=fopen('message.txt','a');
	//设置时间
	$time=time();
	//得到用户名
	$username=htmlspecialchars(trim($_POST['username']));
	//得到内容
	$content=htmlspecialchars(trim($_POST['content']));
	//htmlspecialchars() 函数阻止XSS跨站脚本攻击

	//组合写入的字符串：内容和用户之间分开，使用$#行与行之间分开，使用&^
	$string=$username.'$#'.$content.'$#'.$time.'&^';
	//写入文件
	fwrite($fp,$string);
	//关闭文件
	fclose($fp);
	
	header('location:index.php');
?>
