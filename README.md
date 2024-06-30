お問い合わせフォーム
環境構築
Dockerビルド
 1. git clone git@github.com:coachtech-material/laravel-docker-template.git
 2. docker-compose up -d --build

Laravel環境構築
 1. docker-compose exec php bash
 2. composer install
 3. .env.exampleファイルから.envを作成し、環境変数を変更
 4. php artisan key:generate
 5. php artisan migrate
 6. php artisan db:seed

ER図
![確認テストER drawio](https://github.com/nogi-megumi/20240630_satou_test/assets/164513003/384d4cc7-c467-49b1-9231-ca50b1678797)

使用技術
・PHP 7.4.9
・Laravel 8.83.8
・MySQL 8.0.26

URL
・開発環境 : http://localhpst/
・phpMyAdmin : http://localhost:8080
