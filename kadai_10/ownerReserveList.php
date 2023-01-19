<?php
  session_start();
  if (!isset($_SESSION["loginStatus"]) || $_SESSION["loginStatus"] != "loginOk") {
    header("location: ./ownerIndex.php");
    exit();
  } 
  require_once('./dbConfig.php');
  $link = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if ($link == null) {
    die( "接続に失敗しました：" . mysqli_connect_error() );
  }
  mysqli_set_charset($link, "utf8");

  $mode = "today";	// 指定がない場合は「本日」とする
  if (isset($_GET["disp"]) == true) {
    $mode = htmlspecialchars( $_GET["disp"] );
  }

  $sql = "SELECT reserve_no, reserve_date, room_no, numbers, 
    checkin_time, message, customer_name, customer_telno, customer_address
    FROM reserve, customer
    WHERE reserve.customer_id = customer.customer_id ";
  $today = date('Y-m-d');// 本日の日付
  switch($mode) {
  case "after":
    $modeStr = "（本日以降）";
    $sql = $sql . " AND date(reserve_date) >= '{$today}' ORDER BY reserve_date ASC";
    break;
  case "before":
    $modeStr = "（過去）";
    $sql = $sql . " AND date(reserve_date) < '{$today}' ORDER BY reserve_date DESC";
    break;
  case "today":
  default:
    $modeStr = "（本日）";
    $sql = $sql . " AND date(reserve_date) = '{$today}'";
    break;
  }
  $result = mysqli_query($link, $sql);
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
  <li><a href="./ownerReserveList.php?disp=today">本日</a></li>
  <li><a href="./ownerReserveList.php?disp=after">本日以降</a></li>
  <li><a href="./ownerReserveList.php?disp=before">過去</a></li>
    </ul>
  </nav>
  <!-- メニュー：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <h2>予約管理画面<?php echo $modeStr; ?></h2>
    <p>各行の削除ボタンを押すことで、予約情報を削除することができます。</p>
    <table class="host">
      <th>予約日</th>
      <th>予定時間</th>
      <th>会議室の名前</th>
      <th>申込者</th>
      <th>代表者連絡先</th>
      <th>利用人数</th>
      <th>メッセージ</th>
<?php
  if ($mode != "before") {
      echo "<th></th>";
  }
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr>";
    $rdate = date('Y-m-d', strtotime($row['reserve_date']));
    echo "<td>{$rdate}</td>";
    echo "<td>{$row['checkin_time']}</td>";
    echo "<td>{$row['room_no']}</td>";
    echo "<td>{$row['customer_name']}</td>";
    echo "<td>{$row['customer_telno']}<br><a href='mailto:{$row['customer_address']}'>{$row['customer_address']}</a></td>";
    echo "<td>{$row['numbers']}人</td>";
    echo "<td>{$row['message']}</td>";
    if ($mode != "before") {
      echo "<td><a class='submit_a' onclick='return confirm(\"{$row['customer_name']}様の予約を削除します。よろしいですか？\");' href='./ownerReserveDelete.php?rno={$row['reserve_no']}'>削除</a></td>";
    }
    echo "</tr>";
  }
?>
    </table>
    <br>
　  <a class="submit_a" href="ownerLogout.php"style="background:black";>ログアウト</a>
<button style="background:black";><a href="./index.php"style="color: white";>申込画面に戻る</a></button>

  </div>
  <!-- コンテンツ：終了 -->
 
  
<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>
</body>
</html>
