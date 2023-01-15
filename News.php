<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="News.css" rel="stylesheet">
</head>
<body>
    <div  id="divTop" >
      
        <h1 id="hTop">خبر گزاری UUT</h1>
     </div>

    <div id="OandN">
      <div id="openNew">
      
      </div>
     <div id="News">
       <?php
error_reporting(E_ALL & ~E_NOTICE);
define("DB_HOST", "localhost");
define("DB_NAME", "news");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");
$index=0;


try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME, 
    DB_USER, DB_PASSWORD
  );
} catch (Exception $ex) { exit($ex->getMessage()); }


$stmt = $pdo->prepare("SELECT * FROM `news`");
$stmt->execute();
$news = $stmt->fetchAll();

foreach ($news as $n) {
  $index++;
  echo "<div id='main'>
  <div id='main1'>
  
  <div id='imgNEW' ><img src=".$n['img'].">
  </div>

  <div id='ph1'>
  <h1>".$n['title']."</h1>
  <p>".$n['litleDes']."
  <span id=".$n['id']." onclick='showNew()'>بیشتر...</span></p>
  </div>
  
  </div>
  </div>";
}


$pdo = null;
$stmt = null;
?>
 </div>
</div>

     <script src="News.js"></script>

</body>
</html>