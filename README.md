# WordFes 2014 - WordPress テーマ

- - - - - - - - - - -

このテーマは WordFes 2014 公式サイトのために制作されたテーマです。
ベースとして、 [_s](http://underscores.me/) を使用し構築しています。

# カスタム投稿タイプ

### セッション

* スラッグ : session

セッション情報を入力するための投稿タイプです。

タイムテーブル一覧もここから出力されます。

### お知らせ

* スラッグ : topics

新着情報・お知らせのための投稿タイプです。


### スポンサー

* スラッグ : sponsored

スポンサー登録のための投稿タイプです。

各ページ下部のスポンサー一覧に表示されます。

### スタッフ

* スラッグ : staff

スタッフ一覧ページのための投稿タイプです。


# ファイル階層

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
		scripts.php : javascript , css 登録用の関数定義
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
	base-template-teaser.php : ティザーサイト用テンプレート
	base.php : ラッパ テンプレートです。まず始めにこのファイルを読み込みます
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

# インストール
