<?php
namespace Elementor;

class About extends Widget_Base {
	
	public function get_name() {
		return 'About';
	}
	
	public function get_title() {
		return 'About section';
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

		$this->add_control(
			'about',
			[
				'label' => 'About',
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => __( 'Type your description here', 'plugin-name' ),
			]
		);

		$this->add_control(
			'image',
			[
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label' => 'Choose Image'
			]
		);

		$this->end_controls_section();
	}
	
	protected function render() {

        $settings = $this->get_settings_for_display();
				?>
				<div class="about">
					<div class="about__anchor" id="about"></div>
					<div class="about__container">
						<img 
							src="<?php echo $settings['image']['url']; ?>" 
							alt="<?php echo $settings['image']['alt']; ?>"
							class="about__image"
							data-aos="fade-right"
						/>

						<div>
							<h2 class="about__heading" data-aos="fade-up">
								<?php echo $settings['title']; ?>
							</h2>
							<div
								class="about__description"
								data-aos="fade-up"
								data-aos-delay="150"
							>
								<?php echo $settings['about']; ?>
							</div>
						</div>

					</div>
				</div>
				<?php

	}
	
	protected function _content_template() {

    }
	
	
}