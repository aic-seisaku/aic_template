<?php
get_header();

//親ページID取得
$parent_id = $post->post_parent;

if ($parent_id) //親ページがあれば
{
$parent_post = get_post($parent_id);
if ($parent_post->post_parent) //親ページの親ページがあれば
{
    $parents_post = get_post($parent_post->post_parent);
    include(get_template_directory() . '/page/' . $parents_post->post_name . '/' . $parent_post->post_name . '/' . page_name() . '.php');
} else //親ページの親ページが無い場合
{
    include(get_template_directory() . '/page/' . $parent_post->post_name . '/' . page_name() . '.php');
}
} else //親ページが無い場合
{
include(get_template_directory() . '/page/' . page_name() . '.php');
}

get_footer();