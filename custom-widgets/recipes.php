<?php
namespace Elementor;

class Recipes extends Widget_Base {
	
	public function get_name() {
		return 'Recipes';
	}
	
	public function get_title() {
		return 'Recipes section';
	}
	
	public function get_icon() {
		return 'eicon-code';
	}
	
	public function get_categories() {
		return [ 'basic' ];
	}
	
	protected function _register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'elementor' ),
			]
		);

		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
				?>
				<div class="recipes" id="recipes">
					<!-- <img
						class="recipes__wave"
						src="assets/svg/wave-about.svg"
						alt="Wave SVG"
					/> -->

					<h2 class="recipes__heading"><?php echo $settings['title'] ?></h2>

					<div class="recipes__buttons">
						<button
							id="button_soup"
							class="recipes__button recipes__button--soup"
						>
							Zupy
						</button>
						<button
							id="button_meat"
							class="recipes__button recipes__button--meat"
						>
							Dania mięsne
						</button>
						<button
							id="button_desserts"
							class="recipes__button recipes__button--desserts"
						>
							Desery
						</button>
					</div>

					<div class="recipes__grid-container">
						<div class="recipes__grid">
						<?php foreach(get_posts(array('posts_per_page' => 6)) as $recipe) { 
							switch(get_the_category($recipe->ID)[0]->name) {
								case 'Zupy':
									$category_class = 'soup';
									break;
								case 'Desery':
									$category_class = 'desserts';
									break;
								default:
									$category_class = 'meat';
							}
							?>
							<a class="recipes__card recipes__card--<?php echo $category_class ?>" href="<?php echo get_permalink($recipe->ID) ?>">
								<div>
									<?php
										$featured_img_url = get_the_post_thumbnail_url($recipe->ID,'full');
										$featured_img_alt = get_post_meta ( get_post_thumbnail_id( $recipe->ID ), '_wp_attachment_image_alt', true );
									?>
									<img
										class="recipes__card-image"
										src="<?php echo $featured_img_url; ?>"
										alt="<?php echo $featured_img_alt; ?>"
									/>

									<h2 class="recipes__card-header"><?php echo esc_html($recipe->post_title) ?></h2>
									<?php foreach(get_the_category($recipe->ID) as $recipe_categories) { 
										switch($recipe_categories->name) {
											case 'Zupy':
												$category_class = 'soup';
												break;
											case 'Desery':
												$category_class = 'desserts';
												break;
											default:
												$category_class = 'meat';
										}
										?>
										<span class="recipes__card-category recipes__card-category--<?php echo $category_class; ?>">
											<?php echo $recipe_categories->name ?>
										</span>
									<?php } ?>
									<p class="recipes__card-description">
										<?php echo esc_html(get_the_excerpt($recipe->ID)); ?>
									</p>
								</div>	
							</a>
							<?php 
						} ?>
							
						</div>
					</div>
				</div>
				<?php
        // $url = $settings['link']['url'];
		// echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";
		 

	}
	
	protected function _content_template() {

    }
	
	
}