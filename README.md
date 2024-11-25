# お問合せフォーム

##Dockerビルド
1. git clone git@github.com:NaoyaNoro/fashinablylove.git
2. DockerDesktopアプリを立ち上げる
3. docker-compose up -d --build
*MySQLは，OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集して下さい。

##Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから..envを作成し，環境変数を変更
4. php artisna key:generate
5. php artisan migrate
6. php artisan db:seed

##使用技術
・php 8.0
・Laravel10.0
・MySQL8.0

##URL
・開発環境:http://localhost
・phpmyadmin:http://localhost:8080/
