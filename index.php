<?php
	$operation=trim($_POST["operation"]);//获取操作类型 ls聊天室列表 new创建聊天室 del删除聊天室
	$name=trim($_POST["name"]);//获取待创建的聊天室名称name
	echo $_POST["operation"];
 if ($operation=="ls") {
     $dir=scandir("./");
     $dir = array_diff($dir, [".", "..","default","index.php"]);//屏蔽非聊天室目录
     foreach ($dir as $value)
     {
         if(is_dir($value) and !strpos($value,'_hidden'))//屏蔽文件、有隐藏标记目录
         {
             //echo $value . PHP_EOL;
             echo $value . "<br>";
         }
     }
 }
 elseif ($operation=="new" and $name!=null)
 {
     /*iconv方法是为了防止中文乱码，保证可以创建识别中文目录，不用iconv方法格式的话，将无法创建中文目录*/
     //来自CSDN博客：https://blog.csdn.net/cpongo3/article/details/95210859
     $name = iconv("UTF-8", "GBK",$name);
     $dir = "./" . $name;
     if (!file_exists($dir)){
         mkdir ($dir);
         copy("./default/index.php",$dir."/index.php");
         copy("./default/write.php",$dir."/write.php");
     }
     else {
         echo "该名称已存在";
     }
     
 }
     //print_r($dir);

 ?>