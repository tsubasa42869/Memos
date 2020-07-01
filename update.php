<?php require('dbConnect.php');?>

<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
        <title>更新画面</title>
    <link rel="stylesheet" href="./css/allPage.css">
    <link rel="stylesheet" href="./css/update.css">
</head>
<script type="text/javascript" src="./js/countLength.js"></script>

<?php 
$id=$_REQUEST['id'];
if(isset($id) && is_numeric($id)){
	$memos=$db->prepare('SELECT * FROM memos WHERE id=?');
	$memos->execute(array($id));
	$memo=$memos->fetch();
}
?>
<body>
 <header><h1>メモの内容を変更する</h1></header>
  <main>
   <form action="checkUpdate.php" method="post">
    <input type="hidden" name="id" value="<?php print($id);?>">
	<textarea name="memo" cols="120" rows="20" onkeyup="ShowLength(value);" required><?php print($memo['memo']);?></textarea>
    <div class="btn_position">
	 <button class="CLUD_btn" type="submit">変更する</button>
	 <a class="returnHome" href="main.php">メモ一覧に戻る</a>
	 <div class="length_btn"><p id="inputlength">0文字</p></div>
    </div>
  </form>
 </main>
</body>
</html>
