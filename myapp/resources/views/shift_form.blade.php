<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

    <title>シフトフォーム</title>
</head>

<body>

    <header>
        <div class="header-left">
            <h1 class="h1_logo02">
                <a href="/"><img src="../image/logo_02.png" alt="フード・マーケット よしや" style="max-width: 164px"></a>
            </h1>
        </div>

        <div class="header-center">
            <h2>シフト提出</h2>
        </div>

        <div class="header-right">
            <p>ようこそ、{{ $user->name }} さん</p>
            <!-- <div id="head_time">
                <span id="head-ymd"></span>
            </div> -->
        </div>
    </header>

    <main>
        <h1 id="month">１０月</h1>

        <div class="calendar" id="calendar"></div>

        
        <button onclick="goToCheckPage()">提出内容を確認</button>

        <!-- 確認表示エリア -->
        <div id="output" style="margin-top: 20px;"></div>
    </main>

    <script src="{{ asset('js/form.js') }}"></script>
</body>

</html>