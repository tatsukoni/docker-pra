<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>demo</title>
    </head>
    <body>
        <div class="header">
            <h1>hello!</h1>
        </div>
        <div class="post-form">
            <form action="/" method="post">
                <!-- CSRF保護 -->
                @csrf
                <p>
                    投稿者名：<input type="text" name="name" size="20">
                </p>
                <p>
                    コメント：<input type="text" name="comment" size="40">
                </p>
                <p>
                    <input type="submit" value="送信">
                </p>
            </form>
        </div>
        <div class="contents">
            <h3>
                投稿一覧
            </h3>
            @foreach ($comments as $comment)
                <p>
                    投稿者： {{ $comment->name }}<br>
                    コメント： {{ $comment->comment }}<br>
                    投稿日時： {{ $comment->created_at }}<br>
                    ----------------------------------------
                </p>
            @endforeach
        </div>
    </body>
</html>
