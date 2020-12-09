		// KV用 Init
		$(document).ready(function(){//スライド複数設置可

		//KV用 上部大スライドショー設定
		$('#kv-slider').pogoSlider({
			preserveTargetSize: true,		//スマホ
			responsive: true,				//レスポンシブ
			targetWidth: 2000,				//画像幅
			targetHeight: 1012,				//画像高さ
			autoplay: true,					//自動再生
			//画像
			autoplayTimeout: 7000,			//1画像表示時間
			//エフェクト
			slideTransition: 'fade',//エフェクトテーマ一括指定(１つのみ・複数エフェクトNG/ data-transition各要素で指定も可)
			slideTransitionDuration: 2000,	//エフェクト時間(data-duration要素で指定も可)
			//オプション
			displayProgess: false,			//進捗バー表示 切替テーマ"fold"は進捗バー表示falseにすると切替エラー発生
			generateButtons: false,			//次へ前へボタン
			buttonPosition: 'CenterHorizontal',		//次へ前へボタン位置(TopLeft/TopRight/BottomLeft/BottomRight/CenterHorizontal/CenterVertical)
			generateNav: false,				//ドットページャー表示
			navPosition: 'Bottom',			//ページャー位置(Top/Bottom/Left/Right)
			pauseOnHover: false,			//マウスホバー時にスライド停止
			baseZindex: 1					//スライドのz-index指定(必要時のみ)
		}).data('plugin_pogoSlider');
		});
