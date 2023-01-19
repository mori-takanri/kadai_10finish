<?php
session_start();
if (isset($_SESSION['reserve'])) {
    unset($_SESSION['reserve']);
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
         
          <h3>会議室使用の予定日入力</h3>
          <form method="post" action="reserveRoomList.php" >
            <table>
              <tr>
                <th>会議室利用の予定日</th>
                <td><input type="date" name="reserveDay" 
                           value="<?php echo date('Y-m-d'); ?>" 
                           min="<?php echo date('Y-m-d'); ?>" required></td>
              </tr>
            </table>
          <input class="submit_a" type="submit"style="background:black"; value="検索">
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
  
</body>
</html>