<?php
/**
 * リンクカードの共通コンポーネント
 * 
 * @param string title タイトル
 * @param string text テキスト
 * @param string href リンク先
 */

require_once(get_template_directory() . '/functions/hrefSetting.php');
$href = hrefSetting($args['href']);
?>
<a class="link-card" <?php echo $href; ?>>
    <p class="link-card_title"><?php echo $args['title'] ?></p>
    <p class="link-card_desc"><?php echo $args['text'] ?></p>
    <p class="link-card_text">MORE</p>
</a>