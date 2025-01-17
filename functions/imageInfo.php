<?php
/**
 * 画像のurl,widht,height,altを取得
 * 
 * 画像IDを渡すことでurl,widht,height,altを取得できます。
 * 画像に代替テキストが指定されてない場合はaltに'画像'が入ります。
 * $defaultAltに値を渡すことで代替テキスト指定されていなかった場合の代替テキストを任意に決めることができます。
 * 
 * @param int $imageID 画像ID
 * @param string $defaultAlt 代替テキストが指定されてない場合に設定する値
 */
function imageInfo($imageID, $defaultAlt = '画像') {
    $image = wp_get_attachment_image_src($imageID, 'full');
    $imageSrc = $image[0];
    $imageWidht = $image[1];
    $imageHeight = $image[2];
    $imageAlt = get_post_meta( $imageID, '_wp_attachment_image_alt', true ) ? get_post_meta( $imageID, '_wp_attachment_image_alt', true ) : $defaultAlt;

    return array(
        'src' => $imageSrc,
        'widht' => $imageWidht,
        'height' => $imageHeight,
        'alt' => $imageAlt
    );
}