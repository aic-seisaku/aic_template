## 【各ディレクトリについて】
テーマ直下はシンプルに

必要に応じて、
- search.php
- searchform.php
- date.php
など作成

### 【assets】
コンパイル済みのCSS, JS

webp化済のimageが入ったディレクトリ

**＊必要に応じてpdf, videoなどのディレクトリを作成**

### 【page】
/page/{カスタム投稿名}.php

/page/{親ページスラッグ}/{スラッグ名}.php

で固定ページのテンプレートが作成可能

### 【archive】
/archive/{カスタム投稿名}.php

でカスタム投稿名のアーカイブページが作成可能

### 【single】
/single/{カスタム投稿名}.php

でカスタム投稿名のシングルページが作成可能

### 【taxonomy】
/taxonomy/{カスタム投稿名}.php

でカスタム投稿名のタクソノミーページが作成可能

### 【src】
コンパイル前のSCSS, JS

webp化前のimageが入ったディレクトリ

----------------------------------------------------------------------------------------

## 【Sassについて】
sass - base   ... reset.cssとベースとなる記述

     - global ... 全体で使う変数や関数の定義。_setting.scssにカラー、フォントなどを定義

     - module ... 使いまわしが想定されるBLOCKに関するCSS。BLOCK名がファイル名。

     - page   ... そのページのみでしか使用が想定されないBLOCKに関するCSS。BLOCK名がファイル名。

----------------------------------------------------------------------------------------

## 【環境構築について】
弊社の環境を共有したほうが設定しやすそうな場合は、推奨の環境を共有いたします。

不要でしたら御社にて環境構築を行っていただいて構いません。

### 【テンプレート】
指定のテンプレートをご使用ください

▼テンプレートダウンロード

https://github.com/aic-seisaku/aic_template

### 【node】
v14~v20までを使用してください。

▼バージョン管理

volta

https://volta.sh/

使い方

https://lunalunadesign.net/2022/11/2907/

----------------------------------------------------------------------------------------

## 【コーディング規則等】
以下に沿ってコーディングをしていただけますと幸いです。

- 命名規則はBEMを使用
- タスクランナーとしてgulpを使用

### 【gulp】
gulpで以下の機能を利用します。
- scssのコンパイル
- jpg,pngなどのwebpへの変換

### 【メディアクエリ】
メディアクエリはsrc/sass/global/setting.scssで指定します。

画面幅につきまして、基本的には以下のもので考慮ください。

- PC：768px（または920px）～1920px

- SP：375px～767px（または919px）

### 【画像】
基本はwebpを使用してください。

また、2倍での書き出しをお願いします。

#### 【alt】
altタグの中身を記載お願いします。

装飾的な画像の場合はalt属性を空にしてください。

ex）

テキストが入っている画像はaltはテキストママ

⇒ alt="テキスト"

アイコンや挿絵、イメージ画像など

⇒ alt="～のアイコン"、alt="～の挿絵"、alt="～のイメージ画像"

個人名、固有名詞を表す画像

⇒ alt="津山 竜也"、alt="株式会社AIコミュニケーション"

装飾（デコレーションなどの読み上げがいらない画像）

⇒ alt=""

### 【仮テキスト】
仮テキストについては、判別しやすいように入力お願いいたします。

ex）

電話番号 000-0000-0000

郵便番号 000-0000

住所 〇〇県〇〇市〇〇町00-00

### 【パス】
パスの設定はコード上、WordPress内共に相対パスで設定をお願いします。

----------------------------------------------------------------------------------------

## 【WordPressについて】

### 【バージョン】
最新バージョンでの構築をお願いします。

▼バージョンの自動更新はON

「このサイトは WordPress の新しいバージョンごとに自動的に最新の状態に保たれます。

### 【固定ページ】
固定ページの静的箇所につきましては、基本的に固定ページにHTMLで書いていただく形でお願いします。

（ヒーローヘッダー等の部分はcssや共通部、サムネイル依存などでも構いません）

### 【プラグイン】
プラグインは指定のものをご利用ください。

#### カスタムフィールド
Advanced Custom Fields (ACF)

https://ja.wordpress.org/plugins/advanced-custom-fields/

Advanced Custom Fields有料版（ライセンスキーは弊社で対応します）

https://www.advancedcustomfields.com/pro/


#### カスタム投稿
Custom Post Type UI

https://ja.wordpress.org/plugins/custom-post-type-ui/

#### フォーム
Contact Form 7

https://ja.wordpress.org/plugins/contact-form-7/

Contactform7multi step有料版（ライセンスキーは弊社で対応します）

https://ja.wordpress.org/plugins/contact-form-7-multi-step-module/

※MW WP Formはサポートが終了しているため使用しないでください。

#### SEO
Yoast SEO
https://ja.wordpress.org/plugins/wordpress-seo/

#### 移行
All-in-One WP Migration

https://ja.wordpress.org/plugins/all-in-one-wp-migration/


WPvivid

https://ja.wordpress.org/plugins/wpvivid-backuprestore/

#### セキュリティー
SiteGuard WP Plugin

https://ja.wordpress.org/plugins/siteguard/

#### 記事の並び替え
Intuitive Custom Post Order

https://wordpress.org/plugins/intuitive-custom-post-order/

#### ユーザー権限
User Role Editor

https://ja.wordpress.org/plugins/user-role-editor/

----------------------------------------------------------------------------------------

## 【納品時について】
コードの納品、サーバーアップ（公開作業）までのご対応をお願いします。
