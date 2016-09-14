<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       mailto:joshuaslaven42@gmail.com
 * @since      1.0.0
 *
 * @package    Suitepresssso
 * @subpackage Suitepresssso/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Suitepresssso
 * @subpackage Suitepresssso/public
 * @author     Joshua Slaven <joshuaslaven42@gmail.com>
 */
class Suitepresssso_Public {

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

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	// flush_rules() if our rules are not yet included
	public function my_flush_rules(){
		$rules = get_option( 'rewrite_rules' );

		if ( ! isset( $rules['mssso/login$'] ) ) {
			global $wp_rewrite;
		   	$wp_rewrite->flush_rules();
		}
	}

	public function ms_login_query_vars($vars) {
	    $vars[] = 'mssso';
	    return $vars;
	}

	public function ms_login($wp)
	{
		// only process requests with "my-plugin=ajax-handler"
	    if (array_key_exists('mssso', $wp->query_vars) && $wp->query_vars['mssso'] == 'login') {

	    	// Verrify credentials
			$api = new MemberSuite();

			if(is_null($api))
				return $user;

	 		$helper = new ConciergeApiHelper();
	 		$api->accesskeyId = Userconfig::read('AccessKeyId');
		    $api->associationId = Userconfig::read('AssociationId');
		    $api->secretaccessId = Userconfig::read('SecretAccessKey');
		    $api->portalusername = $username;
		    $api->signingcertificateId = Userconfig::read('SigningcertificateId');
		    $rsaXML = html_entity_decode(Userconfig::read('SigningcertificateXml'));

		    $current_user = wp_get_current_user();

		    // Use helper class to generate signature		    
		    $api->digitalsignature = $helper->DigitalSignature($current_user->user_login, $rsaXML);

	    	// Create Token for sso
		    $response = $api->CreatePortalSecurityToken($current_user->user_login, $api->signingcertificateId, $api->digitalsignature);
		    
		    if($response->aSuccess=='false')
		    {
		      return $response->aErrors->bConciergeError->bMessage;
		    }
		    
		    $securityToken = $response->aResultValue;

		    ?>
				<form name="LoginForm" method="post" id="LoginForm" action="<?php echo Userconfig::read('PortalUrl');?>Login.aspx">
				    <input type="text" name="Token" id="Token" value="<?php echo $securityToken;?>" />
				        
					<!--Once logged into Membersuite, jump to this URL-->
					<input type="text" name="NextUrl" id="NextUrl" value="directory/SearchDirectory_Criteria.aspx" />

					<!--In the MemberSuite Portal header, provide a return link to a custom URL-->
				    <input type="text" name="ReturnUrl" id="ReturnUrl" value="default.aspx" />
					<input type="text" name="ReturnText" id="ReturnText" />
					
					<!--On logout from the MemberSuite Portal, redirect to this URL rather than the default login page-->
					<input type="text" name="LogoutUrl" id="LogoutUrl" />
				</form>
		    <?php

			wp_die('', 'Portal Redirect');
	    }
	}

	public function kill_sidebar($sidebar_output) {
		return '<h1>Sidebar</h1>';
	}

	public function mssso_loginform($content) {


	}

	public function authenticate($user, $username, $password) {
		// Make sure a username and password are present for us to work with
    	if($username == '' || $password == '') return;

		// Verrify credentials
		$api = new MemberSuite();

		if(is_null($api))
			return $user;

 		$helper = new ConciergeApiHelper();
 		$api->accesskeyId = Userconfig::read('AccessKeyId');
	    $api->associationId = Userconfig::read('AssociationId');
	    $api->secretaccessId = Userconfig::read('SecretAccessKey');
	    $api->portalusername = $username;
	    $api->portalPassword = $password;
	    $api->signingcertificateId = Userconfig::read('SigningcertificateId');
	    $rsaXML = mb_convert_encoding(Userconfig::read('SigningcertificateXml'), 'UTF-8' , 'UTF-16LE');

	    $user = new WP_Error( 'denied', __("ERROR: User/pass bad mkay") );

	    // Varify username and password
        $response = $api->LoginToPortal($api->portalusername,$api->portalPassword);
	
		if($response->aSuccess == 'false'){
            $loginarr = $response->aErrors->bConciergeError->bMessage;
            $user = new WP_Error( 'denied', __($loginarr) );
        }
        else {
        	// Good login, verrify WP side.
			$msUser = new msUser($response->aResultValue->aPortalEntity);

			// External user exists, try to load the user info from the WordPress user table
	        $userobj = new WP_User();
	        $user = $userobj->get_data_by( 'email', $msUser->EmailAddress ); // Does not return a WP_User object 🙁
	        $user = new WP_User($user->ID); // Attempt to load up the user with that ID

	        if( $user->ID == 0 ) {
	            // The user does not currently exist in the WordPress user table.
	            // You have arrived at a fork in the road, choose your destiny wisely

	            // If you do not want to add new users to WordPress if they do not
	            // already exist uncomment the following line and remove the user creation code
	            //$user = new WP_Error( 'denied', __("ERROR: Not a valid user for this system") );

	            // Setup the minimum required user information for this example
	            $userdata = array( 'user_email' => $msUser->EmailAddress,
	                                'user_login' => $username,
	                                'first_name' => $msUser->FirstName,
	                                'last_name' => $msUser->LastName
	                                );
	            $new_user_id = wp_insert_user( $userdata ); // A new user has been created

	             // Load the new user info
	            $user = new WP_User ($new_user_id);
	        }
        }

        //remove_action('authenticate', 'wp_authenticate_username_password', 20);

		return $user;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/suitepresssso-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/suitepresssso-public.js', array( 'jquery' ), $this->version, false );

	}

}
