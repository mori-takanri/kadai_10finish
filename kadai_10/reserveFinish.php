<?php
session_start();
if (isset($_SESSION['reserveNo']) == false) {
    header("location: ./index.php");
    exit;
}
$reserveNo = $_SESSION['reserveNo'];
unset($_SESSION['reserveNo']);
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
      <p>会議スペース、イベントスペース利用に最適！とても綺麗な施設です</p>
    </div>
    <h1><a href="./index.php"><img src="./images/ezohublogo.png" alt=""></a></h1>
    <div id="contact">
      <h2 style="background:black";>お問い合わせ</h2>
      <span class="tel">☎011-788-7551 </span>
    </div>
  </header> 
  <!-- ヘッダー：終了 -->
  <!-- メニュー：開始 -->
  <nav id="menu">
    <ul>
      <li><a href="./index.php">ホーム</a></li>
      <li><a href="./roomList.php">会議室の紹介</a></li>
      <li><a href="./reserveDay.php">ご予約</a></li>
    </ul>
  </nav>
  <!-- メニュー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <!-- メイン：開始 -->
    <main id="main">
      <article>
  <!-- 各ページスクリプト挿入場所 -->
        <section>
          <h2>予約完了</h2>
          <p>予約が完了しました。以下の予約番号を控えておいてください。</p>
          <h3>予約情報</h3>
          <table class="input">
            <tr><th>予約番号</th><td><?php echo $reserveNo; ?></td></tr>
          </table>
          <br>
          <p>事前にお支払いの方は「お支払いへ」にお進み下さい。</p>
          <a class="submit_a" href="./form.php"style="background:black";>お支払いへ</a>

          <a class="submit_a" href="./index.php"style="background:black";>トップページへ</a>
        </section>
      </article>
    </main>
    <!-- メイン：終了 -->
    <!-- サイド：開始 -->
    <aside id="side">
      <section>
        <h2 style="background:black";>ご予約</style=></h2>
        <ul>
          <li><a href="#">予約日の入力</a></li>
        </ul>
      </section>
      <section>
        <h2 style="background:black";>会議室の紹介</h2>
    <?php include("./sideList.php"); ?>
      </section>
    </aside>
    <!-- サイド：終了 -->
   
  </div>
  <!-- コンテンツ：終了 -->
  
</body>
</html>
