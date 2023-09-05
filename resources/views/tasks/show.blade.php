<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task show</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>タスク詳細</h1>
    <h2>【タイトル】</h2>
    <p>{{ $task->title }}</p>
    <h2>【内容】</h2>
    <p>{!! nl2br(e($task->body)) !!}</p>
    <div class="button-group">
        <button onclick="location.href='/tasks'">一覧へ戻る</button>
        <button onclick="location.href='/tasks/{{ $task->id }}/edit'">編集する</button>
        <form action="/tasks/{{ $task->id }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
        </form>
    </div>
</body>

</html>
