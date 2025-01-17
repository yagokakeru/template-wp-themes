<?php get_header(); ?>

<?php
    function titleArea($titleJa, $titleEn, $writeDOM = false) {
        echo '<div class="section_title_wrap">';
            echo $writeDOM ? '<div class="section_title_write">' : '';
            echo $writeDOM ? get_template_part( 'page-templates/handwritten-text' ) : '';
            echo $writeDOM ? '</div>' : '';
            echo '<h3 class="section_title_en">' . $titleEn . '</h3>';
            echo '<h2 class="section_title_ja">' . $titleJa . '</h2>';
        echo '</div>';
    }
?>


<a class="link_interview_wrap" href="<?php echo get_post_type_archive_link( 'member' ); ?>"></a>
<?php titleArea('私たちの特徴', 'WHAT WE DO?'); ?>

<?php get_footer(); ?>
