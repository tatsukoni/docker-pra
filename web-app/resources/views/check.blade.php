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
            <form id="check" name="check" action="/check" method="get">
                <!-- ジャンル -->
                <h3>ジャンル</h3>
                @foreach ($genres as $genre)
                    <input
                        type="radio"
                        name="genre"
                        value="{{ $genre->value }}"
                        <?php
                            if ($genre->isChecked) {
                                echo 'checked="checked"';
                            }
                        ?>
                        onchange="document.forms.check.submit();"
                    >
                    {{ $genre->display }}
                @endforeach
                <!-- 都道府県 -->
                <h3>都道府県</h3>
                @foreach ($prefectures as $prefecture)
                    <input
                        type="radio"
                        name="prefecture"
                        value="{{ $prefecture->value }}"
                        <?php
                            if ($prefecture->isChecked) {
                                echo 'checked="checked"';
                            }
                        ?>
                        onchange="document.forms.check.submit();"
                    >
                    {{ $prefecture->display }}
                @endforeach
                <!-- ランク -->
                <h3>ランク</h3>
                @foreach ($ranks as $rank)
                    <input
                        type="radio"
                        name="rank"
                        value="{{ $rank->value }}"
                        <?php
                            if ($rank->isChecked) {
                                echo 'checked="checked"';
                            }
                        ?>
                        onchange="document.forms.check.submit();"
                    >
                    {{ $rank->display }}
                @endforeach
                <div class="confirm">
                    <p>{{ $confirm->confirmMessage }}</p>
                </div>
                <input type="button" value="リセット" onclick="offradio();">
            </form>
        </div>

        <script>
            function offradio() {
                var ElementsCount = document.check.elements.length;
                for( i=0 ; i<ElementsCount ; i++ ) {
                    document.check.elements[i].checked = false;
                }
            }
        </script>
    </body>
</html>
