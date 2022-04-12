<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php if ( get_post_type() == 'page' ) { ?>

	<div class="hero-baner">

		<?php if ( get_theme_mod('hello-settings-header-image') ) { 
			$header_img = get_theme_mod('hello-settings-header-image');
			$header_img_alt = get_post_meta( attachment_url_to_postid($header_img), '_wp_attachment_image_alt', true );
		}
		?>
		<img class="hero-baner__slider" src="<?php echo $header_img ? $header_img : ''; ?>" alt="<?php echo $header_img_alt ? $header_img_alt : ''; ?>">

	</div>

	<main>
		<?php the_content(); ?>
	</main>

<?php
} else {
	while ( have_posts() ) :
		the_post();
		?>

	<div class="hero-baner hero-baner--product">

		<?php if ( get_theme_mod('hello-settings-header-image') ) { 
			$header_img = get_theme_mod('hello-settings-header-image');
			$header_img_alt = get_post_meta( attachment_url_to_postid($header_img), '_wp_attachment_image_alt', true );
		}
		?>
		<img class="hero-baner__slider hero-baner__slider--product" src="<?php echo $header_img ? $header_img : ''; ?>" alt="<?php echo $header_img_alt ? $header_img_alt : ''; ?>">

	</div>

	<main id="content" <?php post_class( 'site-main' ); ?> role="main">
		<div class="product">
			<?php
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				$featured_img_alt = get_post_meta ( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
			?>
			<img class="product__image" src="<?php echo $featured_img_url; ?>" alt="<?php echo $featured_img_alt; ?>">
			<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
				<header>
					<?php the_title( '<h1 class="product__header">', '</h1>' ); ?>
				</header>
			<?php endif; ?>
			
			<?php 
				$categories = get_the_category(get_the_ID());
				foreach($categories as $category) {
					switch($category->name) {
						case 'Zupy':
							$category_class = 'soup';
							break;
						case 'Desery':
							$category_class = 'desserts';
							break;
						default:
							$category_class = 'meat';
					}
					echo '<span class="product__category product__category--' . $category_class . '">' . $category->name . '</span>';
				}
			?>
			<article class="product__text">
				<?php the_content(); ?>
			</article>
			<div class="product__tags">
				<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
			</div>
			<?php wp_link_pages(); ?>

		</div>
	</main>

		<?php
	endwhile;
}
