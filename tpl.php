<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
  </head><body>
  <script type="text/javascript">
  $(function(){
		$('#function_centerview').on("click", function(){

			$('#text_area').val("// 画像中央表示"
					+"\nfunction centerView(img){"
					+"\n	img.regX = img.getBounds().width  / 2;"
					+"\n	img.regY = img.getBounds().height / 2;"
					+"\n	img.x = winWidth  / 2;"
					+"\n	img.y = winHeight / 2;"
				    +"\n}");
		});
		$('#function_reg').on("click", function(){

			$('#text_area').val("// 画像軸を中央にする"
					+"\nfunction reg(img){"
					+"\n	img.regX = img.getBounds().width  / 2;"
					+"\n	img.regY = img.getBounds().height / 2;"
				    +"\n}");
		});
		$('#function_fadeout').on("click", function(){

			$('#text_area').val("// フェードアウト"
					+"\nfunction fade(firstWait,inTime, outTime, waitTime){"
					+"\n	var white1 = new createjs.Bitmap(imgs['white1']);"
					+"\n\n	white1.alpha=0;"
					+"\n\n	Layer[11].addChild(white1);"
					+"\n\n	createjs.Tween.get(white1)"
					+"\n	.wait(firstWait)"
					+"\n	.to({alpha: 1}, inTime)"
					+"\n	.wait(waitTime)"
					+"\n	.to({alpha: 0}, outTime);"
				    +"\n}");
		});

		var centerParam = "";
		var regParam = "";
		$('#submition').on('click', function(){
			if($("#chg_center").is(':checked')){
				centerParam = "center";
				regParam = "";
			} else if ($("#chg_reg").is(':checked')){
				regParam = "rig";
				centerParam = "";
			} else {
				centerParam = "";
				regParam = "";
			}
			$.ajax({
				type: 'POST',
				url: 'index.php',
				data: {
					'submit':'true',
					'tween_id'  : $("#tween_id").val(),
					'x'         : $("#x").val(),
					'y'         : $("#y").val(),
					'wait_time' : $('#wait_time').val(),
					'fadein'    : $("#fadein").val(),
					'fadewait'  : $("#fadewait").val(),
					'fadeout'   : $("#fadeout").val(),
					'afx'       : $("#afx").val(),
					'afy'       : $("#afy").val(),
					'aft'       : $("#aft").val(),
					'chg_center': centerParam,
					'chg_reg'   : regParam
				},
				success: function(result) {
					$('#parse_result').val(result + ";");
				}
			});
		});

		$('#width_data').change(function(){
			MathfWidth();
		});

		$('#height_data').change(function(){
			$('#height_ans').val(Number($('#height_data').val()) - 960);
		});

		$('#left').change(function(){
			$('#right').prop('checked',false);
			MathfWidth();
		});
		$('#right').change(function(){
			$('#left').prop('checked',false);
			MathfWidth();
		});

		var loop = "";
		$('#e_sub').on('click', function(){
			if($("#e_loop").is(':checked')){
				loop = "loop";
			} else {
				loop = "";
			}
			$.ajax({
				type: 'POST',
				url: 'effect.php',
				data: {
					'submit':'true',
					'emn'        : $("#emn").val(),
					'eln'        : $("#eln").val(),
					'tween1_id'  : $("#tween1_id").val(),
					'tween2_id'  : $("#tween2_id").val(),
					'tween3_id'  : $("#tween3_id").val(),
					'effects'    : $("#effects").val(),
					'interval'   : $("#time").val(),
					'loop'       : loop
				},
				success: function(result) {
					$('#effect_result').val(result);
				}
			});
		});

  });
	function MathfWidth(){
		if($("#left").is(':checked')){
			var ans = Number($('#width_data').val()) - 640;
			$('#width_ans').val("");
			$('#width_ans').val("-" + ans);
		} else {
			$('#width_ans').val("");
			$('#width_ans').val(Number($('#width_data').val()) - 640);
		}
	}
	function MathfHeight(){

	}
  </script>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>自動コーディング
                <small>Tween</small>
              </h1>
            </div>
            <form class="form-horizontal" role="form" action="Tween.php" method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">Tween対象ID</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tween_id" id="tween_id" placeholder="tweenID">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">初期位置X</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="x" id="x" placeholder="X">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">初期位置Y</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="y" id="y" placeholder="Y">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">初期待ち時間</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="wait_time" id="wait_time" placeholder="WaitTime">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">フェードイン</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="fadein" id="fadein" placeholder="InTime">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">フェード間隔</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="fadewait" id="fadewait" placeholder="FadeWait">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">移動位置X</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="afx" id="afx" placeholder="MoveToX">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">移動位置Y</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="afy" id="afy" placeholder="MoveToY">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">移動時間</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="aft" id="aft" placeholder="MoveTime">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">フェードアウト</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="fadeout" id="fadeout" placeholder="OutTime">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label><input type="checkbox" name="chg_center" id="chg_center" value="center" >中央表示</label>
                    <br><label><input type="checkbox" name="chg_reg" id="chg_reg" value="rig" >リギング</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" name="submition" id="submition" class="btn btn-default">パース開始</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="section" style="margin-top: -50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" name="copy_main" id="copy_main" class="btn btn-default" data-clipboard-target="#parse_result">クリップボードにコピー</button>
              </div>
              <div class="col-sm-12">
                <textarea class="form-control" id="parse_result" placeholder="OutPutField" line="10" rows="10" readonly=""
                ></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>自作関数リファレンス</h1>
            </div>
            <a class="btn btn-success" id="function_centerview">関数表示 [Center View]</a>
            <a class="btn btn-success" id="function_reg">関数表示 [reg]</a>
            <a class="btn btn-success" id="function_fadeout">関数表示 [fadeout]</a><br><br>
          </div>
          <div class="col-sm-12">
            <textarea class="form-control" id="text_area" placeholder="OutPutField" line="10" rows="10" readonly=""></textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>オートサイズ計算機</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p>原寸大</p>
            <div class="form-group">
              <div class="col-sm-2">
                <label for="inputPassword3" class="control-label">横</label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="width_data" placeholder="Width">
              </div>
              <div class="col-sm-2">
                <label for="inputPassword3" class="control-label">縦</label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="height_data" placeholder="Height">
              </div>
            </div>
			<p>答え</p>
            <div class="form-group">
              <div class="col-sm-2">
                <label for="inputPassword3" class="control-label">横</label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="width_ans" placeholder="Width" readonly="">
              </div>
              <div class="col-sm-2">
                <label for="inputPassword3" class="control-label">縦</label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="height_ans" placeholder="Height" readonly="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label><input type="checkbox" name="chg_center" id="left" checked > 左 ← | → 右 </label>
                  <label>　</label><input type="checkbox" name="chg_reg" id="right" value="rig" >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h1>自動コーディング
                <small>エフェクト</small>
              </h1>
            </div>
            <form class="form-horizontal" role="form" method="post">
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">関数名</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="emn" id="emn" placeholder="関数名">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">レイヤー番号</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="eln" id="eln" placeholder="layer">
                </div>
              </div>
              <div class="form-group">
              <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">エフェクト数</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="effects" id="effects" placeholder="エフェクト数">
                </div>
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">Tween対象ID①</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tween1_id" id="tween1_id" placeholder="tweenID1">
                </div>
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">Tween対象ID②</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tween2_id" id="tween2_id" placeholder="tweenID2">
                </div>
                <div class="col-sm-2">
                  <label for="inputEmail3" class="control-label">Tween対象ID③</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tween3_id" id="tween3_id" placeholder="tweenID3">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="inputPassword3" class="control-label">インターバル</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="time" id="time" placeholder="Interval Time">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label><input type="checkbox" name="e_loop" id="e_loop" value="loop" >ループする</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" name="e_sub" id="e_sub" class="btn btn-default">自動コーディング開始</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="section" style="margin-top: -50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="effect_result" placeholder="OutPutField" line="10" rows="10" readonly=""
                ></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</body></html>