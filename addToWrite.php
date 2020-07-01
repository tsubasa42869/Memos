<?php  require('dbConnect.php'); ?>

<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
		<title>メモ追加</title>
        <link rel="stylesheet" href="./css/allPage.css">
        <link rel="stylesheet" href="./css/addToWrite.css">
</head>
<script type="text/javascript" src="./js/countLength.js"></script>

<body>
 <header><h1>メモ追加ページ</h1></header>

 <main>
 <form action="checkInput.php" method="post">
  <textarea name="memo" cols="120" rows="20" placeholder="メモを記入してください" onkeyup="ShowLength(value);"
required></textarea><br>
	<div class="btn_position">
	<button class="CLUD_btn" type="submit">書き込む</button>
	<a class="returnHome" href="main.php">メモ一覧に戻る</a>
	<div class="length_btn"><p id="inputlength">0文字</p></div>
 </div>
 </form>
 </main>
</body>
</html>
