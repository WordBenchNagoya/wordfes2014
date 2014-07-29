## WordFes 2014 - WordPress テーマ

- - - - - - - - - - -

このテーマは WordFes 2014 公式サイトのために制作されたテーマです。

ベースとして、 [_s](http://underscores.me/) を使用し構築しています。

## 投稿タイプ

inc/custom-post-type.php 内で定義

| 投稿タイプ名   | スラッグ  |  説明                                                  |
| :--            | :--       | :--                                                    |
| スタッフブログ | post      | スタッフブログ用投稿タイプ                             |
| 固定ページ     | page      | 固定ページ用                                           |
| お知らせ       | topics    | 新着情報・お知らせ用                                   |
| スポンサー     | sponsored | スポンサーバナー用                                     |
| スタッフ       | staff     | スタッフ一覧ページ用                                   |
| セッション     | session   | セッション情報用投稿タイプ。タイムテーブル一覧へも出力 |

## タクソノミー

inc/custom-taxonomy.php 内で定義

| タクソノミー名     | スラッグ         |  投稿タイプ                                            |
| :--                | :--              | :--                                                    |
| スポンサーカテゴリ | sponsor_category | スポンサー                                             |
| ターゲット         | target           | セッション                                             |
| 教室               | classroom        | セッション                                             |
| タイムゾーン       | timezone         | セッション                                             |
| お知らせカテゴリ   | topics           | お知らせ                                   |


## ファイル概要

	assets/   : 静的なコンテンツ
		css /   : grunt によってコンパイルされた後の css
		fonts / : フォントファイル
		img /   : 画像ファイル
		js /    : javascript ファイル
		less /  : コンパイル前の less ファイル

	classes/ : 拡張用 class ファイル
		class-camptix-widgets.php : サイドバー用のチケット受付表
		class-cleanup.php : テーマのための関数
		class-extend-comment.php : コメント拡張用
		class-wbn-title.php : 各ページの大見出し表示用ウィジェット
		class-wp-bootstrap-navbar.php : WordPress のナビゲーションを bootstrap へ対応させるためのクラス

	inc/ : 関数群
		custom-post-type.php : カスタム投稿タイプの定義ファイル
		custom-taxonomy.php : カスタムタクソノミーの定義ファイル
		customier.php : テーマカスタマイザーのための定義ファイル
		extra.php : テーマから独立している関数定義
		jetpack.php : jetpack 用関数定義
		scripts.php : javascript, css 登録用の関数定義
		setup.php : テーマを使用するための関数定義
		template-tags.php : ループ内で使用する関数定義
		wrapper.php : テーマのテンプレートを変更するラッパー関数

	languages/ : 言語ファイル
	modules / : サイトのモジュール郡
	templates/ : コンテンツ表示用のテンプレートファイル

	.editorconfig : エディタの設定 [editorconfig](http://editorconfig.org/)
	.jshintrc : jshint の設定
	404.php : 404 テンプレート
	archive.php : アーカイブページ テンプレート
	base-template-home.php : トップページ用テンプレート
	base.php : ラッパ テンプレートです。このファイルを通して各テンプレートを読み込みます
	functions.php : テーマのための関数
	Gruntfile.js : Grunt 設定ファイル
	index.php : トップページ用テンプレート
	packages.json : npm package 管理ファイル
	page.php : 固定ページファイル
	README.md :
	rtl.css : アラビア語圏などの右から左へ読み進める文章のための css
	screenshot.png : スクリーンショット
	single.php : 投稿ページ テンプレート
	style.css : テーマのためのスタイルシート

