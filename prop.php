<!DOCTYPE html>
<html>
<head>
	<title>104學年度公私立大學校院招生檢討會</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="keywords" content="招生檢討會">
	<link rel="shortcut icon" href="img/school.ico" type="image/x-icon" />
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/semantic.min.js"></script>
	<script src="js/main.js"></script>
	<link rel=stylesheet type="text/css" href="style/main.css"/>
	<link rel=stylesheet type="text/css" href="style/semantic.min.css"/>
	<script>
$(document).ready( function() {
	$('.ui.checkbox').checkbox();
	$('select.dropdown').dropdown();
	$("input").focus(function(){
		$(this).css("background-color","#dedede");
	});
	$("input").blur(function(){
		$(this).css("background-color","#ffffff");
	});
	$('#applyForm').form({
		reason:	{identifier: 'reason', 	rules:[{type: 'empty'}] },
		class1:	{identifier: 'class1',	rules:[{type: 'empty'}] },
		class2:	{identifier: 'class2',	rules:[{type: 'empty'}] },
		other:	{identifier: 'other',	rules:[{type: 'empty'}] },
		office:	{identifier: 'office',	rules:[{type: 'empty'}] },
		name:	{identifier: 'name',	rules:[{type: 'empty'}] },
		tel:	{identifier: 'tel',		rules:[{type: 'empty'}] },
		text1:	{identifier: 'text1',	rules:[{type: 'empty'}] },
	});
	$('#class1').change(function(){
		if( $(this).val()=="其他" ){
			$('#other').parent().show();
			$('#other').val("");
		}
		else{ 
			$('#other').parent().hide();
			$('#other').val( $(this).val() );
		}
	});
});
	</script>
</head>
<body>
	<div class="ui secondary pointing five item fixed top large menu">
		<a class="item" href="./">首頁&nbsp;&nbsp;&nbsp;Home</a>
		<a class="item" href="agenda.html">議程&nbsp;&nbsp;&nbsp;Agenda</a>
		<a class="item" href="reg.php">報名&nbsp;&nbsp;&nbsp;Registration</a>
		<a class="item active">提案&nbsp;&nbsp;&nbsp;Proposal</a>
		<a class="item" href="trans.html">交通住宿&nbsp;&nbsp;&nbsp;Trasport & Stay </a>
	</div>
	<div style="width:80%;margin:70px 10%;">
		<h1 class="ui header">「104學年度公私立大學校院招生檢討會議」提案</h1>
		<form id="applyForm" class="ui large form error" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">	
			<font color=red> * 必要填寫欄位</font><br/><br/>
			<div class="field">
				<div class="required fourteen wide field">
					<label for="school">案由</label>
					<input type="text" placeholder="案由" id="reason" name="reason" class="required" size="25" maxlength="25" />
					<br>
				</div>
			</div>
			<div class="three fields">
				<div class="required four wide field">
					<label for="class1">類別</label>
					<select name="class1" id="class1" class="ui food dropdown">
						<option value="">類別</option>
						<option value="學士班招生">學士班招生</option>
						<option value="研究所招生">研究所招生</option>	
						<option value="同等學力">同等學力</option>	
						<option value="轉學">轉學</option>	
						<option value="特種生">特種生</option>	
						<option value="其他">其他</option>
					</select>
				</div>
				<div class="required seven wide field" style="display:none">
					<label for="other">其他類別</label>
					<input type="text" placeholder="其他類別" id="other" name="other" class="required" size="25" maxlength="25" />
					<br>
				</div>
				<div class="required three wide field">
					<label for="class2">分類</label>
					<select name="class2" id="class2" class="ui food dropdown">
						<option value="">分類</option>
						<option value="討論案">討論案</option>
						<option value="宣導案">宣導案</option>
					</select>
				</div>
			</div>
			<div class="three fields">
				<div class="required seven wide field">
					<label for="office">提案單位</label>
					<input type="text" placeholder="提案單位" id="office" name="office" class="required" size="25" maxlength="25" />
					<br>
				</div>
				<div class="required four wide field">
					<label for="name">聯絡人</label>
					<input type="text" placeholder="聯絡人" id="name" name="name" class="required" size="25" maxlength="25" />
					<br>
				</div>
				<div class="required three wide field">
					<label for="tel">電話</label>
					<input type="text" placeholder="電話" id="tel" name="tel" class="required" size="25" maxlength="25" />
					<br>
				</div>
			</div>
			<div class="field">
				<div class="required fourteen wide field">
					<label for="text1">說明</label>
					<textarea style="height:400px" id="text1" name="text1"></textarea>
				</div>
			</div>
			<div class="field">
				<div class="fourteen wide field">
					<label for="text2">辦法</label>
					<textarea style="height:150px" id="text2" name="text2"></textarea>
				</div>
			</div>
			<br/>
			<div class="field">
				<button class="ui primary button" type="submit">確認提案</button>
			</div>
		</form>
	</div>
	<footer class="ui divider small header right aligned">Designed by Jingfei </footer>
</body>
</html>
