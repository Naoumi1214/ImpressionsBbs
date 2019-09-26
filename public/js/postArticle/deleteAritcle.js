document.addEventListener("DOMContentLoaded", function () {
	/**
     * 感想記事をAjaxでPostし、htmlに記事を削除させる
     */
	function deleteMyArticleAjax() {
		var xhr = new XMLHttpRequest();

		//感想記事のフォームの内容を取得
		var user_id = document.getElementById('user_id').value;
		var article_id = document.getElementById('article_id').value;
		console.log("user_id" + user_id);
		console.log("article_id" + article_id);

		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4) {
				//通信完了時
				if (xhr.status === 200) {
					//通信が成功した場合
					console.log('did');
					var json = Boolean(JSON.parse(xhr.responseText));
					console.log(json);
					if (json) {
						//削除対象のDOMを削除する
						var timeLine = document.getElementById('timeLine');
						var deleteTatgetAritcle = document.getElementById(article_id);
						timeLine.removeChild(deleteTatgetAritcle);
					} else {

					}


				} else {
					//通信がが失敗した場合
					console.log('did not');
				}
			} else {
				//通信が関する前
				console.log('loding');
			}
		};



		xhr.open('POST', '/deleteMyArticle', true);
		xhr.setRequestHeader('content-type',
			'application/x-www-form-urlencoded;charset=UTF-8');
		var token = document.getElementsByName('csrf-token').item(0).content;
		xhr.setRequestHeader('X-CSRF-Token', token);
		xhr.send('user_id=' + user_id + '&article_id=' + article_id);

	}



	//削除ボタンを押した場合の処理
	document.getElementById('timeLine').addEventListener('click', function (e) {
		deleteMyArticleAjax();
	}, false);

}, false);
