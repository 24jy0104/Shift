<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>シフト管理</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @yield('styles')
</head>
<body>
    <header>
        <div class ="header-left">
            <h1 class="h1_logo02">
                <a href="/"><img src="/image/logo_02.png" alt="フード・マーケット よしや" style="max-width: 164px"></a>
            </h1>
        </div>

        <div class="header-center">
            <h2>
                @if(auth()->guard('staff')->check())
                    {{ auth()->guard('staff')->user()->name }}
                @elseif(auth()->check())
                    管理者
                @endif
            </h2>
        </div>
    </header>
    @yield('content')

    @yield('scripts')
</body>
</html>
