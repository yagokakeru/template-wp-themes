<?php
/**
 * リンク先/外部リンクの場合は別タブで開くはを判定する関数
 * 
 * リンク先URL（絶対パス）を渡し、同一ドメインの場合はtarget属性を設定しない、
 * 
 * @param string $URL 設定したいリンク先のURL
 * 
 * @return string $href href属性とtarget属性の文字列
 */
function hrefSetting($URL) {
    if ($URL) { // リンクがある場合
        $domain = $_SERVER['HTTP_HOST']; // ドメイン取得
        if( strpos( $URL, $domain ) ) { // リンクが同一ドメインの場合
            $href = 'href="' . $URL . '"';
        } else {
            $href = 'href="' . $URL . '" target="_blank" rel="noopener noreferrer"';
        }
    } else { // リンクがない場合
        $href = '';
    }

    return $href;
}