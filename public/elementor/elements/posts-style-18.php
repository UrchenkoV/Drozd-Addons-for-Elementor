<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use \Elementor\Group_Control_Image_Size as Group_Control_Image_Size;
use \Elementor\Controls_Manager as Controls_Manager;
use \Elementor\Group_Control_Typography as Group_Control_Typography;
use \Elementor\Group_Control_Css_Filter as Group_Control_Css_Filter;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;

/**
 * Elementor Drozd Widget.
 *
 * @since 1.0.3
 */
class Posts_Style_18 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'drozd-posts-style-18';
	}

	public function get_title() {
		return __( 'Posts Style 18', 'drozd-addons-for-elementor' );
	}

	public function get_icon() {
		return 'drozd-icon-posts-style-18';
	}

	public function get_categories() {
		return [ 'drozd' ];
	}

	protected function register_controls() {

		/*
		 * =======================================
		 * SETTINGS
		 * =======================================
		 */
		$this->start_controls_section(
			'posts_style_1_settings',
			[
				'label' => __( 'Settings', 'drozd-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Header', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'widget_title',
			[
				'label' => __( 'Block Title', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'drozd-addons-for-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'heading_posts',
			[
				'label' => __( 'Posts', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'posts_number',
			array(
				'label'   => esc_html__( 'Number of posts to display:', 'drozd-addons-for-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 3,
			)
		);

		$this->add_control(
			'offset_posts_number',
			array(
				'label' => esc_html__( 'Offset Posts:', 'drozd-addons-for-elementor' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'heading_filter',
			[
				'label' => __( 'Filter', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'display_type',
			array(
				'label'   => esc_html__( 'Display the posts from:', 'drozd-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'latest',
				'options' => array(
					'latest'     => esc_html__( 'Latest Posts', 'drozd-addons-for-elementor' ),
					'categories' => esc_html__( 'Categories', 'drozd-addons-for-elementor' ),
				),
			)
		);

		$this->add_control(
			'categories_selected',
			array(
				'label'     => esc_html__( 'Select Categories:', 'drozd-addons-for-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => drozd_elementor_categories(),
				'condition' => array(
					'display_type' => 'categories',
				),
			)
		);

		$this->add_control(
			'important_note',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => '<strong>' . __( 'Please note!', 'drozd-addons-for-elementor' ) . '</strong> ' . __( 'For correct display, each post must have an image. If the image is loaded before installing the Drozd plugin, use the Regenerate Thumbnails plugin to display the images correctly.', 'drozd-addons-for-elementor' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
			]
		);


		$this->end_controls_section();





		/*
		 * =======================================
		 * STYLE
		 * =======================================
		 */
		/* HEADER STYLE */
		$this->start_controls_section(
			'section_header_style',
			[
				'label' => __( 'Header', 'drozd-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'widget_title!' => '',
				]
			]
		);

		$this->add_control(
			'header_color',
			[
				'label' => __( 'Color', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .title-wrap .title .header' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'header_background',
			[
				'label' => __( 'Background', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#00b4ff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .title-wrap .title .header' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'header_typography',
				'selector' => '{{WRAPPER}} .drozd-posts-style-18 .title-wrap .title .header',
			]
		);

		$this->add_responsive_control(
			'header_border_radius',
			[
				'label' => __( 'Border Radius', 'drozd-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .title-wrap .title .header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_padding',
			[
				'label' => __( 'Padding', 'drozd-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .title-wrap .title .header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'header_border_color',
			[
				'label' => __( 'Border Color', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#00b4ff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .title-wrap .title' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'header_border_width',
			[
				'label' => __( 'Border Width', 'drozd-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .title-wrap .title' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'header_margin',
			[
				'label' => __( 'Margin', 'drozd-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .title-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();





		/* TAGS TITLE META */
		$this->start_controls_section(
			'section_image__image',
			[
				'label' => __( 'Tags, Title , Author and Date', 'drozd-addons-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'first_controls' );

		$this->start_controls_tab(
			'first_colors_normal',
			[
				'label' => __( 'Normal', 'drozd-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'style_tags',
			[
				'label' => __( 'Tags', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'show_tags',
			[
				'label' => __( 'Show Tags', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'drozd-addons-for-elementor' ),
				'label_off' => __( 'Hide', 'drozd-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'tags_color',
			[
				'label' => __( 'Color', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .tags a' => 'color: {{VALUE}}',
				],
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_control(
			'tags_background',
			[
				'label' => __( 'Background', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#212121',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .tags a' => 'background: {{VALUE}}',
				],
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tags_typography',
				'selector' => '{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .tags a',
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_responsive_control(
			'tags_padding',
			[
				'label' => __( 'Padding', 'drozd-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .tags a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_responsive_control(
			'tags_margin',
			[
				'label' => __( 'Margin', 'drozd-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .tags a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_responsive_control(
			'tags_border_radius',
			[
				'label' => __( 'Border Radius', 'drozd-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .tags a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_control(
			'style_title',
			[
				'label' => __( 'Title', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .title h3 a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .title h3 a',
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Background', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .posts-wrap .col-wrap .meta-info .meta-align' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'style_meta',
			[
				'label' => __( 'Author and Date', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'author_color',
			[
				'label' => __( 'Author Color', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#333333',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .author-date a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'date_color',
			[
				'label' => __( 'Date Color', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#c7c7c7',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .author-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .drozd-posts-style-18 .col-wrap .meta-info .meta-align .author-date',
			]
		);

		$this->end_controls_tab();





		$this->start_controls_tab(
			'first_colors_hover',
			[
				'label' => __( 'Hover', 'drozd-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'style_tags_hover',
			[
				'label' => __( 'Tags', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_control(
			'tags_color_hover',
			[
				'label' => __( 'Color', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap:hover .meta-info .meta-align .tags a' => 'color: {{VALUE}}',
				],
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_control(
			'tags_background_hover',
			[
				'label' => __( 'Background', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#00b4ff',
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .drozd-posts-style-18 .col-wrap:hover .meta-info .meta-align .tags a' => 'background: {{VALUE}}',
				],
				'condition' => array(
					'show_tags' => 'yes',
				),
			]
		);

		$this->add_control(
			'image_hover_animation',
			[
				'label' => __( 'Hover Animation', 'drozd-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$posts_number        = $this->get_settings( 'posts_number' );
		$display_type        = $this->get_settings( 'display_type' );
		$offset_posts_number = $this->get_settings( 'offset_posts_number' );
		$categories_selected = $this->get_settings( 'categories_selected' );

		$args = array(
			'posts_per_page'      => $posts_number,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		);

		// Display from the category selected
		if ( 'categories' == $display_type ) {
			$args[ 'category__in' ] = $categories_selected;
		}

		// Offset the posts
		if ( ! empty( $offset_posts_number ) ) {
			$args[ 'offset' ] = $offset_posts_number;
		}

		// Hover animation
		$image_animation = '';
		if ( ! empty( $settings['image_hover_animation'] ) ) {
			$image_animation = 'elementor-animation-' . $settings['image_hover_animation'];
		}

		?>
		<div class="drozd-posts-style-18">

			<?php if ( ! empty( $settings['widget_title'] ) ) : ?>
				<div class="title-wrap">
					<h4 class="title"><span class="header"><?php echo $settings['widget_title']; ?></span></h4>
				</div>
			<?php endif; ?>

			<div class="wrapper-posts posts-wrap">
				<?php
				
				global $post;

				$get_posts = get_posts( $args );

				$count = 1;
				foreach( $get_posts as $post ) :
					setup_postdata( $post );

					$image_cropped_size = 'drozd-post-style-18-large';

					$wrapper_loop_class = 'posts-large';
					?>

					<div class="col-wrap <?php echo esc_attr( $wrapper_loop_class .' '. $image_animation ); ?>">
						<?php
						if ( has_post_thumbnail() ) : ?>
							<div class="thumbnail">
								<div class="image-wrap">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( $image_cropped_size ); ?>
									</a>
								</div>
							</div>
						<?php endif; ?>

						<div class="meta-info">
							<div class="meta-align">
								<?php if ( 'yes' === $settings['show_tags'] ) : ?>
									<?php if ( has_tag() ) : ?>
										<div class="tags">
											<?php the_tags( '', ' ' ); ?>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								<div class="title">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
								
								<div class="author-date">
									<span class="author">
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
										<span>-</span>
									</span>
									<span class="date"><?php echo esc_html( the_time( get_option( 'date_format' ) ) ); ?></span>
								</div>

							</div>
						</div>
					</div>

					<?php
					
					$count++;
				endforeach;

				wp_reset_postdata(); // reset variable $post
				
				?>
			</div>
		</div>
		<?php

	}

	protected function _content_template() {}

}