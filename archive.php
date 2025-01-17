<?php get_header(); ?>

<?php get_template_part( 'page-templates/page-title', null, ['title' => '社員紹介'] ); ?>

        <div class="member_wrap">
            <?php
                $args = [
                    'post_type' => 'member',
                    'posts_per_page' => -1,
                ];
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                    while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
                        <a class="member_inner" href="<?php the_permalink(); ?>">
                            <div class="member_thumbnail_box">
                                <?php if ( has_post_thumbnail() ): ?>
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" width="1" height="1">
                                <?php else: ?>
                                    <img src="<?php echo wp_get_attachment_url(64); ?>" alt="サムネイル" width="1" height="1">
                                <?php endif; ?>
                            </div>
                            <?php if ( SCF::get('last_name') ): ?>
                                <div class="member_name"><?php echo SCF::get('last_name'); ?></div>
                            <?php endif; ?>
                            <?php if ( SCF::get('archive_position') ): ?>
                                <div class="member_position"><?php echo SCF::get('archive_position'); ?></div>
                            <?php endif; ?>
                        </a>
            <?php
                    endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>

<?php get_footer(); ?>