<?php
  if (empty($_GET["tid"]) == true) {
      $tid = "";
  } else {
      $tid = htmlspecialchars($_GET["tid"]);
  }
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die("接続に失敗しました");
  }
  mysqli_set_charset($link, "utf8");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link href="./css/style.css" rel="stylesheet" type="text/css">
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
<?php include("./topmenu.php"); ?>
  <!-- メニュー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <!-- メイン：開始 -->
    <main id="main">
      <article>
        <section>
          
<?php
  if (empty($tid) == true) {
    $sql = "SELECT room_name, type_name, dayfee, main_image, room_no
      FROM room, room_type 
      WHERE room.type_id = room_type.type_id";
  } else {
    $sql = "SELECT room_name, type_name, dayfee, main_image, room_no
      FROM room, room_type 
      WHERE room.type_id = room_type.type_id
      AND room.type_id = {$tid}"; 
  }
  $result = mysqli_query($link, $sql);
  $cnt = mysqli_num_rows($result);
  if ($cnt == 0) {
    echo "<b>ご指定の会議室は只今準備ができておりません</b>";  
  } else {
?>
          <h3>会議室のご紹介</h3>
          <p>
            利用人数、用途に合わせてご利用いただけます
          </p>
          <table>
            <th>名称</th>
            <th>会議室の名前</th>
            <th>1時間の料金</th>
            <th colspan="2">会議室のイメージ</th>
<!-- ここにPHPスクリプトを埋め込む -->          
<?php
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<tr>";
      echo "<td>{$row['room_name']}</td>";
      echo "<td>{$row['type_name']}</td>";
      $roomfee = number_format($row['dayfee']);
      echo "<td class='number'>&yen; {$roomfee}</td>";
      echo "<td><img class='small' src='./images/{$row['main_image']}'></td>";
      echo "<td><a href='./roomDetail.php?rno={$row['room_no']}'>詳細</a></td>";
      echo "</tr>";
    }
  }
?>
          </table>
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
    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23E67C73&ctz=Asia%2FTokyo&showNav=1&showTitle=1&showDate=1&showPrint=0&showTabs=0&showCalendars=0&showTz=0&title=%E4%BA%88%E7%B4%84%E7%8A%B6%E6%B3%81&src=bW9yaXRha2Fub3JpMDYyOUBnbWFpbC5jb20&src=NGZmMTI5ODUwZjg0MzQ0ZDZiNDYzMTMzNTlmNDVjNTBjNjhkZTZlODQyMzIxNDY3NmY1ZDlmYWM2MDVmMTI3OEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=MDY4ZDE4NzgzMzY0N2RhOWZkZjkzNzcxMGU1MjIwYWNlMTc5YmVhMzU0YTBiOTljYzgzMTllMDAxMTNmNTAzOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%23E67C73&color=%23009688" style="border:solid 1px #777" width="200" height="350" frameborder="0" scrolling="no"></iframe>
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