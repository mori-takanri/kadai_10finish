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
      <h2>お問い合わせ</h2>
      <span class="tel">☎011-788-7551 </span>
    </div>
  </header>
  <!-- ヘッダー：終了 -->
  <!-- メニュー：開始 -->
<?php include("./topmenu.php"); ?>
  <!-- メニュー：終了 -->
  <!-- アイキャッチ：開始 -->
  <div id="icatch">
    <img src="./images/ezohub icatch.png" alt="">
  </div>
  <!-- アイキャッチ：終了 -->
  <!-- コンテンツ：開始 -->
  <div id="contents">
    <!-- メイン：開始 -->
    <main id="main">
      <article>
        <section>
          <h2><img class="small" src="./images/ezohubnews.png"><br>更新情報</h2>
          <dl class="information">
            <dt>2023-01-01</dt>
            <dd>
              サイトオープンしました。
            </dd>
          </dl>
        </section>
        <section>
          <h2><img class="small" src="./images/ezohubabout.png"><br>EZOHUBSAPPOROについて</h2>
          <h3>本があり、人が集まる知の集積の場</h3>
          <p>
            ビジネス、リージョナル、サスティナブル、アート、テクノロジーなど約3,500冊の本が読めます。
            本を媒介に人が集めり教え合うことで知識のアップデートされる場です。
          </p>
          <h3>出会いが生まれる、共創スペース</h3>
          <p>
            1人の作業やWEB会議、複数人での打ち合わせなど用途に合わせて使用できるコワーキングスペース。
            北海道最大級の広大なスペースだからこそ目的に合わせて柔軟にご利用いただけます。
          </p>
          <h3>人と人がつながるイベントスペース</h3>
          <p>
            最大収容人数100名程度のイベントスペース。コミュニケーションがしやすい設計でイベントや講演会、
            ライブ配信など目的に合わせて使用できます。
          </p>
        </section>
      </article>
    </main>
    <!-- メイン：終了 -->
    <!-- サイド：開始 -->
    <aside id="side">
      <section>
        <h2 style="background:black";>ご予約</style=></h2>
        <ul>
          <li><a href="./reserveDay.php">予約日の入力</a></li>
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
</body>
</html>