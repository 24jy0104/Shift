<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>以下のフォームにデータを入力し、「次へ>>」ボタンを押してください</p>
    <fieldset>
        @if (session('error'))
            <p style="color:red;">{{ session('error') }}</p>
        @endif
        <form action="{{ url('/confirmNewCustomer') }}" method="post">
            @csrf
            <label for="uname">
                お名前：
                <input type="text" name="name" id="uname">
            </label>
            <br>
            <label for="user_id">
                レジ番号：
                <input type="number" name="id" id="user_id">
            </label>
            <br>
            <label for="upass">
                パスワード：
                <input type="text" name="pass" id="upass" required>
            </label>
            <br>
            <label for="urpass">
                パスワード再入力：
                <input type="text" name="rpass" id="rpass" required>
            </label>
            <br>
            <input type="submit" value="次へ>>">

        </form>
    </fieldset>
</body>

</html>