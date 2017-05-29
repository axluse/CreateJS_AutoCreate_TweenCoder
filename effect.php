<?php

/**
 * EffectTween自動作成用
 */


if(isset($_POST['submit']) && $_POST['tween1_id'] != ""){
	$returnText = "";

	$txt1 = "var ";
	$txt2 = " = new createjs.Bitmap(imgs['";
	$txt3 = "']);";

	// 関数化する
	$returnText .="function " . $_POST['emn'] . '() {';

	// エフェクトの数(2 or 3)
	if($_POST['effects']){
		// エフェクト2つの場合の処理
		if($_POST['effects'] == "2"){
			// 初期設定
			$returnText .= "\n	" .$txt1 . $_POST['tween1_id'] . $txt2 . $_POST['tween1_id'] . $txt3;
			$returnText .= "\n	" .$txt1 . $_POST['tween2_id'] . $txt2 . $_POST['tween2_id'] . $txt3;
			$returnText .= "\n";
			$returnText .= "\n	" .$_POST['tween1_id'] .".alpha = 0;";
			$returnText .= "\n	" .$_POST['tween2_id'] .".alpha = 0;";
			$returnText .= "\n";
			$returnText .= "\n	Layer[" . $_POST['eln'] . "].addChild(" . $_POST['tween1_id'] . ");";
			$returnText .= "\n	Layer[" . $_POST['eln'] . "].addChild(" . $_POST['tween2_id'] . ");";
			$returnText .= "\n";
			// Tween1
			$returnText .= "\n	createjs.Tween.get(" . $_POST['tween1_id'];
			// ループ処理であるか
			if($_POST['loop'] == "loop"){ $returnText .= ", {loop: true})"; }
			else { $returnText .= ")"; }
			$returnText .= "\n	 .to({alpha: 1}, ". $_POST['interval'] . ")";
			$returnText .= "\n	 .to({alpha: 0}, ". $_POST['interval'] . ")";
			$returnText .= "\n	 .wait(". (intval($_POST['interval']) * 2) .");";
			// Tween2
			$returnText .= "\n\n	createjs.Tween.get(" . $_POST['tween2_id'];
			// ループ処理であるか
			if($_POST['loop'] == "loop"){ $returnText .= ", {loop: true})"; }
			else { $returnText .= ")"; }
			$returnText .= "\n	 .wait(". (intval($_POST['interval']) * 2) .")";
			$returnText .= "\n	 .to({alpha: 1}, ". $_POST['interval'] . ")";
			$returnText .= "\n	 .to({alpha: 0}, ". $_POST['interval'] . ");";

		// エフェクト３つの場合の処理
		} else {
			$returnText .= "\n	" .$txt1 . $_POST['tween1_id'] . $txt2 . $_POST['tween1_id'] . $txt3;
			$returnText .= "\n	" .$txt1 . $_POST['tween2_id'] . $txt2 . $_POST['tween2_id'] . $txt3;
			$returnText .= "\n	" .$txt1 . $_POST['tween3_id'] . $txt2 . $_POST['tween3_id'] . $txt3;
			$returnText .= "\n";
			$returnText .= "\n	" .$_POST['tween1_id'] .".alpha = 0;";
			$returnText .= "\n	" .$_POST['tween2_id'] .".alpha = 0;";
			$returnText .= "\n	" .$_POST['tween3_id'] .".alpha = 0;";
			$returnText .= "\n";
			$returnText .= "\n	Layer[" . $_POST['eln'] . "].addChild(" . $_POST['tween1_id'] . ");";
			$returnText .= "\n	Layer[" . $_POST['eln'] . "].addChild(" . $_POST['tween2_id'] . ");";
			$returnText .= "\n	Layer[" . $_POST['eln'] . "].addChild(" . $_POST['tween3_id'] . ");";
			$returnText .= "\n";

			// Tween1
			$returnText .= "\n	createjs.Tween.get(" . $_POST['tween1_id'];
			// ループ処理であるか
			if($_POST['loop'] == "loop"){ $returnText .= ", {loop: true})"; }
			else { $returnText .= ")"; }
			$returnText .= "\n	.to({alpha: 1}, ". $_POST['interval'] . ")";
			$returnText .= "\n	.to({alpha: 0}, ". $_POST['interval'] . ")";
			$returnText .= "\n	.wait(". (intval($_POST['interval']) * 2 * 3) .");";
			// Tween2
			$returnText .= "\n\n	createjs.Tween.get(" . $_POST['tween2_id'];
			// ループ処理であるか
			if($_POST['loop'] == "loop"){ $returnText .= ", {loop: true})"; }
			else { $returnText .= ")"; }
			$returnText .= "\n	.wait(". (intval($_POST['interval']) * 2) .")";
			$returnText .= "\n	.to({alpha: 1}, ". $_POST['interval'] . ")";
			$returnText .= "\n	.to({alpha: 0}, ". $_POST['interval'] . ")";
			$returnText .= "\n	.wait(". (intval($_POST['interval']) * 2 * 2) .");";
			// Tween3
			$returnText .= "\n	createjs.Tween.get(" . $_POST['tween3_id'];
			// ループ処理であるか
			if($_POST['loop'] == "loop"){ $returnText .= ", {loop: true})"; }
			else { $returnText .= ")"; }
			$returnText .= "\n	.wait(". (intval($_POST['interval']) * 2 * 3) .")";
			$returnText .= "\n	.to({alpha: 1}, ". $_POST['interval'] . ")";
			$returnText .= "\n	.to({alpha: 0}, ". $_POST['interval'] . ");";
		}

		// 関数を閉じる
		$returnText .= "\n}";
	}

	// 出力
	echo $returnText;

} else if(isset($_POST['submit'])){
	echo "エラー";
} else {
	require_once (__DIR__ . '/tpl.php');
}

?>