#!/bin/sh
set -e

# composerインストール
composer clear-cache
composer install
echo "Complete composer install !"

# Laravelのキャッシュをクリア
php artisan cache:clear

# migration実行, データ投入
sleep 10 # dbコンテナ起動まで待つ
php artisan migrate

# queue worker起動
if [ $IS_QUEUE -eq 1 ]; then
  php artisan queue:work
else
  echo "Skip run queue worker"
fi

# 起動確認
if [ $IS_FPM -eq 1 ]; then
    php-fpm # fpm起動(左記を実施しないと、fpmコンテナが起動しない)
else
    echo "Skip run fpm"
fi
