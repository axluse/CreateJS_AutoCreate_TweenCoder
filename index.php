<?php

/**
 * Tween自動作成
 */

if(isset($_POST['submit']) && $_POST['tween_id'] != ""){
	// コメント文
	$returnText  = "// TweenSet  [".$_POST['tween_id']."]\n" ;

	// 中央表示がON
	if($_POST['chg_center'] == "center"){
	$returnText .= "centerView(". $_POST['tween_id']  .");\n";
	}

	// リギングON
	if($_POST['chg_reg'] == "rig"){
	$returnText .= "\nreg(". $_POST['tween_id']  .");\n";
	}

	// 初期POSX
	if($_POST['x']){
	$returnText .= $_POST['tween_id']  . ".x = ".$_POST['x'] .";\n";
	}

	// 初期POSY
	if($_POST['y']){
	$returnText .= $_POST['tween_id']  . ".y = ".$_POST['y'] .";\n";
	}

	// CreateJsTween呼び出し文
	$returnText  .= "\ncreatejs.Tween.get(" . $_POST['tween_id'] . ")";

	// Tween起動猶予時間
	if($_POST['wait_time']){
	$returnText .= "\n.wait( " . $_POST['wait_time'] . " )";
	}

	// フェードイン
	if($_POST['fadein']){
		$returnText .= "\n.to({ alpha: 1 }, " . $_POST['fadein'] . " )";
	}

	// フェードウェイト
	if($_POST['fadewait']){
		$returnText .= "\n.wait( " . $_POST['fadewait'] . " )";
	}

	// 移動POSXとPOSYが存在している場合
	if($_POST['afx'] && $_POST['afy'] && $_POST['aft']){
		$returnText .= "\n.to({ x: ".$_POST['afx'].", y: ".$_POST['afy']." }, " . $_POST['aft'] . " )";

	// 移動POSXと時間が設定されている場合
	} else if($_POST['afx'] && $_POST['aft']){
		$returnText .= "\n.to({ x: ".$_POST['afx']." }, " . $_POST['aft'] . " )";

	// 移動POSYと時間が設定されている場合
	} else if($_POST['afy'] && $_POST['aft']) {
		$returnText .= "\n.to({ y: ".$_POST['afy']." }, " . $_POST['aft'] . " )";
	}

	// FadeOut
	if($_POST['fadeout']){
		$returnText .= "\n.to({ alpha: 0 }, " . $_POST['fadeout'] . " )";
	}

	echo $returnText;
} else if(isset($_POST['submit'])){
	echo "エラー";
} else {
	require_once (__DIR__ . '/tpl.php');
}
?>