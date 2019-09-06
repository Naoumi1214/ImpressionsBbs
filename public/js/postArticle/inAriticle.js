document.addEventListener("DOMContentLoaded", function () {
	/**
     * 感想記事をAjaxでPostし、htmlに記事を反映させる
     */
	function outinArticlAjax() {
		var xhr = new XMLHttpRequest();

		//感想記事のフォームの内容を取得
		var intitle = document.getElementById('intitle').value;
		console.log("title" + intitle);
		var inmessag = document.getElementById('inmessage').value;
		console.log("message" + inmessag);

		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4) {
				//通信完了時
				if (xhr.status === 200) {
					//通信が成功した場合
					console.log('did');
					console.log(JSON.parse(xhr.responseText));
				} else {
					//通信がが失敗した場合
					console.log('did not');

				}
			} else {
				//通信が関する前
				console.log('loding');
			}
		};



		xhr.open('POST', '/inArticle', true);
		xhr.setRequestHeader('content-type',
			'application/x-www-form-urlencoded;charset=UTF-8');
		var token = document.getElementsByName('csrf-token').item(0).content;
		xhr.setRequestHeader('X-CSRF-Token', token);
		xhr.send('title=' + intitle + '&message=' + inmessag);

	}



	//投稿ボタンを押した場合の処理
	document.getElementById("insubmit").addEventListener('click', function () {
		outinArticlAjax();
	}, false);

}, false);
