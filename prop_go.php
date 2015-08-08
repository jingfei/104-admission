<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$time = test_input($_POST["time"]);
	$reason = test_input($_POST["reason"]);
	$class1 = test_input($_POST["class1"]);
	$class2= test_input($_POST["class2"]);
	$office = test_input($_POST["office"]);
	$name = test_input($_POST["name"]);
	$tel = test_input($_POST["tel"]);
	$text1 = test_input($_POST["text1"]);
	$text2 = test_input($_POST["text2"]);
	$text1 = str_replace("\\n", "\n", $text1);
	$text2 = str_replace("\\n", "\n", $text2);

	if($time=="" || $reason=="" || $class1=="" || $class2=="" || $office=="" || $name=="" || $tel=="" || $text1==""){
		echo "資料未填寫完整";
		return;
	}

	$sql = "INSERT into `proposal` (time, reason,class1,class2,office,name,tel,text1,text2) values ('$time', '$reason','$class1','$class2','$office','$name','$tel','$text1','$text2')";
	$result = mysql_query($sql);
	echo $result? "yes" : "no";
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data, ENT_QUOTES);
   return $data;
}
