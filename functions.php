<?php
/**
 * アドミンバーを非表示
 */
add_filter( 'show_admin_bar', '__return_false' );

// 管理画面アドミンバーメニュー削除
function remove_admin_bar_menus( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressロゴ.
	$wp_admin_bar->remove_menu( 'view-site' ); // サイト名 / サイトを表示.
	$wp_admin_bar->remove_menu( 'comments' ); // コメント.
	$wp_admin_bar->remove_menu( 'new-content' ); // 新規投稿
	$wp_admin_bar->remove_menu( 'archive' ); // 投稿一覧
	$wp_admin_bar->remove_menu( 'updates' ); // 投稿一覧

    // global $wp_admin_bar;
    // echo '<pre>';
    // var_dump( $wp_admin_bar );
    // echo '</pre>';
}
// add_action( 'admin_bar_menu', 'remove_admin_bar_menus', 999 );
// add_filter( 'aioseo_show_in_admin_bar', '__return_false' ); // All in One SEO Pack.

// 管理画面サイドメニュー削除
function remove_menu() {
    remove_menu_page('index.php'); // ダッシュボード
    remove_menu_page('edit.php'); // 投稿
    remove_menu_page('edit-comments.php'); // コメント
    remove_menu_page('themes.php'); // 外観
    remove_menu_page('plugins.php'); // プラグイン
    remove_menu_page('tools.php'); // ツール
    remove_menu_page('options-general.php'); // 設定
    remove_menu_page('cptui_main_menu'); // Custom Post Type UI
    remove_menu_page('edit.php?post_type=smart-custom-fields'); // Smart Custom Fields
    remove_menu_page('aioseo'); // All in One SEO

    //  global $menu;
    //  echo '<pre>';
    //  var_dump( $menu );
    //  echo '</pre>';
}
// add_action('admin_menu', 'remove_menu');

// ダッシュボードリダイレクト - 管理画面サイドメニュー削除でダッシュボードを非表示にしたため
function login_redirect() {
	wp_safe_redirect( admin_url( '/edit.php' ) );
	exit();
}
// add_action('wp_login', 'login_redirect');

/**
 * 投稿画面のデフォルトエディターを非表示
 */
// function my_remove_post_support() {
//     remove_post_type_support('member','editor'); 
// }
// add_action( 'init' , 'my_remove_post_support' );

/**
 * アイキャッチ画像の説明文を追加
 */
function my_admin_post_thumbnail_html( $content ) {
    $screen = get_current_screen();
    if ( $screen->post_type == 'member' ) {
      $content .= '<p>画像のファイル名に日本語は使わないこと<br>画像サイズは縦横1340pxが推奨です。<br>ページ表示速度に影響するので画像ファイルサイズの圧縮を実施してからアップロードしてください。<br><a href="https://www.iloveimg.com/ja/compress-image" target=_blank>画像圧縮サイト</a></p>';
    }
    return $content;
}
add_filter( 'admin_post_thumbnail_html', 'my_admin_post_thumbnail_html');

// タイトル下に説明文を追加
add_action('edit_form_after_title', 'precautions');
function precautions($post){
    echo '<p style="color: #999; font-size: 0.9em;">パーマリンクは英数字で設定することをオススメします。</p>';
}

/**
 * CSS,JavaScriptの読み込み
 */
function add_link_fils() {
    // CSSの読み込み
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&display=swap');
    wp_enqueue_style('reset-css', 'https://unpkg.com/destyle.css@4.0.1/destyle.min.css');
    wp_enqueue_style('common-css', get_stylesheet_directory_uri().'/assets/css/common.css');

    // JavaScriptの読み込み
    wp_enqueue_script('gsap', 'https://unpkg.com/gsap@3.12.5/dist/gsap.min.js', false, true);
    wp_enqueue_script('scrollTrigger', 'https://unpkg.com/gsap@3.12.5/dist/ScrollTrigger.min.js', false, true);
    wp_enqueue_script('vivus', 'https://cdnjs.cloudflare.com/ajax/libs/vivus/0.4.6/vivus.min.js', false, true);
    wp_enqueue_script('common-js', get_template_directory_uri().'/assets/js/common.js', false, true);

    // ページごとの読み込み
    if( is_front_page() ) { // HOMEのスタイル
        wp_enqueue_style('home-css', get_stylesheet_directory_uri().'/assets/css/home.css');
        wp_enqueue_style('splide-css', 'https://unpkg.com/@splidejs/splide@4.1.4/dist/css/splide-core.min.css');
        wp_enqueue_script('splide-js', 'https://unpkg.com/@splidejs/splide@4.1.4/dist/js/splide.min.js', false, true);
        wp_enqueue_script('splide-extension-auto-scroll-js', 'https://unpkg.com/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js', false, true);
        wp_enqueue_script('home-js', get_template_directory_uri().'/assets/js/home.js', false, true);
    }
    if( is_page('about') ) { // 私たちの特徴のスタイル
        wp_enqueue_style('about-css', get_stylesheet_directory_uri().'/assets/css/about.css');
        wp_enqueue_style('splide-css', 'https://unpkg.com/@splidejs/splide@4.1.4/dist/css/splide-core.min.css');
        wp_enqueue_script('splide-js', 'https://unpkg.com/@splidejs/splide@4.1.4/dist/js/splide.min.js', false, true);
        wp_enqueue_script('splide-extension-auto-scroll-js', 'https://unpkg.com/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js', false, true);
        wp_enqueue_script('about-js', get_stylesheet_directory_uri().'/assets/js/about.js', false, true);
    }
    if( is_post_type_archive('member') ) { // 社員紹介一覧のスタイル
        wp_enqueue_style('archive-member-css', get_stylesheet_directory_uri().'/assets/css/archive-member.css');
    }
    if( is_singular('member') ) { // 社員紹介個別のスタイル
        wp_enqueue_style('single-member-css', get_stylesheet_directory_uri().'/assets/css/single-member.css');
    }
}
add_action('wp_enqueue_scripts', 'add_link_fils');