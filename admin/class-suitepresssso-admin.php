<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       mailto:joshuaslaven42@gmail.com
 * @since      1.0.0
 *
 * @package    Suitepresssso
 * @subpackage Suitepresssso/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Suitepresssso
 * @subpackage Suitepresssso/admin
 * @author     Joshua Slaven <joshuaslaven42@gmail.com>
 */
class Suitepresssso_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $suitepress_sso_options;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function admin_menu() {
		add_options_page(
			'Suitepress SSO',
			'Suitepress SSO',
			'manage_options',
			'suitepress-sso',
			array( $this, 'spsso_options_page')
		);
	}

	public function spsso_options_page() {
		$this->suitepress_sso_options = get_option( 'suitepress_sso_option_name' );
		?>
			<div class="wrap">
				<h2>Suitepress SSO</h2>
				<p>MemberSuite API settings</p>
				<?php settings_errors(); ?>

				<form method="post" action="options.php">
					<?php
						settings_fields( 'suitepress_sso_option_group' );
						do_settings_sections( 'suitepress-sso-admin' );
						submit_button();
					?>
				</form>
			</div>
		<?php
	}

	public function suitepress_sso_page_init() {
		register_setting(
			'suitepress_sso_option_group', // option_group
			'suitepress_sso_option_name', // option_name
			array( $this, 'suitepress_sso_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'suitepress_sso_setting_section', // id
			'Settings', // title
			array( $this, 'suitepress_sso_section_info' ), // callback
			'suitepress-sso-admin' // page
		);

		add_settings_field(
			'accesskeyid_0', // id
			'AccessKeyId', // title
			array( $this, 'accesskeyid_0_callback' ), // callback
			'suitepress-sso-admin', // page
			'suitepress_sso_setting_section' // section
		);

		add_settings_field(
			'associationid_1', // id
			'AssociationId', // title
			array( $this, 'associationid_1_callback' ), // callback
			'suitepress-sso-admin', // page
			'suitepress_sso_setting_section' // section
		);

		add_settings_field(
			'secretaccesskey_2', // id
			'SecretAccessKey', // title
			array( $this, 'secretaccesskey_2_callback' ), // callback
			'suitepress-sso-admin', // page
			'suitepress_sso_setting_section' // section
		);

		add_settings_field(
			'signingcertificateid_3', // id
			'SigningcertificateId', // title
			array( $this, 'signingcertificateid_3_callback' ), // callback
			'suitepress-sso-admin', // page
			'suitepress_sso_setting_section' // section
		);

		add_settings_field(
			'singingcertificatexml_4', // id
			'Singing Certificate Xml', // title
			array( $this, 'singingcertificatexml_4_callback' ), // callback
			'suitepress-sso-admin', // page
			'suitepress_sso_setting_section' // section
		);

		add_settings_field(
			'portalurl_5', // id
			'PortalUrl', // title
			array( $this, 'portalurl_5_callback' ), // callback
			'suitepress-sso-admin', // page
			'suitepress_sso_setting_section' // section
		);

		add_settings_field(
			'wpusers_6', // id
			'WPUsers', // title
			array( $this, 'wpusers_6_callback' ), // callback
			'suitepress-sso-admin', // page
			'suitepress_sso_setting_section' // section
		);
	}

	public function suitepress_sso_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['accesskeyid_0'] ) ) {
			$sanitary_values['accesskeyid_0'] = sanitize_text_field( $input['accesskeyid_0'] );
		}

		if ( isset( $input['associationid_1'] ) ) {
			$sanitary_values['associationid_1'] = sanitize_text_field( $input['associationid_1'] );
		}

		if ( isset( $input['secretaccesskey_2'] ) ) {
			$sanitary_values['secretaccesskey_2'] = sanitize_text_field( $input['secretaccesskey_2'] );
		}

		if ( isset( $input['signingcertificateid_3'] ) ) {
			$sanitary_values['signingcertificateid_3'] = sanitize_text_field( $input['signingcertificateid_3'] );
		}

		if ( isset( $input['singingcertificatexml_4'] ) ) {
			$sanitary_values['singingcertificatexml_4'] = esc_textarea( $input['singingcertificatexml_4'] );
		}

		if ( isset( $input['portalurl_5'] ) ) {
			$sanitary_values['portalurl_5'] = sanitize_text_field( $input['portalurl_5'] );
		}

		if ( isset( $input['wpusers_6'] ) ) {
			$sanitary_values['wpusers_6'] = sanitize_text_field( $input['wpusers_6'] );
		}

		return $sanitary_values;
	}

	public function suitepress_sso_section_info() {
		
	}

	public function accesskeyid_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="suitepress_sso_option_name[accesskeyid_0]" id="accesskeyid_0" value="%s">',
			isset( $this->suitepress_sso_options['accesskeyid_0'] ) ? esc_attr( $this->suitepress_sso_options['accesskeyid_0']) : ''
		);
	}

	public function associationid_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="suitepress_sso_option_name[associationid_1]" id="associationid_1" value="%s">',
			isset( $this->suitepress_sso_options['associationid_1'] ) ? esc_attr( $this->suitepress_sso_options['associationid_1']) : ''
		);
	}

	public function secretaccesskey_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="suitepress_sso_option_name[secretaccesskey_2]" id="secretaccesskey_2" value="%s">',
			isset( $this->suitepress_sso_options['secretaccesskey_2'] ) ? esc_attr( $this->suitepress_sso_options['secretaccesskey_2']) : ''
		);
	}

	public function signingcertificateid_3_callback() {
		printf(
			'<input class="regular-text" type="text" name="suitepress_sso_option_name[signingcertificateid_3]" id="signingcertificateid_3" value="%s">',
			isset( $this->suitepress_sso_options['signingcertificateid_3'] ) ? esc_attr( $this->suitepress_sso_options['signingcertificateid_3']) : ''
		);
	}

	public function singingcertificatexml_4_callback() {
		printf(
			'<textarea class="large-text" rows="10" name="suitepress_sso_option_name[singingcertificatexml_4]" id="singingcertificatexml_4">%s</textarea>',
			isset( $this->suitepress_sso_options['singingcertificatexml_4'] ) ? $this->suitepress_sso_options['singingcertificatexml_4'] : ''
		);
	}

	public function portalurl_5_callback() {
		printf(
			'<input class="regular-text" type="text" name="suitepress_sso_option_name[portalurl_5]" id="portalurl_5" value="%s">',
			isset( $this->suitepress_sso_options['portalurl_5'] ) ? esc_attr( $this->suitepress_sso_options['portalurl_5']) : ''
		);
	}

	public function wpusers_6_callback() {
		printf(
			'<input class="regular-text" type="checkbox" name="suitepress_sso_option_name[wpusers_6]" id="wpusers_6" %s>' . 
			'<p>If this box is checked, the plugin will not authenticate users with their Member Suite credentials. It WILL ' .
			'create MS portal users at SSO time. This is useful if you want WordPress to be the source of authority for user accounts.</p>' .
			'<p>NOTE: Email address is assumed to be unique to correctly match wordpress accounts and MS portal accounts. If an email address is not found a new account will be created.</p>',
			isset( $this->suitepress_sso_options['wpusers_6'] ) ? 'checked' : ''
		);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Suitepresssso_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Suitepresssso_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/suitepresssso-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Suitepresssso_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Suitepresssso_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/suitepresssso-admin.js', array( 'jquery' ), $this->version, false );

	}

}

/* 
 * Retrieve this value with:
 * $suitepress_sso_options = get_option( 'suitepress_sso_option_name' ); // Array of All Options
 * $accesskeyid_0 = $suitepress_sso_options['accesskeyid_0']; // AccessKeyId
 * $associationid_1 = $suitepress_sso_options['associationid_1']; // AssociationId
 * $secretaccesskey_2 = $suitepress_sso_options['secretaccesskey_2']; // SecretAccessKey
 * $signingcertificateid_3 = $suitepress_sso_options['signingcertificateid_3']; // SigningcertificateId
 * $singingcertificatexml_4 = $suitepress_sso_options['singingcertificatexml_4']; // singingcertificatexml
 * $portalurl_5 = $suitepress_sso_options['portalurl_5']; // PortalUrl
 * $wpusers_6 = $suitepress_sso_options['portalurl_5']; // WPUsers
 */