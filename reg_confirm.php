<!DOCTYPE html>
<html>
<head>
	<title>104學年度公私立大學校院招生檢討會</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="keywords" content="招生檢討會">
	<link rel="shortcut icon" href="img/ncku.ico" type="image/x-icon" />
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script src="js/main.js"></script>
	<link rel=stylesheet type="text/css" href="style/main.css"/>
	<link rel=stylesheet type="text/css" href="style/semantic.min.css"/>
</head>
<body>
<?php
include("config.php");

// define variables and set to empty values
$school = $office = $title = $name = $id = $birth = $email = $tel = $cell = $food = $plate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
	$food1 = test_input($_POST["food1"]) == "on" ? 1 : 0;
	$food2 = test_input($_POST["food2"]) == "on" ? 1 : 0;
	$food3 = test_input($_POST["food3"]) == "on" ? 1 : 0;
	$car1 = test_input($_POST["car1"]) == "on" ? 1 : 0;
	$car2 = test_input($_POST["car2"]) == "on" ? 1 : 0;
	$car3 = test_input($_POST["car3"]) == "on" ? 1 : 0;
	$other1 = test_input($_POST["other1"]) == "on" ? 1 : 0;
	$other2 = test_input($_POST["other2"]) == "on" ? 1 : 0;
	$other3 = test_input($_POST["other3"]) == "on" ? 1 : 0;
	$plate = test_input($_POST["plate"]);
	
	$check = "SELECT * FROM `register` WHERE `id` = '$id'";
	$result = mysql_query($check)or die ("Error in query: $check. " . mysql_error());
	$rows = mysql_fetch_array($result);

	//判斷隊伍名稱是否為空值
	if (!empty($rows)){
		echo '<script>
		alert("已存在報名資料，請勿重複報名");
		history.go(-1);
		</script>';
	}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data, ENT_QUOTES);
   return $data;
}
?>
	<div class="ui secondary pointing five item fixed top large menu">
		<a class="item" href="./">首頁&nbsp;&nbsp;&nbsp;Home</a>
		<a class="item" href="agenda.html">議程&nbsp;&nbsp;&nbsp;Agenda</a>
		<a class="item active" href="reg.html">報名&nbsp;&nbsp;&nbsp;Registration</a>
		<a class="item" href="prop.html">提案&nbsp;&nbsp;&nbsp;Proposal</a>
		<a class="item" href="trans.html">交通住宿&nbsp;&nbsp;&nbsp;Transport & Stay </a>
	</div>
	<div class="content" id="success" style="margin:70px auto; width:80%;display:none;">
		<h1 class="ui header" style="color:green">報名成功，如仍有問題請聯繫我們，感謝。</h1>
	</div>
	<div class="content" id="content" style="margin:70px auto; width:80%">
		<h1 class="ui header">請再次確認以下報名資料是否正確</h1>
		<div class="ui dimmer"><div class="ui large loader"></div></div>
		<div class="ui fluid yellow card">
			<div class="content" style="background-color:#FFF0D6">
				<h2 class="ui header"><?php echo $name;?></h2>
				<div class="meta"><?php echo date('Y-m-d h:i:s A');?></div>
				<div class="description" style="color:#6e90cc">
					<h3>工作單位：<?php echo $school." ".$office." ".$title;?></h3>
					<h3>身分證字號：<?php echo $id;?></h3>
					<h3>生日：<?php echo $birth;?></h3>
					<h3>E-mail: <?php echo $email;?></h3>
					<h3>飲食習慣：<?php echo $food;?></h3>
					<h3>電話：<?php echo $tel;?></h3>
					<?php if(strlen($cell)>0) echo '<h3>手機：'.$cell.'</h3>';?>
					<?php if($food1 || $food2 || $food3){
							echo '<h3>參與用餐：　';
							$used = false;
						  	if($food1){ echo '9月8日中餐'; $used=true; }
							if($food2){ 
								if($used) echo '、';
								echo '9月8日晚宴'; 
								$used=true;
							}
							if($food3){ 
								if($used) echo '、';
								echo '9月9日中餐';
							}
							echo '</h3>';
						  }
						  if(!$food1 || !$food2 || !$food3){
							echo '<h3>不參與用餐：';
							$used = false;
						  	if(!$food1){ echo '9月8日中餐'; $used=true; }
							if(!$food2){ 
								if($used) echo '、';
								echo '9月8日晚宴';
								$used=true;
							}
							if(!$food3){ 
								if($used) echo '、';
								echo '9月9日中餐';
							}
							echo '</h3>';
						  }
					?>
					<?php echo '<h3>搭乘接駁專車：';
						  $used=false;
					  	  if($car1){ echo '9月8日高鐵台南站至會場'; $used=true;}
					  	  if($car2){ 
							  if($used) echo '、';
							  echo '9月9日會場至高鐵台南站'; 
							  $used=true;
							 }
					  	  if($car3){
							  if($used) echo '、';
							  echo '會場往返住宿飯店';
						  }
						  if(!$car1 && !$car2 && !$car3) echo '皆不搭乘';
						  echo '</h3>';
					?>
					<h3>
					<?php if($other3) echo '將自行開車前往本校，車牌號碼：'.$plate;
						  else echo '不自行開車前往本校';
					?>
					</h3><h3>
					<?php if($other1) echo '將參加文教活動(暫訂奇美博物館)';
						  else echo '不參加文教活動(暫訂奇美博物館)';
					?>
					</h3><h3>
					<?php if($other2) echo '需要公務人員終身學習時數';
						  else echo '不需要公務人員終身學習時數';
					?></h3>
				</div>
			</div>
			<div class="extra content">
				<div class="ui two buttons">
					<div class="ui basic green button" onClick="Submit()">確認報名</div>
					<div class="ui basic red button" onClick="Back()">返回修改</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="ui divider grid small header" style="margin:0 10px">
		<div class="stackable row">
			<div class="left floated four wide column">
				[contact]<br/>
				招生組組長 黃信復<br/> 0938-534-893<br/> 06-2757575 #50191<br/> sfhuang@mail.ncku.edu.tw<br/><br/>
			</div>
			<div class="left floated four wide column"><br/>
				招生組組員 許明如<br/> 06-2757575 #50198<br/> z9302009@email.ncku.edu.tw
			</div>
			<div class="right floated right aligned six wide column" style="color:gray"><br/>
				Copyright &copy; 2015 國立成功大學<br/>
				70101 台南市東區大學路一號&nbsp;｜&nbsp;06-2757575<br/>
				Designed by Jingfei
			</div>
		</div>
	</footer>
</body>
<script>
function Submit(){
	$(".dimmer").addClass("active");
	$.ajax({
		url: "reg_go.php",
		method: "POST",
		data:{
			time: '<?php echo date('Y-m-d H:i:s');?>',
			school: '<?php echo $school; ?>', 
			office: '<?php echo $office; ?>',
			title: '<?php echo $title; ?>',
			name: '<?php echo $name ; ?>',
			id: '<?php echo $id; ?>',
			birth: '<?php echo $birth; ?>',
			email: '<?php echo $email; ?>',
			food: '<?php echo $food; ?>',
			tel: '<?php echo $tel; ?>',
			cell: '<?php echo $cell; ?>',
			food1: '<?php echo $food1; ?>',
			food2: '<?php echo $food2; ?>',
			food3: '<?php echo $food3; ?>',
			car1: '<?php echo $car1; ?>',
			car2: '<?php echo $car2; ?>',
			car3: '<?php echo $car3; ?>',
			other1: '<?php echo $other1; ?>',
			other2: '<?php echo $other2; ?>',
			other3: '<?php echo $other3; ?>',
			plate: '<?php echo $plate; ?>',
		}
	}).done(function(data){
		if(data.indexOf("yes")>-1){
			$(".dimmer").removeClass("active");
			$("#content").hide();
			$("#success").show();
		}else{
			alert(data+"\n報名失敗，請再次報名，謝謝");
			history.go(-1);
		}
	}).fail(function(){
		alert("報名失敗，請再次報名，若仍無法報名，請聯絡管理員，謝謝");
		history.go(-1);
	});
}
function Back(){history.go(-1);}
</script>
</html>

