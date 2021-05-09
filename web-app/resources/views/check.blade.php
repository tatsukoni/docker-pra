<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>design-demo</title>
    </head>
    <body>
        <div class="header">
            <h1>選択してください</h1>
        </div>
        <div class="form">
            <form id="check" action="/check" method="get">
                <!-- ジャンル -->
                <h3>ジャンル</h3>
                @foreach ($genres as $genre)
                    <input
                        type="radio"
                        name="genre"
                        value="{{ $genre['value'] }}"
                        onchange="document.forms.check.submit();"
                    >
                    {{ $genre['desplay'] }}
                @endforeach
                <!-- 都道府県 -->
                <h3>都道府県</h3>
                @foreach ($prefectures as $prefecture)
                    <input
                        type="radio"
                        name="prefecture"
                        value="{{ $prefecture['value'] }}"
                        onchange="document.forms.check.submit();"
                    >
                    {{ $prefecture['desplay'] }}
                @endforeach
                <!-- ランク -->
                <h3>ランク</h3>
                @foreach ($ranks as $rank)
                    <input
                        type="radio"
                        name="rank"
                        value="{{ $rank['value'] }}"
                        onchange="document.forms.check.submit();"
                    >
                    {{ $rank['desplay'] }}
                @endforeach
            </form>
        </div>
    </body>
</html>
