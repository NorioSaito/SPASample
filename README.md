# SPA 開発手順

## 環境
|項目|値|バージョン
|:--|:--|:--|
|OS|Debian GNU/Linux|11|
|DB|PostgreSQL|14.4|
|Web サーバ|Apache|2.4.54|
|サーバサイド言語|PHP|8.0.21|
|PHP フレームワーク|Laravel|9.19|
|フロント言語|Typescript|4.7.4|
|Javascript ライブラリ|React|18.2|
|React ライブラリ|Material UI|5.9.0|
|スタイルシート|Sass|1.53.0|

## 環境構築
- VisualStudioCode の拡張機能「Remote-Containers」をインストール
- Remote-Containers のコマンド「Reopen in Container」を実行
- service は web を選択
- workspace は /var/www/wellness を選択
- ターミナルで、以下コマンド実行

    `composer update`

- node-modules のインストール

    ターミナルで以下コマンド実行

    `npm install`
- ts ファイルと scss ファイルのコンパイル

    ターミナルで以下コマンドを実行

    `npm run dev`

    エラーが発生した場合、依存モジュールがインストールされて処理が止まるので、再度コマンド実行
- http://localhost:8088 にアクセス

---

## テーブル追加
- ターミナルで以下コマンド実行

    `php artisan make:model テーブル名 -fms`
- 以下ファイルが作成されていることを確認
    - database/factories/テーブル名Factory.php
    - database/migrations/日付_create_テーブル名_table.php
    - database/seeders/テーブル名Seeder.php
- テーブル定義の作成

    [マイグレーション](https://readouble.com/laravel/9.x/ja/migrations.html) の「テーブルの生成」を参照し、カラムの作成とオプションを設定する
- ターミナルで以下コマンド実行

    `php artisan migrate`

- ダミーデータの登録
    - Factory クラスに各カラムの登録値を設定
    - Seeder クラスの run メソッドに以下コード追加
    
        ```
        use App\Models\contents;

        テーブル名::factory()->count(10)->create();
        ```
    - DatabaseSeeder.php の run メソッドに以下コード追記

        ```
        $this->call(ContentsSeeder::class);
        ```
    - ターミナルで以下コマンド実行
    
        `php artisan db:seed`

---

## 画面実装
Typescript / React / Sass で実装する
- *resources/ts/pages/* 配下に各コンポーネントを作成
- *resource/sass/* 配下にスタイルシートを作成
- tsx ファイルと scss ファイルをコンパイル
    - プロジェクトディレクトリで `npm run dev` でコンパイルできる
    - `npm run watch` でファイル保存時に自動でコンパイルできる