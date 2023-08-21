<?php 
/**
 * Options Page
 */

class ThemeOptions {
	private $theme_options_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'theme_options_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'theme_options_page_init' ) );
	}

	public function theme_options_add_plugin_page() {
		add_menu_page(
			'Theme Options', // page_title
			'Theme Options', // menu_title
			'manage_options', // capability
			'theme-options', // menu_slug
			array( $this, 'theme_options_create_admin_page' ), // function
			'dashicons-admin-generic', // icon_url
			2 // position
		);
	}

	public function theme_options_create_admin_page() {
		$this->theme_options_options = get_option( 'theme_options_option_name' ); ?>

		<div class="wrap">
			<h2>Theme Options</h2>
			<p></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'theme_options_option_group' );
					do_settings_sections( 'theme-options-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function theme_options_page_init() {
		register_setting(
			'theme_options_option_group', // option_group
			'theme_options_option_name', // option_name
			array( $this, 'theme_options_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'theme_options_setting_section', // id
			'Settings', // title
			array( $this, 'theme_options_section_info' ), // callback
			'theme-options-admin' // page'phone_number
		);

		add_settings_field(
			'location', // id
			'Location', // title
			array( $this, 'location_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'phone_number', // id
			'Phone number', // title
			array( $this, 'phone_number_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'email_address', // id
			'Email address', // title
			array( $this, 'email_address_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'facebook_link', // id
			'Facebook Link', // title
			array( $this, 'facebook_link_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'twitter_link', // id
			'Twitter Link', // title
			array( $this, 'twitter_link_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'linkedin_link', // id
			'LinkedIn Link ', // title
			array( $this, 'linkedin_link_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'instagram_link', // id
			'Instagram Link', // title
			array( $this, 'instagram_link_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'company_info', // id
			'Company Info', // title
			array( $this, 'company_info_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'services_info', // id
			'Services Info', // title
			array( $this, 'services_info_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'useful_links_heading', // id
			'Useful Links heading', // title
			array( $this, 'useful_links_heading_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'company_heading', // id
			'Company heading', // title
			array( $this, 'company_heading_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'services_heading', // id
			'Services heading', // title
			array( $this, 'services_heading_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'location_heading', // id
			'Location heading', // title
			array( $this, 'location_heading_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);

		add_settings_field(
			'copyright_text', // id
			'Copyright text', // title
			array( $this, 'copyright_text_callback' ), // callback
			'theme-options-admin', // page
			'theme_options_setting_section' // section
		);
	}

	public function theme_options_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['location'] ) ) {
			$sanitary_values['location'] = sanitize_text_field( $input['location'] );
		}

		if ( isset( $input['phone_number'] ) ) {
			$sanitary_values['phone_number'] = sanitize_text_field( $input['phone_number'] );
		}

		if ( isset( $input['email_address'] ) ) {
			$sanitary_values['email_address'] = sanitize_text_field( $input['email_address'] );
		}

		if ( isset( $input['facebook_link'] ) ) {
			$sanitary_values['facebook_link'] = sanitize_text_field( $input['facebook_link'] );
		}

		if ( isset( $input['twitter_link'] ) ) {
			$sanitary_values['twitter_link'] = sanitize_text_field( $input['twitter_link'] );
		}

		if ( isset( $input['linkedin_link'] ) ) {
			$sanitary_values['linkedin_link'] = sanitize_text_field( $input['linkedin_link'] );
		}

		if ( isset( $input['instagram_link'] ) ) {
			$sanitary_values['instagram_link'] = sanitize_text_field( $input['instagram_link'] );
		}

		if ( isset( $input['company_info'] ) ) {
			$sanitary_values['company_info'] = esc_textarea( $input['company_info'] );
		}

		if ( isset( $input['services_info'] ) ) {
			$sanitary_values['services_info'] = esc_textarea( $input['services_info'] );
		}

		if ( isset( $input['useful_links_heading'] ) ) {
			$sanitary_values['useful_links_heading'] = sanitize_text_field( $input['useful_links_heading'] );
		}

		if ( isset( $input['company_heading'] ) ) {
			$sanitary_values['company_heading'] = sanitize_text_field( $input['company_heading'] );
		}

		if ( isset( $input['services_heading'] ) ) {
			$sanitary_values['services_heading'] = sanitize_text_field( $input['services_heading'] );
		}

		if ( isset( $input['location_heading'] ) ) {
			$sanitary_values['location_heading'] = sanitize_text_field( $input['location_heading'] );
		}

		if ( isset( $input['copyright_text'] ) ) {
			$sanitary_values['copyright_text'] = esc_textarea( $input['copyright_text'] );
		}

		return $sanitary_values;
	}

	public function theme_options_section_info() {
		
	}

	public function location_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[location]" id="location" value="%s">',
			isset( $this->theme_options_options['location'] ) ? esc_attr( $this->theme_options_options['location']) : ''
		);
	}

	public function phone_number_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[phone_number]" id="phone_number" value="%s">',
			isset( $this->theme_options_options['phone_number'] ) ? esc_attr( $this->theme_options_options['phone_number']) : ''
		);
	}

	public function email_address_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[email_address]" id="email_address" value="%s">',
			isset( $this->theme_options_options['email_address'] ) ? esc_attr( $this->theme_options_options['email_address']) : ''
		);
	}

	public function facebook_link_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[facebook_link]" id="facebook_link" value="%s">',
			isset( $this->theme_options_options['facebook_link'] ) ? esc_attr( $this->theme_options_options['facebook_link']) : ''
		);
	}

	public function twitter_link_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[twitter_link]" id="twitter_link" value="%s">',
			isset( $this->theme_options_options['twitter_link'] ) ? esc_attr( $this->theme_options_options['twitter_link']) : ''
		);
	}

	public function linkedin_link_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[linkedin_link]" id="linkedin_link" value="%s">',
			isset( $this->theme_options_options['linkedin_link'] ) ? esc_attr( $this->theme_options_options['linkedin_link']) : ''
		);
	}

	public function instagram_link_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[instagram_link]" id="instagram_link" value="%s">',
			isset( $this->theme_options_options['instagram_link'] ) ? esc_attr( $this->theme_options_options['instagram_link']) : ''
		);
	}

	public function company_info_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="theme_options_option_name[company_info]" id="company_info">%s</textarea>',
			isset( $this->theme_options_options['company_info'] ) ? esc_attr( $this->theme_options_options['company_info']) : ''
		);
	}

	public function services_info_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="theme_options_option_name[services_info]" id="services_info">%s</textarea>',
			isset( $this->theme_options_options['services_info'] ) ? esc_attr( $this->theme_options_options['services_info']) : ''
		);
	}

	public function useful_links_heading_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[useful_links_heading]" id="useful_links_heading" value="%s">',
			isset( $this->theme_options_options['useful_links_heading'] ) ? esc_attr( $this->theme_options_options['useful_links_heading']) : ''
		);
	}

	public function company_heading_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[company_heading]" id="company_heading" value="%s">',
			isset( $this->theme_options_options['company_heading'] ) ? esc_attr( $this->theme_options_options['company_heading']) : ''
		);
	}

	public function services_heading_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[services_heading]" id="services_heading" value="%s">',
			isset( $this->theme_options_options['services_heading'] ) ? esc_attr( $this->theme_options_options['services_heading']) : ''
		);
	}

	public function location_heading_callback() {
		printf(
			'<input class="regular-text" type="text" name="theme_options_option_name[location_heading]" id="location_heading" value="%s">',
			isset( $this->theme_options_options['location_heading'] ) ? esc_attr( $this->theme_options_options['location_heading']) : ''
		);
	}

	public function copyright_text_callback() {
		printf(
			'<textarea class="large-text" rows="5" name="theme_options_option_name[copyright_text]" id="copyright_text">%s</textarea>',
			isset( $this->theme_options_options['copyright_text'] ) ? esc_attr( $this->theme_options_options['copyright_text']) : ''
		);
	}

}
if ( is_admin() )
	$theme_options = new ThemeOptions();