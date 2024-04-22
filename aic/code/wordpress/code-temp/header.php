<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- meta情報 -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	<!-- favicon apple-touch-icon -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" sizes="any">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<?php echo (is_home() || is_front_page()) ? '<h1>' : '<p>'; ?>
		<img src="logo.png" width="" height="" alt="logo" loading="lazy">
		<?php echo (is_home() || is_front_page()) ? '</h1>' : '</p>'; ?>
	</header>