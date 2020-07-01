<?php require('dbConnect.php'); ?>

<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
   <title>index</title>
    <link rel="stylesheet" href="./css/allPage.css">
    <link rel="stylesheet" href="./css/main.css">
 </head>

<body>
 <header>
  <h1>メモ一覧</h1>
   <div><a class="CLUD_btn" href="addToWrite.php">メモを追加する</a>
   <a class="btn-returnPortfolio" href="#">&rsaquo;Portfolioに戻る</a></div>
 </header>
 <main>
<?php 
if(isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
		$page=$_REQUEST['page'];
}else{
		$page=1;
}
	  $startPage=5*($page-1);
      $memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?,10'); 
	  $memos->bindParam(1,$startPage,PDO::PARAM_INT);
      $memos->execute();
	  while($memo = $memos->fetch()):?>

<?php if((mb_strlen($memo['memo']))>50):?>
<p><a class="listOfMemos" href="showAll.php?id=<?php print($memo['id']);?>"><?php print(mb_substr($memo['memo'],0,50));?>...</a></p>
<?php else:?>
<p><a class="listOfMemos" href="showAll.php?id=<?php print($memo['id']);?>"><?php print(mb_substr($memo['memo'],0,50));?></a></p>
<?php endif;?>
<time><?php print($memo['created_at']); ?></time><hr>
<?php endwhile;?>

<div class="pageCount-parents">
<?php	if($page >= 2):?>
<a class="pageCount" href="main.php?page=<?php print($page-1);?>"><?php print($page-1);?>ページ目</a>
<?php endif;?>
|
<?php 
	  $counts=$db->query('SELECT COUNT(*) AS cnt FROM memos');
	  $count=$counts->fetch();    
	  $maxPage=ceil($count['cnt']/5)+1;
	  if($page < $maxPage):?>
<a class="pageCount" href="main.php?page=<?php print($page+1);?>"><?php print($page+1);?>ページ目</a><?php endif;?>
</div>
 </main>
</body>
</html>
