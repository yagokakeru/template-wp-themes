<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://example.com/favicon.ico">
    <link rel="apple-touch-icon" href="https://example.com/custom-icon.png">

    <?php wp_head(); ?>
</head>

<body>
    <a class="header_nav" href="<?php echo get_post_type_archive_link( 'member' ); ?>">社員紹介</a>