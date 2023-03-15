<?php

//block delete page
function restrict_post_deletion($post_ID){
    $user = get_current_user_id();
    $user = get_user_by( 'ID', $user );
    $post = get_post($post_ID);
    $postTitle = get_the_title($post);
    $restricted_pages = array();
    //$restricted_pages = array(360,358,321,116,254,272,4,157,176,240,122,295);
    $log  = "User: ".$user->user_login.' - '.date("F j, Y, g:i a").PHP_EOL.
    "Post: ".$postTitle.PHP_EOL.
    "-------------------------".PHP_EOL;
//Save string to log, use FILE_APPEND to append.
    file_put_contents(__DIR__.'/log/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    if (in_array($post_ID, $restricted_pages)) {
     wp_die("You are not authorized to delete this page.");
     exit;
 }
}
add_action('wp_trash_post', 'restrict_post_deletion', 10, 1);
add_action('before_delete_post', 'restrict_post_deletion', 10, 1);

//block delete attachment
add_action( 'delete_attachment', 'check_relations' );
function check_relations( $post_id ){
    $user = get_current_user_id();
    $user = get_user_by( 'ID', $user );
    $attachment = get_the_title( $post_id);
    $attachmentUrl = wp_get_attachment_url( $post_id);
    $log  = "User: ".$user->user_login.' - '.date("F j, Y, g:i a").PHP_EOL.
    "Attachment Name: ".$attachment.PHP_EOL.
    "Attachment id: ".$post_id.PHP_EOL.
    "Attachment URL: ".$attachmentUrl.PHP_EOL.
    "-------------------------".PHP_EOL;
//Save string to log, use FILE_APPEND to append.
    file_put_contents(__DIR__.'/log/attachment_log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
}