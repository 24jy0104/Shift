<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- <link rel="stylesheet" href="default.css"> -->
</head>

<body>

    <header>
        <div class="header-left">
            <h1 class="h1_logo02">
                <a href="/"><img src="../image/logo_02.png" alt="フード・マーケット よしや" style="max-width: 164px"></a>
            </h1>
        </div>

        <div class="header-center">
            <h2>ログイン</h2>
        </div>

    </header>

    <fieldset>
        <legend>
            @if(session('error'))
                <p style="color:red">⚠ {{ session('error') }}</p>
            @elseif(session('success'))
                <p style="color:green">✅ {{ session('success') }}</p>
            @else
                レジ番号・パスワードを入力してください。
            @endif
        </legend>

        <form method="post" action="{{ url('/login_check') }}">
            @csrf
            <div class="login-text">
                レジ番号：
                <input type="number" name="id"><br>
            </div>

            <div class="login-text">
                パスワード：
                <input type="text" name="password"><br>
            </div>

            <input type="submit" value="ログイン" id="login-button">
            <br>
            <a href="{{ url('/registercustomer') }}">初めての方はこちらからどうぞ</a>
        </form>
    </fieldset>
    <!-- <button onclick="location.href='top.php'">トップページへ</button> -->

</body>

</html>