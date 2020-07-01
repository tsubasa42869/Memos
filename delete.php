<?php require('dbConnect.php');?>

<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
        <title>削除画面</title>
    <link rel="stylesheet" href="./css/allPage.css">
</head>
<script type="text/javascript" src="./js/returnHome.js"></script>

<body>
 <header><h1>メモの削除</h1></header>
<?php 
$id=$_REQUEST['id'];
if(isset($id) && is_numeric($id)){
		$statement=$db->prepare('DELETE FROM memos WHERE id=?');
		$statement->execute(array($id));
}
?>
  <main>
<p>メモを削除しました。</p>
  </main>
</body>
</html>
