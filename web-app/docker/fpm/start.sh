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

# 起動確認
php-fpm # fpm起動(左記を実施しないと、fpmコンテナが起動しない)
echo "hello!"
