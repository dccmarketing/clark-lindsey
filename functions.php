<?php
/* Functions used for Clark-Lindsey */

if ( ! function_exists( 'clarklindsey_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clarklindsey_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'clark-lindsey' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'clark-lindsey', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'		=> __( 'Primary Menu', 	'clark-lindsey' ),
		'work' 			=> __( 'Work Links', 	'clark-lindsey' ),
		'helpcenter' 	=> __( 'Help Center', 	'clark-lindsey' ),
		'footer' 		=> __( 'Footer Links', 	'clark-lindsey' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

} // clarklindsey_setup()

endif; // clarklindsey_setup
add_action( 'after_setup_theme', 'clarklindsey_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function clarklindsey_widgets_init() {

	register_sidebar( array(
		'name'			=> __( 'Sidebar', 'clark-lindsey' ),
		'id'			=> 'sidebar',
		'description'	=> '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title"><span>',
		'after_title'	=> '</span></h1>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer 1', 'clark-lindsey' ),
		'id'			=> 'footer1',
		'description'	=> '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer 2', 'clark-lindsey' ),
		'id'			=> 'footer2',
		'description'	=> '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer 3', 'clark-lindsey' ),
		'id'			=> 'footer3',
		'description'	=> '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer 4', 'clark-lindsey' ),
		'id'			=> 'footer4',
		'description'	=> '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer 5', 'clark-lindsey' ),
		'id'			=> 'footer5',
		'description'	=> '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h1 class="widget-title">',
		'after_title'	=> '</h1>',
	) );

} // clarklindsey_widgets_init()
add_action( 'widgets_init', 'clarklindsey_widgets_init' );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param 	string 		$title 		Default title text for current view.
 * @param 	string 		$sep 		Optional separator.
 *
 * @uses 	is_feed()
 * @uses 	get_bloginfo()
 * @uses 	is_home()
 * @uses 	is_front_page()
 *
 * @return 	string 					The filtered title.
 */
function clarklindsey_wp_title( $title, $sep ) {

	if ( is_feed() ) { return $title; }

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) ) {

		$title .= " $sep $site_description";

	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {

		$title .= " $sep " . sprintf( __( 'Page %s', 'clark-lindsey' ), max( $paged, $page ) );

	}

	return $title;

} // clarklindsey_wp_title()
add_filter( 'wp_title', 'clarklindsey_wp_title', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function clarklindsey_scripts() {

	wp_enqueue_style( 'clarklindsey-style', get_stylesheet_uri() );

	wp_enqueue_script( 'cl-renewal-theme', get_template_directory_uri() . '/js/theme.min.js', array( 'jquery' ), '', true );

	//wp_enqueue_script( 'clarklindsey-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	//wp_enqueue_script( 'clarklindsey-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	//wp_enqueue_script( 'clarklindsey-cycle', get_template_directory_uri() . '/js/cycle2.min.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

} // clarklindsey_scripts()
add_action( 'wp_enqueue_scripts', 'clarklindsey_scripts' );

/**
 * [clarklindsey_add_to_head description]
 * @return [type] [description]
 */
function clarklindsey_add_to_head() {

	?><script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-9408894-14']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-48307596-1', 'clark-lindsey.com');
		ga('send', 'pageview');
	</script><?php

} // clarklindsey_add_to_head()

add_action( 'wp_head', 'clarklindsey_add_to_head' );



// Registering a new thumbnail size for use on the home page
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'featured-img', 464, 232, true );
	add_image_size( 'news-thumb', 233, 162, true );
}


add_filter( 'show_admin_bar', '__return_false' );


//______________________________________________________________________________
// Returns top level parent - even from grandchild, great-grandchild pages
// $pageid - the current post's id
//
function get_top_ancestor($pageid) {
	$current = get_post($pageid);
	if (!$current->post_parent) {
		return $current->ID;
	} else {
		return get_top_ancestor($current->post_parent);
	}
}

//______________________________________________________________________________
// Used on sub pages of sub sites
// Helps determine whether to  display nav menu of grandchildren
// $pageid : current page's id
// $ancestor_count : receives a 0
function count_to_top_ancestor($pageid, $ancestor_count) {
	$current = get_post($pageid);
	if (!$current->post_parent) {
		return $ancestor_count;
	} else {
		$ancestor_count++;
		return count_to_top_ancestor($current->post_parent, $ancestor_count);
	}
}


/**
 * Returns the URL of the featured image
 *
 * @param 	int 		$postID 		The post ID
 * @param 	string 		$size 			The image size to return
 *
 * @return 	string | bool 				The URL of the featured image, otherwise FALSE
 */
function clarklindsey_get_thumbnail_url( $postID, $size = 'thumbnail' ) {

	if ( empty( $postID ) ) { return FALSE; }

	$thumb_id = get_post_thumbnail_id( $postID );

	if ( empty( $thumb_id ) ) { return FALSE; }

	$thumb_array = wp_get_attachment_image_src( $thumb_id, $size, true );

	if ( empty( $thumb_array ) ) { return FALSE; }

	return $thumb_array[0];

} // clarklindsey_get_thumbnail_url()

/**
 * Load Fonts
 */
function load_fonts() {

	wp_register_style( 'et-googleFonts', 'http://fonts.googleapis.com/css?family=Cinzel|PT+Sans:400,700|Lato:100' );
	wp_enqueue_style( 'et-googleFonts' );

} // load_fonts()
add_action( 'wp_print_styles', 'load_fonts' );

/**
 * Prints whatever in a nice, readable format
 *
 * @param 	mixed 		$input 		Something to pretty print, usually an array or object
 *
 * @return 	mixed 					The input between pre tags and in print_r()
 */
function pretty( $input ) {

	echo '<pre>'; print_r( $input ); echo '</pre>';

} // pretty()



function clarklindsey_front_page_slider() {

	$myposts = clarklindsey_get_featured();

	?><div class="cs_featured cycle-slideshow"
		data-cycle-timeout="5000"
		data-cycle-random="true"
		data-cycle-starting-slide="<?php echo rand( 0, $myposts->found_posts ); ?>"
		data-cycle-overlay-template="<h2>{{cycleTitle}}</h2><p>{{cycleDesc}}</p><a href={{cycleLink}} class=readmore>Read More &raquo;</a>"><?php

		foreach ( $myposts->posts as $post ) {

			?><img src="<?php echo clarklindsey_get_thumbnail_url( $post->ID, 'featured-img' ); ?>" class="cs_ftrd_img" data-cycle-title="<?php echo $post->post_title; ?>" data-cycle-desc="<?php echo $post->post_excerpt; ?>" data-cycle-link="<?php echo get_permalink( $post->ID ); ?>" /><?php

		} // foreach

		?><div class="cycle-overlay"></div>
		<br clear="all" />
	</div><?php

} // clarklindsey_front_page_slider

function clarklindsey_get_featured() {

	$args['category_name'] 	= 'featured-article';
	$args['orderby'] 		= 'meta_value';
	$args['order'] 			= 'ASC';

	$myposts = new WP_Query( $args );

	return $myposts;

} // clarklindsey_get_featured()

/**
 * Change Social Menu to Icons Only
 *
 * @link 	http://www.billerickson.net/customizing-wordpress-menus/
 *
 * @param 	string 		$item_output		//
 * @param 	object 		$item				//
 * @param 	int 		$depth 				//
 * @param 	array 		$args 				//
 *
 * @return 	string 							modified menu
 */
function clarklindsey_menu_icons( $item_output, $item, $depth, $args ) {

	if ( 'helpcenter' !== $args->theme_location ) { return $item_output; }

	$output = '';
	$host 	= parse_url( $item->url, PHP_URL_HOST );
	$output .= '<a href="' . $item->url . '" class="icon-menu">';
	$class 	= clarklindsey_get_icon( $item->classes );

	if ( ! empty( $class ) ) {

		$output .= '<span class="' . $class . ' menuicon" ></span>';

	} // class check

	$output .= '<span class="hc-title">' . $item->title . '</span>';
	$output .= '</a>';

	return $output;

} // clarklindsey_menu_icons()

add_filter( 'walker_nav_menu_start_el', 'clarklindsey_menu_icons', 10, 4 );

/**
 * Gets the appropriate icon based on a menu item class
 *
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function clarklindsey_get_icon( $classes ) {

	$output = '';

	foreach ( $classes as $class ) {

		switch ( $class ) {

			case 'hc_tour': 	$output = 'icon_hc_tour'; break;
			case 'hc_call': 	$output = 'icon_hc_call'; break;
			case 'hc_email': 	$output = 'icon_hc_email'; break;
			case 'hc_faq': 		$output = 'icon_hc_faq'; break;
			case 'hc_video': 	$output = 'icon_hc_video'; break;
			case 'hc_photo': 	$output = 'icon_hc_photo'; break;
			case 'hc_brochure': $output = 'icon_hc_brochure'; break;
			case 'hc_news': 	$output = 'icon_hc_news'; break;

		} // switch

	} // foreach

	return $output;

} // clarklindsey_get_icon()

function clarklindsey_site_info() {

	printf( __( '<div class="credits"><a href="%1$s" target="_blank" >Designed &amp; Developed by DCC Marketing</a></div>', 'clark-lindsey' ), 'http://dccmarketing.com' );
	printf( '<span class="accessimg"></span>' );
	printf( __( '<div class="copyright">Copyright &copy %1$s <a href="%2$s" title="Login">%3$s</a></a></div>', 'clark-lindsey' ), date( 'Y' ), get_admin_url(), get_bloginfo( 'name' ) );

} // clarklindsey_site_info()
add_action( 'site_info', 'clarklindsey_site_info' );

/**
 * Adds Theme Options page, using ACF
 */
if( function_exists('acf_add_options_page') ) {

	$args['page_title'] 	= 'Theme Options';
	$args['menu_title'] 	= 'Theme Options';
	$args['parent_slug'] 	= 'themes.php';
	$args['capabilities'] 	= 'edit_posts';

	acf_add_options_sub_page( $args );

}

class Selective_Walker extends Walker_Nav_Menu {

	function walk( $elements, $max_depth ) {

		$args = array_slice( func_get_args(), 2 );
		$output = '';

		if ( $max_depth < -1 ) { //invalid parameter
			return $output;
		}

		if ( empty( $elements ) ) { //nothing to walk
			return $output;
		}

		$id_field 		= $this->db_fields['id'];
		$parent_field 	= $this->db_fields['parent'];

		// flat display
		if ( -1 == $max_depth ) {

			$empty_array = array();

			foreach ( $elements as $e ) {

				$this->display_element( $e, $empty_array, 1, 0, $args, $output );

			}

			return $output;

		}

		/*
		 * need to display in hierarchical order
		 * separate elements into two buckets: top level and children elements
		 * children_elements is two dimensional array, eg.
		 * children_elements[10][] contains all sub-elements whose parent is 10.
		 */
		$top_level_elements = array();
		$children_elements  = array();
		foreach ( $elements as $e) {

			if ( 0 == $e->$parent_field ) {

				$top_level_elements[] = $e;

			} else {

				$children_elements[ $e->$parent_field ][] = $e;

			}

		}

		/*
		 * when none of the elements is top level
		 * assume the first one must be root of the sub elements
		 */
		if ( empty($top_level_elements) ) {

			$first 				= array_slice( $elements, 0, 1 );
			$root 				= $first[0];
			$top_level_elements = array();
			$children_elements  = array();

			foreach ( $elements as $e) {

				if ( $root->$parent_field == $e->$parent_field ) {

					$top_level_elements[] = $e;

				} else {

					$children_elements[ $e->$parent_field ][] = $e;

				}
			}
		}

		$current_element_markers = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' );  //added by continent7

		foreach ( $top_level_elements as $e ) {  //changed by continent7

			// descend only on current tree
			$descend_test = array_intersect( $current_element_markers, $e->classes );

			if ( !empty( $descend_test ) ) {

				$this->display_element( $e, $children_elements, 2, 0, $args, $output );

			}

		}

		/*
		 * if we are displaying all levels, and remaining children_elements is not empty,
		 * then we got orphans, which should be displayed regardless
		 */
		 /* removed by continent7
		if ( ( $max_depth == 0 ) && count( $children_elements ) > 0 ) {

			$empty_array = array();

			foreach ( $children_elements as $orphans ) {

				foreach( $orphans as $op ) {

					$this->display_element( $op, $empty_array, 1, 0, $args, $output );

				}
			}
		 }
		*/

/*added by alpguneysel  */
		$pos 		= strpos( $output, '<a' );
		$pos2 		= strpos( $output, 'a>' );
		$topper 	= substr( $output, 0, $pos ) . substr( $output, $pos2 + 2 );
		$pos3 		= strpos( $topper, '>' );
		$lasst 		= substr( $topper, $pos3 + 1 );
		$submenu 	= substr( $lasst, 0, -6 );

	return $submenu;

	} // walk()

} // class

if ( ! function_exists( 'clarklindsey_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @uses 	get_next_posts_link()
 * @uses 	next_posts_link()
 * @uses 	get_previous_posts_link()
 * @uses 	previous_posts_link()
 */
	function clarklindsey_paging_nav() {

		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) { return; }

		?><nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation','clark-lindsey'); ?></h1>
			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts','clark-lindsey') ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>','clark-lindsey') ); ?></div>
				<?php endif; ?>

			</div><!-- .nav-links -->
		</nav><!-- .navigation --><?php

	} // clarklindsey_paging_nav()
endif;

if ( ! function_exists( 'clarklindsey_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @uses 	get_the_time()
 * @uses 	get_the_modified_time()
 * @uses 	esc_attr()
 * @uses 	get_the_date()
 * @uses 	esc_html()
 * @uses 	get_the_modified_date()
 * @uses 	esc_url()
 * @uses 	get_permalink()
 * @uses 	get_author_posts_url()
 * @uses 	get_the_author_meta()
 * @uses 	get_the_author()
 */
	function clarklindsey_posted_on() {

		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( 'Posted on %s', 'post date', 'clark-lindsey' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		/*$byline = sprintf(
			_x( 'by %s', 'post author', 'clark-lindsey' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);*/

		//echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

		echo '<span class="posted-on">' . $posted_on . '</span> <span class="cats"> ' . clarklindsey_entry_cats() . '</span>';

	} // clarklindsey_posted_on()
endif;

if ( ! function_exists( 'clarklindsey_entry_cats' ) ) :

	function clarklindsey_entry_cats() {

		$output = '';

		if ( 'post' == get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'clark-lindsey' ) );

			if ( $categories_list && clarklindsey_categorized_blog() ) {

				$output .= '<span class="cat-links">' . __( ' in ',  'clark-lindsey' ) . $categories_list . '</span>';

			}

		}

		return $output;

	} // clarklindsey_entry_cats()
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @uses 	get_transient()
 * @uses 	get_categories()
 * @uses 	set_transient()
 *
 * @return bool
 */
function clarklindsey_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( 'clarklindsey_categories' ) ) ) {

		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'clarklindsey_categories', $all_the_cool_cats );

	}

	if ( $all_the_cool_cats > 1 ) {

		// This blog has more than 1 category so clarklindsey_categorized_blog should return true.
		return true;

	} else {

		// This blog has only 1 category so clarklindsey_categorized_blog should return false.
		return false;

	}

} // clarklindsey_categorized_blog()

if ( ! function_exists( 'clarklindsey_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 *
 * @uses 	get_post_type()
 * @uses 	get_the_category_list()
 * @uses 	function_names_categorized_blog()
 * @uses 	get_the_tag_list()
 * @uses 	is_single()
 * @uses 	post_password_required()
 * @uses 	comments_open()
 * @uses 	get_comments_number()
 * @uses 	comments_popup_link()
 * @uses 	edit_post_link()
 */
	function clarklindsey_entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'clark-lindsey' ) );
			if ( $tags_list ) {

				printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'clark-lindsey' ) . '</span>', $tags_list );

			}

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'clark-lindsey' ), __( '1 Comment', 'clark-lindsey' ), __( '% Comments', 'clark-lindsey' ) );
			echo '</span>';

		}

		edit_post_link( __( 'Edit', 'clark-lindsey' ), '<span class="edit-link">', '</span>' );

	} // clarklindsey_entry_footer()
endif;

function clarklindsey_excerpt_more( $more ) {

	return '... <a class="readmore" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'clark-lindsey' ) . '</a>';

}
add_filter( 'excerpt_more', 'clarklindsey_excerpt_more' );


