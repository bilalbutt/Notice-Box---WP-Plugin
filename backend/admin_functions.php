<?php
class JP_Admin_Functions {

	function __construct() {
		add_action( 'wp_enqueue_scripts', array($this, 'front_enqueue_styles') );
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue_styles') );
		add_action( 'admin_menu', array($this, 'nb_admin_menu_option') );
		add_shortcode('notice_box', array($this, 'notice_box') );
	}

	function enqueue_styles() {
		global $pagenow;
		if ( $pagenow == "admin.php" ){
			if ( $_GET['page'] == "nb_admin_menu_option" ){
				wp_enqueue_style( 'plugin-admin-css', NB_PLUGIN . 'assests/css/admin-css.css', array(), 1.0, 'all' );
				wp_enqueue_style( 'front-end-css', NB_PLUGIN . 'assests/css/front-css.css', array(), 1.0, 'all' );
				wp_enqueue_script( 'jquery_script', NB_PLUGIN . 'assests/js/jquery.min.js', array('jquery'), '', false);
				wp_enqueue_script( 'frontend_script', NB_PLUGIN . 'assests/js/front.js', array( 'jquery_script' ), 1.0, true);
			}
		}
	}

	function front_enqueue_styles(){
		wp_enqueue_style( 'front-end-css', NB_PLUGIN . 'assests/css/front-css.css', array(), 1.0, 'all' );
		wp_enqueue_script( 'jquery_script', NB_PLUGIN . 'assests/js/jquery.min.js', array('jquery'), '', false);
		wp_enqueue_script( 'frontend_script', NB_PLUGIN . 'assests/js/front.js', array( 'jquery_script' ), 1.0, true);
	}

	function nb_admin_menu_option(){
		add_menu_page( NB_NAME , NB_NAME , 'manage_options', 'nb_admin_menu_option',array($this, 'gb_gwd_page_setting'),'dashicons-feedback',200);
	}

	function gb_gwd_page_setting(){
		global $pagenow;
		/* Page HTML */ ?>
		<div class="row">
			<h2><?php echo NB_NAME; ?> - Settings</h2>
			<ul class="info_list">
				<li><p class="info">To show Notice Box use the following shortcode on any page.<span class="shortcode">[notice_box]</span></p></li>
				<li><p class="info">Following attributes can be used with short code:</p>
					<ul class="info_list">
						<li><p class="info">Heading - Heading to be used for Notice Box.</p></li>
						<li><p class="info">Message - Message to be shown in Notice Box.</p></li>

						<li><p class="info">Same Line - Show heading and message on same line. Folloing "Same Line" attibutes can be used for Notice Box (this attribute is not case sensitive). By default it is set to "0".</p>
							<ul class="info_list">
								<li><p class="info"><span class="shortcode">1</span></p></li>
								<li><p class="info"><span class="shortcode">0</span></p></li>
							</ul>
						</li>
						
						<li><p class="info">Box Type - What type of Notice Box to be used. Folloing "Box Type" attibutes can be used for Notice Box (this attribute is not case sensitive). You can add custom css for showing your custom color.</p>
							<ul class="info_list">
								<li><p class="info"><span class="shortcode">Danger</span></p></li>
								<li><p class="info"><span class="shortcode">Success</span></p></li>
								<li><p class="info"><span class="shortcode">Info</span></p></li>
								<li><p class="info"><span class="shortcode">Warning</span></p></li>
							</ul>
						</li>

						<li><p class="info">Close Button - Show/Hide Close Button. Folloing "Close Button" attibutes can be used for Notice Box (this attribute is not case sensitive). By default it is set to "Show"</p>
							<ul class="info_list">
								<li><p class="info"><span class="shortcode">Show</span></p></li>
								<li><p class="info"><span class="shortcode">Hide</span></p></li>
							</ul>
						</li>

					</ul>
				</li>
				<li><p class="info">Short Code</p></li>
				<li><p class="info">
					[notice_box heading="Notice Box Heading!" message="Notice Box Message." box_type="Danger" close_btn="hide" same_line="0"]
				</p></li>
			</ul>

			<?php
			
				echo do_shortcode( '[notice_box heading="This is a Notice Box Heading!" message="Hello! This Notice Box has all Box Type background shown, with close button shown, heading and message on separate line." box_type="all_bgs" close_btn="show" same_line="1"]' );

				echo do_shortcode( '[notice_box heading="This is a Notice Box Heading!" message="Hello! This Notice Box has all Box Type background shown, with close button shown, heading and message on same line." box_type="all_bgs" close_btn="show" same_line="0"]' );		

				echo do_shortcode( '[notice_box heading="This is a Notice Box Heading!" message="Hello! This Notice Box has all Box Type background shown, with close button hidden, heading and message on same line." box_type="all_bgs" close_btn="hide" same_line="0"]' );

				echo do_shortcode( '[notice_box heading="This is a Notice Box Heading!" message="Hello! This Notice Box has all Box Type background shown, with close button hidden, heading and message on separate line." box_type="all_bgs" close_btn="hide" same_line="1"]' );

			?>

		</div>
		<?php
	}

	// Add Shortcode
	function notice_box( $atts ) {
		// Attributes
		$atts = shortcode_atts(
			array(
				'heading' => 'Heading',
				'message' => 'Message',
				'same_line' => 0,
				'box_type' => 'info',
				'close_btn' => "show",
			),
			$atts
		);

		$box_heading = $atts['heading'];
		$msg = $atts['message'];
		$css_class = strtolower($atts['box_type']);
		$same_line = strtolower($atts['same_line']);
		$close_btn = strtolower($atts['close_btn']);

		$NoticeBox = '';
		$NoticeBox = '<div class="notice_box ' . $css_class . '">';
		
		$NoticeBox .= '<b>' . $box_heading . '</b>';
		
		if( $same_line != 0 ){
			$NoticeBox .= '<br />';
		}
		$NoticeBox .= ' <p>' . $msg . '</p>';

		if ( $close_btn == "show" ){
			$NoticeBox .= '<span class="close_cross">x</span>';
		}

		$NoticeBox .= '</div>';
		return $NoticeBox;
	}
}

if ( class_exists( 'JP_Admin_Functions' ) ) {
    $JP_Admin_Functions = new JP_Admin_Functions();
}
?>
