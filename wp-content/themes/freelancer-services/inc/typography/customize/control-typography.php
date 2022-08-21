<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Freelancer_Services_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'freelancer-services-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'freelancer-services' ),
				'family'      => esc_html__( 'Font Family', 'freelancer-services' ),
				'size'        => esc_html__( 'Font Size',   'freelancer-services' ),
				'weight'      => esc_html__( 'Font Weight', 'freelancer-services' ),
				'style'       => esc_html__( 'Font Style',  'freelancer-services' ),
				'line_height' => esc_html__( 'Line Height', 'freelancer-services' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'freelancer-services' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'freelancer-services-ctypo-customize-controls' );
		wp_enqueue_style(  'freelancer-services-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'freelancer-services' ),
        'Abril Fatface' => __( 'Abril Fatface', 'freelancer-services' ),
        'Acme' => __( 'Acme', 'freelancer-services' ),
        'Anton' => __( 'Anton', 'freelancer-services' ),
        'Architects Daughter' => __( 'Architects Daughter', 'freelancer-services' ),
        'Arimo' => __( 'Arimo', 'freelancer-services' ),
        'Arsenal' => __( 'Arsenal', 'freelancer-services' ),
        'Arvo' => __( 'Arvo', 'freelancer-services' ),
        'Alegreya' => __( 'Alegreya', 'freelancer-services' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'freelancer-services' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'freelancer-services' ),
        'Bangers' => __( 'Bangers', 'freelancer-services' ),
        'Boogaloo' => __( 'Boogaloo', 'freelancer-services' ),
        'Bad Script' => __( 'Bad Script', 'freelancer-services' ),
        'Bitter' => __( 'Bitter', 'freelancer-services' ),
        'Bree Serif' => __( 'Bree Serif', 'freelancer-services' ),
        'BenchNine' => __( 'BenchNine', 'freelancer-services' ),
        'Cabin' => __( 'Cabin', 'freelancer-services' ),
        'Cardo' => __( 'Cardo', 'freelancer-services' ),
        'Courgette' => __( 'Courgette', 'freelancer-services' ),
        'Cherry Swash' => __( 'Cherry Swash', 'freelancer-services' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'freelancer-services' ),
        'Crimson Text' => __( 'Crimson Text', 'freelancer-services' ),
        'Cuprum' => __( 'Cuprum', 'freelancer-services' ),
        'Cookie' => __( 'Cookie', 'freelancer-services' ),
        'Chewy' => __( 'Chewy', 'freelancer-services' ),
        'Days One' => __( 'Days One', 'freelancer-services' ),
        'Dosis' => __( 'Dosis', 'freelancer-services' ),
        'Droid Sans' => __( 'Droid Sans', 'freelancer-services' ),
        'Economica' => __( 'Economica', 'freelancer-services' ),
        'Fredoka One' => __( 'Fredoka One', 'freelancer-services' ),
        'Fjalla One' => __( 'Fjalla One', 'freelancer-services' ),
        'Francois One' => __( 'Francois One', 'freelancer-services' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'freelancer-services' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'freelancer-services' ),
        'Great Vibes' => __( 'Great Vibes', 'freelancer-services' ),
        'Handlee' => __( 'Handlee', 'freelancer-services' ),
        'Hammersmith One' => __( 'Hammersmith One', 'freelancer-services' ),
        'Inconsolata' => __( 'Inconsolata', 'freelancer-services' ),
        'Indie Flower' => __( 'Indie Flower', 'freelancer-services' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'freelancer-services' ),
        'Julius Sans One' => __( 'Julius Sans One', 'freelancer-services' ),
        'Josefin Slab' => __( 'Josefin Slab', 'freelancer-services' ),
        'Josefin Sans' => __( 'Josefin Sans', 'freelancer-services' ),
        'Kanit' => __( 'Kanit', 'freelancer-services' ),
        'Lobster' => __( 'Lobster', 'freelancer-services' ),
        'Lato' => __( 'Lato', 'freelancer-services' ),
        'Lora' => __( 'Lora', 'freelancer-services' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'freelancer-services' ),
        'Lobster Two' => __( 'Lobster Two', 'freelancer-services' ),
        'Merriweather' => __( 'Merriweather', 'freelancer-services' ),
        'Monda' => __( 'Monda', 'freelancer-services' ),
        'Montserrat' => __( 'Montserrat', 'freelancer-services' ),
        'Muli' => __( 'Muli', 'freelancer-services' ),
        'Marck Script' => __( 'Marck Script', 'freelancer-services' ),
        'Noto Serif' => __( 'Noto Serif', 'freelancer-services' ),
        'Open Sans' => __( 'Open Sans', 'freelancer-services' ),
        'Overpass' => __( 'Overpass', 'freelancer-services' ),
        'Overpass Mono' => __( 'Overpass Mono', 'freelancer-services' ),
        'Oxygen' => __( 'Oxygen', 'freelancer-services' ),
        'Orbitron' => __( 'Orbitron', 'freelancer-services' ),
        'Patua One' => __( 'Patua One', 'freelancer-services' ),
        'Pacifico' => __( 'Pacifico', 'freelancer-services' ),
        'Padauk' => __( 'Padauk', 'freelancer-services' ),
        'Playball' => __( 'Playball', 'freelancer-services' ),
        'Playfair Display' => __( 'Playfair Display', 'freelancer-services' ),
        'PT Sans' => __( 'PT Sans', 'freelancer-services' ),
        'Philosopher' => __( 'Philosopher', 'freelancer-services' ),
        'Permanent Marker' => __( 'Permanent Marker', 'freelancer-services' ),
        'Poiret One' => __( 'Poiret One', 'freelancer-services' ),
        'Quicksand' => __( 'Quicksand', 'freelancer-services' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'freelancer-services' ),
        'Raleway' => __( 'Raleway', 'freelancer-services' ),
        'Rubik' => __( 'Rubik', 'freelancer-services' ),
        'Rokkitt' => __( 'Rokkitt', 'freelancer-services' ),
        'Russo One' => __( 'Russo One', 'freelancer-services' ),
        'Righteous' => __( 'Righteous', 'freelancer-services' ),
        'Slabo' => __( 'Slabo', 'freelancer-services' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'freelancer-services' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'freelancer-services'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'freelancer-services' ),
        'Sacramento' => __( 'Sacramento', 'freelancer-services' ),
        'Shrikhand' => __( 'Shrikhand', 'freelancer-services' ),
        'Tangerine' => __( 'Tangerine', 'freelancer-services' ),
        'Ubuntu' => __( 'Ubuntu', 'freelancer-services' ),
        'VT323' => __( 'VT323', 'freelancer-services' ),
        'Varela Round' => __( 'Varela Round', 'freelancer-services' ),
        'Vampiro One' => __( 'Vampiro One', 'freelancer-services' ),
        'Vollkorn' => __( 'Vollkorn', 'freelancer-services' ),
        'Volkhov' => __( 'Volkhov', 'freelancer-services' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'freelancer-services' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'freelancer-services' ),
			'100' => esc_html__( 'Thin',       'freelancer-services' ),
			'300' => esc_html__( 'Light',      'freelancer-services' ),
			'400' => esc_html__( 'Normal',     'freelancer-services' ),
			'500' => esc_html__( 'Medium',     'freelancer-services' ),
			'700' => esc_html__( 'Bold',       'freelancer-services' ),
			'900' => esc_html__( 'Ultra Bold', 'freelancer-services' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'freelancer-services' ),
			'normal'  => esc_html__( 'Normal', 'freelancer-services' ),
			'italic'  => esc_html__( 'Italic', 'freelancer-services' ),
			'oblique' => esc_html__( 'Oblique', 'freelancer-services' )
		);
	}
}
