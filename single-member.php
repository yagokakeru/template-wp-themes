<?php
    get_header();

    require_once(get_template_directory() . '/functions/imageInfo.php');
?>

<?php
    get_template_part( 'page-templates/page-title', null, ['title' => '社員紹介'] )
?>

<section class="section_main">
    <div class="main_container">
        <p class="main_desc">各社員の仕事ぶりや将来に向けた目標、想いなどを紹介します。</p>
        <div class="main_info_box">
            <div class="main_img_wrap">
                <?php if ( has_post_thumbnail() ): ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" width="1" height="1">
                <?php else: ?>
                    <img src="<?php echo wp_get_attachment_url(64); ?>" alt="サムネイル" width="1" height="1">
                <?php endif; ?>
                <div class="main_write">
                    <?php get_template_part( 'page-templates/handwritten-text' ); ?>
                </div>
                <?php if ( SCF::get('comment') ): ?>
                    <p class="main_img_text"><?php echo nl2br(SCF::get('comment')); ?></p>
                <?php endif; ?>
            </div>
            <div class="main_info_wrap">
                <p class="main_name"><span class="main_name_ja"><?php echo SCF::get('name_jp') ? SCF::get('name_jp') : '匿名希望'; ?></span><?php echo SCF::get('name_en'); ?></p>
                <?php if ( SCF::get('position') ): ?>
                    <p class="main_position"><?php echo SCF::get('position'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( SCF::get('lead_text') ): ?>
            <p class="main_text"><?php echo nl2br(SCF::get('lead_text')); ?></p>
        <?php endif; ?>

        <ul class="main_table">
            <?php
                $contents = SCF::get('contents');
                $index = 1;
                foreach ( $contents as $content ):
            ?>
                    <li class="main_table_item">
                        <a href="#section_content<?php echo $index; ?>">
                            <span class="en"><?php echo $content['title_en'] ?></span>
                            <?php if ( $content['title_jp'] ): ?>
                                　- <?php echo $content['title_jp'] ?> -
                            <?php endif; ?>
                        </a>
                    </li>
            <?php
                    $index++;
                endforeach;
            ?>
        </ul>
    </div>
</section>

<?php
    $contents = SCF::get('contents');
    $index = 1;
    foreach ( $contents as $content ):
?>
        <section class="section_content" id="section_content<?php echo $index; ?>">
            <div class="content_container">
                <h3 class="content_title">
                    <span class="en"><?php echo $content['title_en'] ?></span>
                    <?php if ( $content['title_jp'] ): ?>
                        - <?php echo $content['title_jp'] ?> -
                    <?php endif; ?>
                </h3>
                <?php if ( $content['head'] ): ?>
                    <p class="content_head"><?php echo nl2br($content['head']); ?></p>
                <?php endif; ?>
                <?php if ( $content['image'] ): ?>
                    <?php $image = imageInfo($content['image']); ?>
                    <img class="content_img" src="<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" loading="lazy">
                <?php endif; ?>
                <?php if ( $content['text'] ): ?>
                    <p class="content_text"><?php echo nl2br($content['text']); ?></p>
                <?php endif; ?>
            </div>
        </section>
<?php
        $index++;
    endforeach;
?>

<?php get_footer(); ?>