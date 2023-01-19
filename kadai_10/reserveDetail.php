<?php
  session_start();
  $dnameErr = "";
  if (isset($_SESSION['errMsg']['dname'])) {
    $dnameErr = "<span style='color: red;'>" . $_SESSION['errMsg']['dname'] ."</span>";
  }
  unset($_SESSION['errMsg']); // すべてのエラーメッセージをクリア
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました：" . mysqli_connect_error());
  }
  mysqli_set_charset($link, "utf8");
  $roomNo = $_GET['rno'];
  $sql = "SELECT room_name  FROM room  WHERE  room_no = {$roomNo}";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $roomName = $row['room_name'];
  $_SESSION['reserve']['roomno'] = $roomNo;
  $reserveDay = $_SESSION['reserve']['day'];

  $dname = "";
  if (isset($_SESSION['reserve']['dname']) == true) {
      $dname = $_SESSION['reserve']['dname'];
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
    <h2>ご予約（詳細情報の入力）</h2>
    <p>詳細情報を入力後、予約確認ボタンを押してください。<br />
    （※がついている項目は入力必須項目です）</p>
    <h3>予約情報</h3>
    <table class="input">
      <tr><th>お部屋名称</th><td><?php echo $roomName; ?></td></tr>
      <tr><th>宿泊日</th><td><?php echo $reserveDay; ?></td></tr>
    </table><br />
    <h3>代表者情報</h3>
    <form method="post" action="reserveCheck.php" >
      <table class="input">
        <tr>
          <th>代表者氏名（※）</th>
          <td><input type="text" name="dname" value="<?php echo $dname; ?>" /><?php echo $dnameErr; ?></td></tr>
        <tr>
          <th>連絡先電話番号（※）</th>
          <td><input type="text" name="dtelno" value="" /></td></tr>
        <tr>
          <th>メールアドレス</th>
          <td><input type="text" name="dmail" value="" /></td></tr>
      </table><br />
    <h3>予約詳細情報</h3>
      <table class="input">
        <tr>
          <th>利用人数（※）</th>
        <td><input type="text" name="reserveNumber" value="" /></td>
        </tr>
        <tr>
          <th>予定時間（※）</th>
          <td><select name="checkin">
            <option value="">時間を選択</option>
            <option value="終日（9:00～18:00）"　>終日　（9:00～18:00）</option>
            <option value="午前　（9:00～12:00）">午前　（9:00～12:00）</option>
          
          <option value="午後　（13:00～18:00）"> 午後　（13:00～18:00）</option>
           
            <!-- <option value="10:00～11:00">10:00～11:00</option>
            <option value="11:00～12:00">11:00～12:00</option>
            <option value="12:00～13:00">12:00～13:00</option>
            <option value="13:00～14:00">13:00～14:00</option>
            <option value="14:00～15:00">14:00～15:00</option>
            <option value="15:00～16:00">15:00～16:00</option>
            <option value="16:00～17:00">16:00～17:00</option>
            <option value="17:00～18:00">17:00～18:00</option>
            <option value="18:00～19:00">18:00～19:00</option>
            <option value="19:00～20:00">19:00～20:00</option> -->

           
          </select></td>
        </tr>
        <tr>
          <th>連絡事項</th><td><textarea name="message" cols="40" rows="4"></textarea></td>
        </tr>
      </table><br />
    <p>まだ予約は確定しておりません。次の画面で確定させてください。</p>
    <input class="submit_a" type="submit"style="background:black"; value="予約確認" />
    <input class="submit_a" type="button" value="前の画面に戻る"style="background:black"; onclick="history.back();" />
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
  mysqli_free_result( $result );
  mysqli_close( $link );
?>
</body>
</html>
