<?php require('dbConnect.php'); ?>

<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>全文表示</title>
  <link rel="stylesheet" href="./css/allPage.css">
<style>
.button{
	text-align:center;
}
#error{ color:red;font-size:30px;
}
</style>
 </head>

<body>
 <header><h1>全文表示</h1></header>
  <main>
<?php
$id = $_REQUEST['id'];
if(!is_numeric($id) || $id <=0 ):?>
		<p id="error">※idは1以上の数字で指定してください</p>
<?php  exit(); endif; ?>

<?php 
$memos= $db->prepare('SELECT * FROM memos WHERE id=?');
$memos->execute(array($id));
$memo = $memos->fetch();
?>
<article>
	<p><?php print htmlspecialchars($memo['memo'],ENT_QUOTES);?></p>
	<div class="button">
	<a class="returnHome" href="main.php">メモ一覧に戻る</a>
	<a class="CLUD_btn" href="update.php?id=<?php print($memo['id']);?>">メモを変更する</a>
	<a class="CLUD_btn" href="delete.php?id=<?php print($memo['id']);?>">メモを削除する</a>
	</div>
</article>
 </main>
</body>
</html>
