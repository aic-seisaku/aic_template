<?php
get_header();
$term = get_queried_object();
$taxonomy = $term->taxonomy;
include(get_template_directory() . '/taxonomy/' . $taxonomy . '.php');
get_footer();
?>