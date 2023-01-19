<?php
session_start();
$loginerr = "";
if (isset($_SESSION["loginerr"])) {
    $loginerr = "<p style='color: red;'>".$_SESSION["loginerr"]."</p>";
    unset($_SESSION["loginerr"]);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/style.css" type="text/css">
  <title>EZOHUBSAPPORO</title>
</head>
<body>
  <!-- ヘッダー：開始-->
  <header id="header">
    <div id="pr">
 
   </div>
    <h1><a href="./index.php"><img src="./images/ezohublogo.png" alt=""></a></h1>
    <div id="contact">
      <h2 style="background:black";>お問い合わせ</h2>
      <span class="tel">☎011-788-7551 </span>
    </div>
  </header>
  <!-- ヘッダー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <h2>管理者ログイン画面</h2>
    <p>管理者のIDとパスワードを入力してください。</p>
    <form method="post" action="./ownerCheck.php">
    <table class="host">
      <tr>
        <th>オーナーID</th>
        <td><input type="text" name="id"></td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td><input type="password" name="pass"></td>
      </tr>
    </table>
<?php echo $loginerr; ?>
  <input class="submit_a" type="submit" style="background:black"value="ログイン">
  <button style="background:black";><a href="./index.php"style="color: white";>申込画面に戻る</a></button>

    </form>
  </div>
  <!-- コンテンツ：終了 -->
  
</body>
</html>
