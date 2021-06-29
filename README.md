#サイト説明
PHPで作成したエッセンシャルオイルに関する投稿サイトです。

エッセンシャルオイルは基本情報と写真を投稿できます。
さらに、各エッセンシャルオイルが持つ効能が複数あり、それを紐づけるために効能を登録し、
関連登録では、各オイルとそれに特化した使用方法を登録できるようにしました。

登録ができるのは会員登録されたユーザのみ、
各登録情報を編集、削除できるのは登録したユーザのみと制限しています。

テーブル構成は以下の通りです。
・essential_oils:　オイル情報を格納したテーブル
・effects:　効能情報を格納したテーブル
・relations:　オイル情報と効能情報を紐づけるテーブル
・users:　ユーザーテーブル

###技術要素
・開発環境：AWS Cloud9/ Amazon Linux
・HTML/css
・bootstrap 4.3.
・JavaScript/jQuery
・PHP 5.6.40
・mysql Ver14.14 Distrib 5.5.62
・PDO
・バージョン管理：GitHub
・デプロイ：Xfree

###機能一覧
・ユーザー登録機能
・エッセンシャルオイル/効能/関連登録機能
・ユーザー制限付き情報更新/削除機能
・情報一覧表示機能
・登録情報表示機能
・重複登録制限機能
・各種フラッシュメッセージ表示機能
・入力値に関するバリデーション機能
・不正アクセス防止機能

###実行画面の様子
(/Essential_Oils/images/top_image.png)

###エピソード
今勉強している内容をまとめるサイトが欲しいと思い作成しました。
バックエンド部分では、3つのテーブルを作成し、一対多で関連付けるrelationsテーブルを作成し、
一つのオイルが持つ効能を複数登録できるようにしています。
また、ユーザー制限をつけて、登録した人だけが編集、削除できる機能をつけています。
各アクションに対してフラッシュメッセージを表示させています。

フロント部分では、一覧で植物名と写真を紐づけて表示させることに
こだわりました。

PHPを使用したHTMLのため、コードが複雑化する箇所もありました。
今後は、詳しい使用方法(レシピ)を登録、表示できる機能や、各情報に対してコメントできる機能など
拡張したいと思っています。
