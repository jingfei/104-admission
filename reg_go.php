<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$time = test_input($_POST["time"]);
	$school = test_input($_POST["school"]);
	$office = test_input($_POST["office"]);
	$title = test_input($_POST["title"]);
	$name = test_input($_POST["name"]);
	$id = test_input($_POST["id"]);
	$birth = test_input($_POST["birth"]);
	$email = test_input($_POST["email"]);
	$food = test_input($_POST["food"]);
	$tel = test_input($_POST["tel"]);
	$cell = test_input($_POST["cell"]);
	$food1 = test_input($_POST["food1"]);
	$food2 = test_input($_POST["food2"]);
	$food3 = test_input($_POST["food3"]);
	$car1 = test_input($_POST["car1"]);
	$car2 = test_input($_POST["car2"]);
	$car3 = test_input($_POST["car3"]);
	$other1 = test_input($_POST["other1"]);
	$other2 = test_input($_POST["other2"]);
	$other3 = test_input($_POST["other3"]);
	$plate = test_input($_POST["plate"]);

	if($school=="" || $office=="" || $title=="" || $name=="" || $id=="" || $birth=="" || $email=="" || $tel=="" || $food=="" || $plate==""){
		echo "資料未填寫完整";
		return;
	}
	$plate = $plate=="X"?"":$plate;

	$sql = "INSERT into `register` (time, school, office, title, name, id, birth, email, food, tel, cell, food1, food2, food3, car1, car2, car3, other1, other2, other3, plate) values ('$time','$school','$office','$title','$name','$id','$birth','$email','$food','$tel','$cell','$food1','$food2','$food3','$car1','$car2','$car3','$other1','$other2','$other3','$plate')";
	$result = mysql_query($sql);
	echo $result? "yes" : "no";
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data, ENT_QUOTES);
   return $data;
}
