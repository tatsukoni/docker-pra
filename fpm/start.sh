#!/bin/sh
set -e

# migration実行, データ投入
php artisan migrate

# 起動確認
echo "hello!"
