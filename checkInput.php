<?php require('dbConnect.php');?>

<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="UTF-8">
        <title>入力内容表示</title>
    <link rel="stylesheet" href="./css/allPage.css">
</head>
<script type="text/javascript" src="./js/returnHome.js"></script>
<body>
 <header><h1>入力確認ページ</h1></header> 

<?php
$memo=htmlspecialchars($_POST['memo'],ENT_QUOTES);
$statement=$db->prepare('INSERT INTO memos SET memo=?,created_at=NOW()');
$statement->bindParam(1,$memo);
$statement->execute();
?>
</pre>
 <main>
<p>メッセージを登録しました</p>
 </main>
</body>
</html>
