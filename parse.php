<?php

/**
 * CreateJSパース
 */

if(isset($_POST['submit'])){

	$txt1 = "var ";
	$txt2 = " = new createjs.Bitmap(imgs['";
	$txt3 = "']);";

	$slag = array();
	$sling = array();
	$penda = array();

	$json = str_replace(array(" "), "", $_POST['create']);
	$json = split(",",$json);
	foreach ($json as $r){
		if(strpos($r,'id') !== false){
			//'abcd'のなかに'bc'が含まれている場合
			$r = str_replace('id:\'', '', $r);
			$r = str_replace('\'', '', $r);
			$r = str_replace('}', '', $r);
			$slag[] = ($txt1.$r.$txt2.$r.$txt3);
			$sling[] = ($r.'.alpha=0;');
			$penda[] = ('Layer['.$_POST['tx'].'].addChild('.$r.');');
		}
	}
}
?>

<DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://code.createjs.com/easeljs-0.8.0.min.js"></script>
	<script type="text/javascript" src="http://code.createjs.com/preloadjs-0.6.0.min.js"></script>
	<script type="text/javascript" src="http://code.createjs.com/tweenjs-0.6.0.min.js"></script>
	<title>パース</title>
</head>
<body>

<form action="index.php" method="post">
<textarea name="create" rows="10" cols="50" style="font-size: 16px;"></textarea>
<input type="text" name="tx" value="" />
<input type="submit" name="submit" id="submit" value="パース"/>
</form>
<?php
if(isset($_POST['submit'])){
foreach ($slag as $i){
	echo '<p>' . $i . '</p>';
}
foreach ($sling as $l){
	echo '<p>' . $l . '</p>';
}
foreach ($penda as $p){
	echo '<p>' . $p . '</p>';
}
}
?>
</body>
</html>
