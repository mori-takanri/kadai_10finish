<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>支払い画面</title>
    <!-- 購入ボタンのCSS -->
    <style type="text/css">
    .stripe-button-el {
        width: 1000px;
        max-width: 100%;
    }
    .stripe-button-el span {
        font-size: 100px;
        padding-top: 50px;
        min-height: 60px!important;
    }
    </style>
</head>

<body>
    <form action="/charge.php" method="POST">
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="-- ここに公開用のAPIキーを記載する (pk_test_xxxxxx) --"
        data-amount="5000"
        data-name="大会議室の料金は5,000円です"
        data-locale="auto"
        data-allow-remember-me="false"
        data-label="お支払いする"
        data-currency="jpy">
        </script>
    </form>

    <a href="./thanks.php">支払い完了したと想定しています</a>
 
</body>
</html>

<!--テスト　4242 4242 4242 4242
12/34
567  -->
<!-- 空白が含まれているため、キーが無効です。詳細については、を参照してください。 -->