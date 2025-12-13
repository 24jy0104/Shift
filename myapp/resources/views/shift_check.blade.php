<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シフト提出結果</title>
</head>
<body>
    <h1>シフト提出結果</h1>

    <p>名前：{{ $id }}</p>
    <p>日付：{{ $date }}</p>
    <p>時間：{{ $time }}</p>
    <p>メモ：{{ $note }}</p>

    <a href="{{ url('/shift') }}">戻る</a>
</body>
</html>