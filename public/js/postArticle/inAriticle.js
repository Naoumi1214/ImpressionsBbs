document.addEventListener("DOMContentLoaded", function () {
	/**
     * 感想記事をAjaxでPostし、htmlに記事を反映させる
     */
	function outinArticlAjax() {
		var xhr = new XMLHttpRequest();

		//感想記事のフォームの内容を取得
		var user_id = document.getElementById('user_id').value;
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
					var json = JSON.parse(xhr.responseText);
					console.log(json);
					console.log(json.title);

					//↓タイトル
					var title = json.title;
					//↓感想記事
					var message = json.message;

					//Jsonに配列があったら、バリデーションエラー
					if (Array.isArray(title) || Array.isArray(message)) {
						console.log("error");
						//↓エラーメッセージが入っている配列の番号
						var errorArrayNumber = 0;
						//↓エラーメッセージの背景色
						var errorValidationMeaageColr = "Red";
						//タイトルエラーメッセージ
						if (Array.isArray(title)) {
							document.getElementById("titleError").textContent = title[errorArrayNumber];
							document.getElementById("titleError").backgroundColr = errorValidationMeaageColr;
						}
						//感想記事エラーメッセージ
						if (Array.isArray(message)) {
							document.getElementById("messageError").textContent = message[errorArrayNumber];
							document.getElementById("messageError").backgroundColr = errorValidationMeaageColr;
						}
					} else {
						//バリデーションエラーが発生しなかった場合
						console.log("OK");
						//既にタイトルエラーメッセージを表示が表示されていた場合
						if (document.getElementById("titleError").textContent !== "") {
							document.getElementById("titleError").textContent = "";
						}
						//既に感想記事エラーメッセージを表示が表示されていた場合
						if (document.getElementById("messageError").textContent !== "") {
							document.getElementById("messageError").textContent = "";
						}
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



		xhr.open('POST', '/inArticle', true);
		xhr.setRequestHeader('content-type',
			'application/x-www-form-urlencoded;charset=UTF-8');
		var token = document.getElementsByName('csrf-token').item(0).content;
		xhr.setRequestHeader('X-CSRF-Token', token);
		xhr.send('title=' + intitle + '&message=' + inmessag+ '&user_id=' + user_id);

	}



	//投稿ボタンを押した場合の処理
	document.getElementById("insubmit").addEventListener('click', function () {
		outinArticlAjax();
	}, false);

}, false);
