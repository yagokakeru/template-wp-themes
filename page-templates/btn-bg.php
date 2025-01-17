<?php
/**
 * ボタン（背景あり）
 * 
 * @param string text テキスト
 * @param string href リンク先
 */

require_once(get_template_directory() . '/functions/hrefSetting.php');
$href = hrefSetting($args['href']);
?>
<a class="btn_bg <?php echo preg_match("/[ぁ-ん]+|[ァ-ヴー]+|[一-龠]/u", $args['text']) ? 'jp' : 'en' ?>" <?php echo $href ?>><?php echo $args['text'] ?></a>