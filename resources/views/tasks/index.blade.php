<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task index</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>タスク一覧</h1>
    <div class="inline-group">
        @foreach ($tasks as $task)
            <div class="task-item">
                <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                <form action="tasks/{{ $task->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="if(!confirm('削除しますか？')){return false};">削除する</button>
                </form>
            </div>
        @endforeach
    </div>
    <hr>
    <h1>新規タスク投稿</h1>

    @if ($errors->any())
        <h3>【エラー内容】</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/tasks" method="post">
        @csrf
        <p>
            <label for="title">タイトル</label><br>
            <input type="string" name="title" class="title" value="{{ old('title') }}">
        </p>
        <p>
            <label for="body">内容</label><br>
            <textarea name="body" id="body">{{ old('body') }}</textarea>
        </p>

        <input type="submit" value="Create Task">
    </form>
</body>

</html>
