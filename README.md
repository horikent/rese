# アプリケーション名
Rese（リーズ）
20-30代の社会人を対象としたグループ会社の飲食店予約サービスです。
<img width="1201" alt="rese_lp画像" src="https://user-images.githubusercontent.com/108177644/202150466-5b0c97f9-3554-43bd-8c4a-c2848a6eb5f0.png">


## 作成した目的
自社で予約サービスを持つ事で、外部の飲食店予約サービスにかかる手数料を削減し、グループのさらなる発展が見込めるため。

## アプリケーションURL
https://rocky-lowlands-94951.herokuapp.com/
予約・お気に入りのご利用には会員登録とログインが必要です。
店舗情報の閲覧は未登録でもご利用いただけます。

## 他のリポジトリ
開発用：https://sheltered-earth-56681.herokuapp.com/
Github(mainとstaging)：https://github.com/horikent/rese.git

## 機能一覧
会員登録
ログイン・ログアウト
メール認証
ユーザー情報取得
ユーザー飲食店予約情報・お気に入り一覧・利用履歴取得
飲食店一覧・詳細情報取得
飲食店お気に入り追加・削除
飲食店予約情報追加・削除
予約変更機能
店舗検索
評価機能：星とコメント
店舗代表者の登録
店舗情報の作成・更新
管理画面での予約情報の取得
バリデーション
レスポンシブルデザイン

※備考
・予約は翌日以降、1ヶ月以内の予約が可能です。
・検索は虫眼鏡のある欄にカーソルを置きenterキーを押してください。
・MyPAGEにて日時、人数の変更が可能です。
・予約日時以降にMYPAGEより星とレビューの投稿ができます。
・投稿したレビューは店舗詳細画面に表示されます。

## 使用技術（実行環境）
Laravel:9.36.6
Laravel Breeze
PHP:8.1.11 
heroku/7.65.0 darwin-x64 node-v14.19.0
JawsDB

## テーブル設計
<img width="1024" alt="table_design" src="https://user-images.githubusercontent.com/108177644/202151697-553f2459-ce44-41cb-8af4-e15b79f31509.png">

## ER 図
![rese drawio](https://user-images.githubusercontent.com/108177644/202149128-0f4f9219-0ba0-4ea0-9f71-b1713ce4a9e7.png)

## 環境構築
Githubよりローカルで用いる際は
php artisan migrate
php artisan db:seed
を実行してご利用ください。

## 他に記載することがあれば記述する
アカウントは利用者と管理者と店舗代表者の３種類です。

利用者としてテストユーザーを１人登録しております。登録情報はUserTableSeederにてid=22番です。

管理者は店舗代表者を登録できます。管理者情報はUserTableSeederにてid=1番です。
管理者は店舗情報の作成はできませんので、店舗情報を作成する際は再度ログインをお願い致します。

店舗代表者は店舗情報の作成、更新が可能です。店舗代表者情報はUserTableSeederにてid=2〜21番に記載しております。
初期登録の20件分の店舗について店舗代表者の記載はありませんでしたが、店舗情報更新の際に必要となるため設定させていただきました。

案件シートです
https://docs.google.com/spreadsheets/d/1ryZ7Gor0gdIdh2gnA2-Rc3y3YsVcijFIFxEPtuzbPak/edit#gid=915403830
