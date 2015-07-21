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

// define variables and set to empty values
$reason = $other = $class2 = $office = $name = $tel = $text1 = $text2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$reason = test_input($_POST["reason"]);
	$other = test_input($_POST["other"]);
	$class2= test_input($_POST["class2"]);
	$office = test_input($_POST["office"]);
	$name = test_input($_POST["name"]);
	$tel = test_input($_POST["tel"]);
	$text1 = test_input($_POST["text1"]);
	$out1 = str_replace("\r\n", "<br/>", $text1);
	$text1 = str_replace("\r\n", "\\n", $text1);
	$text2 = test_input($_POST["text2"]);
	$out2 = str_replace("\r\n", "<br/>", $text2);
	$text2 = str_replace("\r\n", "\\n", $text2);
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
		<a class="item" href="reg.php">報名&nbsp;&nbsp;&nbsp;Registration</a>
		<a class="item active" href="prop.php">提案&nbsp;&nbsp;&nbsp;Proposal</a>
		<a class="item" href="trans.html">交通住宿&nbsp;&nbsp;&nbsp;Transport & Stay </a>
	</div>
	<div class="content" id="success" style="margin:70px auto; width:80%;display:none;">
		<h1 class="ui header" style="color:green">提案成功，如仍有問題請聯繫我們，感謝。</h1>
	</div>
	<div class="content" id="content" style="margin:70px auto; width:80%">
		<h1 class="ui header">請再次確認以下提案資料是否正確</h1>
		<div class="ui dimmer"><div class="ui large loader"></div></div>
		<div class="ui fluid teal card">
			<div class="content">
				<h2 class="ui header"><?php echo $reason;?></h2>
				<div class="meta"><?php echo date('Y-m-d h:i:s A');?></div>
				<div class="description">
					<h3><?php echo $other." ".$class2;?></h3>
					<h3><?php echo $office." ".$name." ".$tel;?></h3>
					<h3><b>說明：</b><br/>
						<div style="padding-left:20px"><?php echo $out1;?>
						</div></h3>
<?php
	if(strlen($text2)>0)
		echo '<h3><b>提案：</b><br/><div style="padding-left:20px">'.$out2.'</div></h3>';
?>
				</div>
			</div>
			<div class="extra content">
				<div class="ui two buttons">
					<div class="ui basic green button" onClick="Submit()">確認提案</div>
					<div class="ui basic red button" onClick="Back()">返回修改</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="ui divider grid small header" style="margin:0 10px">
		<div class="stackable row">
			<div class="left floated four wide column">
				[contact]<br/>
				招生組組長 黃信復<br/> 06-2757575 #50191<br/> sfhuang@mail.ncku.edu.tw<br/><br/>
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
		url: "prop_go.php",
		method: "POST",
		data:{
			time: '<?php echo date('Y-m-d H:i:s');?>',
			reason: '<?php echo $reason;?>',
			class1: '<?php echo $other; ?>',
			class2: '<?php echo $class2; ?>',
			office: '<?php echo $office; ?>',
			name: '<?php echo $name; ?>',
			tel: '<?php echo $tel; ?>',
			text1: '<?php echo $text1; ?>',
			text2: '<?php echo $text2; ?>',
		}
	}).done(function(data){
		if(data.indexOf("yes")>-1){
			$(".dimmer").removeClass("active");
			$("#content").hide();
			$("#success").show();
		}else{
			alert(data+"\n提交失敗，請再次提交，謝謝");
			history.go(-1);
		}
	}).fail(function(){
		alert("提交失敗，請再次提交，若仍無法提交，請聯絡管理員，謝謝");
		history.go(-1);
	});
}
function Back(){history.go(-1);}
</script>
</html>



