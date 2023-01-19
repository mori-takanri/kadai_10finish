<?php
  session_start();
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました：" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
  $roomNo = $_SESSION['reserve']['roomno'];
  $sql = "SELECT room_name  FROM room  WHERE  room_no = {$roomNo}";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $roomName = $row['room_name'];	// 部屋名称
  $reserveDay = $_SESSION['reserve']['day'];// 予約日

  $dname   = $_SESSION['reserve']['dname'];
  $dtelno  = $_SESSION['reserve']['dtelno'];
  $dmail   = $_SESSION['reserve']['dmail'];
  $reserveNumber = $_SESSION['reserve']['reserveNumber'];
  $checkin = $_SESSION['reserve']['checkin'];
  $message = $_SESSION['reserve']['message'];
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
      <li><a href="./roomList.php">会議室紹介</a></li>
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
        <form action="./reserveInsert.php" method="post">
        <h2>ご予約（最終確認）</h2>
        <p>予約内容をご確認後、よろしければ予約確定ボタンを押してください。</p>
        <h3>予約情報</h3>
        <table class="input">
          <tr><th>会議室の名称</th><td><?php echo $roomName; ?></td></tr>
          <tr><th>予約日</th><td><?php echo $reserveDay; ?></td></tr>
        </table>
        <br>
        <h3>代表者情報</h3>
        <table class="input">
          <tr><th>代表者氏名</th><td><?php echo $dname; ?></td></tr>
          <tr><th>連絡先電話番号</th><td><?php echo $dtelno; ?></td></tr>
          <tr><th>メールアドレス</th><td><?php echo $dmail; ?></td></tr>
        </table>
        <br>
        <h3>予約詳細情報</h3>
        <table class="input">
          <tr><th>利用人数</th><td><?php echo $reserveNumber; ?>人</td></tr>
          <tr><th>予定時間</th><td><?php echo $checkin; ?></td></tr>
          <tr><th>連絡事項</th><td><?php echo $message; ?></td></tr>
        </table>
        <br>
        <input class="submit_a" type="submit"style="background:black"; value="予約確定">
        <input class="submit_a" type="button" value="前の画面に戻る"style="background:black"; onclick="history.back();">
        </form>
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
      <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23E67C73&ctz=Asia%2FTokyo&showNav=1&showTitle=1&showDate=1&showPrint=0&showTabs=0&showCalendars=0&showTz=0&title=%E4%BA%88%E7%B4%84%E7%8A%B6%E6%B3%81&src=bW9yaXRha2Fub3JpMDYyOUBnbWFpbC5jb20&src=NGZmMTI5ODUwZjg0MzQ0ZDZiNDYzMTMzNTlmNDVjNTBjNjhkZTZlODQyMzIxNDY3NmY1ZDlmYWM2MDVmMTI3OEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=MDY4ZDE4NzgzMzY0N2RhOWZkZjkzNzcxMGU1MjIwYWNlMTc5YmVhMzU0YTBiOTljYzgzMTllMDAxMTNmNTAzOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%23E67C73&color=%23009688" style="border:solid 1px #777" width="200" height="350" frameborder="0" scrolling="no"></iframe>
    </aside>   
    <!-- サイド：終了 -->
    <!-- ページトップ：開始 -->
    <div id="pageTop">
      <a href="#top">ページのトップへ戻る</a>
    </div>
    <!-- ページトップ：終了 -->
  </div>
  <!-- コンテンツ：終了 -->
  <!-- フッター：開始 -->
  <footer id="footer">
    EZOHUBSAPPORO All Rights Reserved.
  </footer>
  <!-- フッター：終了 -->
<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>
</body>
</html>
