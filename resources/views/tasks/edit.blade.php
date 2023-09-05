<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* インライン表示用のスタイル */
        .inline-buttons {
            display: inline-block;
        }
    </style>
</head>

<body>
    <h1>投稿タスク編集</h1>

    @if ($errors->any())
        <h3>【エラー内容】</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('PATCH')
        <p>
            <label for="title">タイトル</label><br>
            <input type="string" name="title" class="title" value="{{ old('title', $task->title) }}">
        </p>
        <p>
            <label for="body">内容</label><br>
            <textarea name="body" id="body">{{ old('body', $task->body) }}</textarea>
        </p>
        <div class="button-group">
            <input type="submit" value="更新"><button><a href="/tasks/{{ $task->id }}"
                    style="text-decoration: none;">詳細に戻る</a></button>
        </div>
    </form>
</body>

</html>
