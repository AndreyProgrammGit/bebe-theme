<?php
/**
 * Bebe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bebe
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bebe_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Bebe, use a find and replace
		* to change 'bebe' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'bebe', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-header' => esc_html__( 'Header', 'bebe' ),
			'menu-footer' => esc_html__( 'Footer', 'bebe' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bebe_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size('post-front', 235, 183, true);
	add_image_size('post-single', 370, 280, true);

	// add_image_size('gallery-one', 222, 341, true);
	// add_image_size('gallery-two', 222, 164, true);
	// add_image_size('gallery-third', 456, 164, true);

}
add_action( 'after_setup_theme', 'bebe_setup' );
add_image_size('teacher-photo', 281, 162, true);
add_image_size('room-photo', 212, 168, true);
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bebe_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bebe_content_width', 640 );
}
add_action( 'after_setup_theme', 'bebe_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bebe_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bebe' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bebe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bebe_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bebe_scripts() {
	wp_enqueue_style( 'bebe-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bebe-general', get_template_directory_uri() . '/layouts/general.css', array(), _S_VERSION );
	wp_enqueue_style( 'bebe-admin', get_template_directory_uri() . '/layouts/admin.css', array(), _S_VERSION );
	wp_style_add_data( 'bebe-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bebe-navigation', get_template_directory_uri() . '/js/customizer.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bebe-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bebe-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scrollable', get_template_directory_uri() . '/js/libs/scrollable.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/libs/jquery.flexslider-min.js', array(), _S_VERSION, true );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bebe_scripts' );

add_action('admin_enqueue_scripts', 'ale_add_scripts', 10);
function ale_add_scripts($hook){
	if('post-new.php' == $hook || 'post.php' == $hook) {
		wp_enqueue_script( 'bebe_metaboxes', get_template_directory_uri()  . '/js/admin/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
		wp_enqueue_script( 'bebe_metabox-gallery', get_template_directory_uri()  . '/js/admin/metabox-gallery.js', array( 'jquery') );
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Init tgm plugins activate
 */
require get_template_directory() . '/inc/tgm-list.php';

/**
 * Metaboxes
 */
require get_template_directory() . '/inc/metaboxes.php';
require get_template_directory() . '/inc/gallery-meta.php';

/**
 * redux init
 */
require get_template_directory() . '/inc/redux-options.php';
/**
 * init breadcrumbs
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_action( 'init', 'gallery_taxonomy' );
function gallery_taxonomy(){ 
	register_taxonomy( 'gallery-category', [ 'gallery' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Categorys',
			'singular_name'     => 'Category',
			'search_items'      => 'Search Categorys',
			'all_items'         => 'All Categorys',
			'view_item '        => 'View Categorys',
			'parent_item'       => 'Parent Category',
			'parent_item_colon' => 'Parent Category:',
			'edit_item'         => 'Edit Category',
			'update_item'       => 'Update Category',
			'add_new_item'      => 'Add New Category',
			'new_item_name'     => 'New Category Name',
			'menu_name'         => 'Category',
			'back_to_items'     => '← Back to Category',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => false,

		'rewrite'               => ['slug' => 'gallery-category'],
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => true, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}

add_action( 'init', 'bebe_register_post_type_for_gallery' );
function bebe_register_post_type_for_gallery(){

	register_post_type( 'gallery', [
		'label'  => null,
		'labels' => [
			'name'               => 'Galleries', // основное название для типа записи
			'singular_name'      => 'Gallery', // название для одной записи этого типа
			'add_new'            => 'Добавить new Gallery', // для добавления новой записи
			'add_new_item'       => 'Добавление Gallery', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Gallery', // для редактирования типа записи
			'new_item'           => 'Новое Gallery', // текст новой записи
			'view_item'          => 'Смотреть Gallery', // для просмотра записи этого типа.
			'search_items'       => 'Искать Gallery', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Gallery', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		'show_ui'                => true,
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		// 'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

add_action( 'init', 'bebe_register_post_type_for_rooms' );

function bebe_register_post_type_for_rooms(){

	register_post_type( 'rooms', [
		'label'  => null,
		'labels' => [
			'name'               => 'Rooms', // основное название для типа записи
			'singular_name'      => 'Room', // название для одной записи этого типа
			'add_new'            => 'Добавить new room', // для добавления новой записи
			'add_new_item'       => 'Добавление ____', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование ____', // для редактирования типа записи
			'new_item'           => 'Новое ____', // текст новой записи
			'view_item'          => 'Смотреть ____', // для просмотра записи этого типа.
			'search_items'       => 'Искать ____', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Rooms', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}


add_action( 'init', 'bebe_register_post_type_for_teachers_block' );
function bebe_register_post_type_for_teachers_block(){

	register_post_type( 'teachers', [
		'label'  => null,
		'labels' => [
			'name'               => 'Teachers', // основное название для типа записи
			'singular_name'      => 'Teacher', // название для одной записи этого типа
			'add_new'            => 'Добавить new teacher', // для добавления новой записи
			'add_new_item'       => 'Добавление ____', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование ____', // для редактирования типа записи
			'new_item'           => 'Новое ____', // текст новой записи
			'view_item'          => 'Смотреть ____', // для просмотра записи этого типа.
			'search_items'       => 'Искать ____', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Teachers', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}


function aletheme_metaboxes($meta_boxes) {

	$meta_boxes = array();



	wp_reset_postdata();

	$prefix = "bebe_";


	$meta_boxes[] = array(
		'id'         => 'homepage_metabox',
		'title'      => 'Homepage Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('About Photo','bebe'),
				'desc' => __('Upload a photo. Recommended size: 280-194px','bebe'),
				'id'   => $prefix . 'about_photo',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => __('About title','bebe'),
				'desc' => __('The title','bebe'),
				'id'   => $prefix . 'about_title',
				'std'  => 'About Us',
				'type' => 'text',
			),
			array(
				'name' => __('Description About Box','bebe'),
				'desc' => __('Type the description','bebe'),
				'id'   => $prefix . 'about_desc',
				'std'  => '',
				'type' => 'wysiwyg',
			),
			array(
				'name' => __('About Link','bebe'),
				'desc' => __('The Link','bebe'),
				'id'   => $prefix . 'about_link',
				'std'  => '',
				'type' => 'text',
			),


			array(
				'name' => __('Info Title 1','bebe'),
				'desc' => __('Type here the Info Title 1','bebe'),
				'id'   => $prefix . 'info_title_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 1','bebe'),
				'desc' => __('Type here the Info Description 1','bebe'),
				'id'   => $prefix . 'info_description_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Title 2','bebe'),
				'desc' => __('Type here the Info Title 2','bebe'),
				'id'   => $prefix . 'info_title_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 2','bebe'),
				'desc' => __('Type here the Info Description 2','bebe'),
				'id'   => $prefix . 'info_description_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Title 3','bebe'),
				'desc' => __('Type here the Info Title 3','bebe'),
				'id'   => $prefix . 'info_title_3',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info Description 3','bebe'),
				'desc' => __('Type here the Info Description 3','bebe'),
				'id'   => $prefix . 'info_description_3',
				'std'  => '',
				'type' => 'text',
			),
		)
	);


	$meta_boxes[] = array(
		'id'         => 'about_metabox',
		'title'      => 'About Data',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('Teacher Block title','bebe'),
				'desc' => __('Specify the Teacher Block Title','bebe'),
				'id'   => $prefix . 'about_teachers',
				'std'  => '',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'teachers_metabox',
		'title'      => 'Teachers Social Links',
		'pages'      => array( 'teachers', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('Facebook Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'fb_link',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Twitter Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'twi_link',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Pinterest Link','bebe'),
				'desc' => __('Add the link','bebe'),
				'id'   => $prefix . 'pin_link',
				'std'  => '',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'contact_metabox',
		'title'      => esc_html__('Contact Info','bebe'),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contact.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => esc_html__('Address Label','bebe'),
				'desc' => esc_html__('Add the info','bebe'),
				'id'   => $prefix . 'address_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => esc_html__('Address','bebe'),
				'desc' => esc_html__('Add the info','bebe'),
				'id'   => $prefix . 'address',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Phone Label','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'phone_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Phone','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'phone',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Email Label','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'email_label',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Email','bebe'),
				'desc' => __('Add the info','bebe'),
				'id'   => $prefix . 'email',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Google Maps Api Key','bebe'),
				'desc' => __('Get your API key in Google Console.','bebe'),
				'id'   => $prefix . 'googleapi',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Contact Form Shortcode','bebe'),
				'desc' => __('You can use any contact for Plugin. Generate the Form and paste the shortcode here. ','bebe'),
				'id'   => $prefix . 'contactformshortcode',
				'std'  => '',
				'type' => 'textarea_code',
			),
		)
	);

	return $meta_boxes;
}

function bebe_get_share($type = 'fb', $permalink = false, $title = false) {
	if($permalink){
		$permalink = get_permalink();
	}
	if(!$title){
		$title = get_the_title();
	}
	switch($type){
		case 'twi':
			return 'http://twiter.com/home?status' . $title . '+-+' . $permalink;
			break;
		case 'fb':
			return 'http://facebook.com/sahrer.php?u=' . $permalink . '$t=' . $title;
			break;
		case 'googl':
			return 'http://plus.google.com/share?url=' . urlencode($permalink);
			break;
		case 'pin':
			return 'http://pinterest.com/pin/create/button/?url=' . $permalink;
			break;
		default:
			return '';
	}
}

function bebe_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'article' == $args['style'] ) {
		$tag = 'article';
		$add_below = 'comment';
	} else {
		$tag = 'article';
		$add_below = 'comment';
	}

	?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
		
	<div class="<?php if($depth > 1){ echo 'reply '; } else{ ?> comment <?php } ?>cf"><
				
		<?php

			

		if($depth >= 2): ?><div class="enter"></div><?php endif; ?>
		<div class="avatar">
		<?php echo get_avatar( $comment, 105); ?>
			<h4><?php comment_author(); ?></h4>
		</div>
		<div class="text">
			<div class="top">
				<h4 class="date">Date: <?php comment_date() ?></h4>
					<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			<div class="dotted-line"></div>
			<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-meta-item">Your comment is awaiting moderation.</p>
			<?php endif; ?>
			<?php comment_text() ?>
			<p><?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?></p>
		</div>
	</div>
	<?php }

// end of awesome semantic comment

function bebe_comment_close() {
	echo '</article>';
}