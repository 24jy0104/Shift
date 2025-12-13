<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>以下の登録情報で間違いなければ「次へ>>」ボタンを押して登録してください。</p>
    <p>間違いがあった場合、「＜＜戻る」ボタンで前画面へ戻り、修正してください。</p>
    <fieldset>
        名前：{{ $name }}
        <br>
        レジ番号：{{ $id }}
        <br>
        パスワード：{{ $pass }}

    </fieldset>
    <form action="{{ url('/addCustomer') }}" method="post">
        @csrf
        <input type="hidden" name="name" value="{{ $name }}">
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="pass" value="{{ $pass }}">
        <button type="submit">次へ >></button>
    </form>





    <!-- <a href="{{ url('/registercustomer') }}">
        << 戻る</a>
            <a href="{{ url('/addCustomer') }}">次へ >></a> -->
</body>

</html>