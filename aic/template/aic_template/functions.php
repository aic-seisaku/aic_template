<?php
/*-------------------------------------------------------*/
/*  管理画面から不要メニュー削除
/*-------------------------------------------------------*/
add_action('admin_menu', 'remove_menus');
function remove_menus() {
	remove_menu_page('edit.php'); // 投稿
	remove_menu_page( 'edit-comments.php' ); // コメント
}

/*-------------------------------------------------------*/
/*  CSS, JavaScriptの読み込み
/*-------------------------------------------------------*/
function add_link_files() {
  // CSSの読み込み
	wp_enqueue_style( 'my-style', get_stylesheet_directory_uri().'/assets/css/styles.min.css', '');
  // JavaScriptの読み込み
  wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', '', false, true );
  wp_enqueue_script( 'my-script', get_template_directory_uri().'/assets/js/bundle.min.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'add_link_files' );

/*-------------------------------------------------------*/
/* 投稿画面にアイキャッチの設定できるように
/*-------------------------------------------------------*/
add_theme_support('post-thumbnails');

/*-------------------------------------------------------*/
/*  page.php, single.php の出力処理
/*-------------------------------------------------------*/
function page_name() {
	$pn = '';
	if (is_page()) $pn = get_post(get_the_ID())->post_name;
	elseif (is_single() || is_archive()) $pn = get_post_type();
	return $pn;
}
function page_name_parents() {
	$pn = '';
	if (is_page()) {
		$now_page = get_post(get_the_ID());
		if (get_post(get_the_ID())->post_parent) {
			$parent = get_post($now_page->post_parent);
			if ($parent->post_parent) {
				$parents = get_post($parent->post_parent);
				$pn = $parents->post_name . '/' . $parent->post_name . '/' . $now_page->post_name;
			} else {
				$pn = $parent->post_name . '/' . $now_page->post_name;
			}
		} else {
			$pn = $now_page->post_name;
		}
	} elseif (is_single() || is_archive()) {
		$pn = get_post_type();
	}
	return $pn;
}

/*-------------------------------------------------------*/
/* Contact Form 7で自動挿入されるPタグ、brタグを削除
/*-------------------------------------------------------*/
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
    return false;
}
