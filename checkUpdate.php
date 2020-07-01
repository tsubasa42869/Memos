<?php require('dbConnect.php');?>
<!DOCTYPE html>
<html lang="ja">
<head>
 <meta charset="UTF-8">
 <title>変更確認画面</title>
 <link rel="stylesheet" href="./css/allPage.css">
</head>
<script type="text/javascript" src="./js/returnHome.js"></script>

<body>
 <header><h1>メモ変更</h1></header>

<?php
$memo=htmlspecialchars($_POST['memo'],ENT_QUOTES);
$statement=$db->prepare('UPDATE memos SET memo=? WHERE id=?');
$statement->execute(array($memo,$_POST['id']));
?> 

 <main>
  <p>メモを変更しました。</p>
 </main>
</body>
</html>

