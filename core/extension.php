<?php
/**
 * Torro_Forms_Bootstrap_Markup class
 *
 * @package TFBS3
 * @author Felix Arntz <felix-arntz@leaves-and-love.net>
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Torro_Forms_Bootstrap_Markup extends Torro_Extension {
	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Initializing.
	 *
	 * @since 1.0.0
	 */
	protected function __construct() {
		parent::__construct();
	}

	protected function init() {
		$this->title = 'Torro Forms Bootstrap Markup';

		$this->name = 'torro_forms_bootstrap_markup';

		$this->item_name = 'Torro Forms Bootstrap Markup';

		$this->plugin_file = dirname( dirname( __FILE__ ) ) . '/torro-forms-bootstrap-markup.php';

		$this->version = '1.0.0';

		add_filter( 'torro_template_locations', array( $this, 'register_template_location' ) );
		add_filter( 'torro_form_classes', array( $this, 'add_bootstrap_form_classes' ), 10, 2 );
		add_filter( 'torro_element_classes', array( $this, 'add_bootstrap_element_classes' ), 10, 2 );
		add_filter( 'torro_input_classes', array( $this, 'add_bootstrap_input_classes' ), 10, 2 );
		add_action( 'wp_loaded', array( $this, 'disable_torro_forms_frontend_css' ) );
		add_action( 'torro_formbuilder_options', array( $this, 'print_form_horizontal_field' ), 100 );
		add_action( 'torro_formbuilder_save', array( $this, 'save_form_horizontal_meta' ), 10, 1 );
	}

	public function disable_torro_forms_frontend_css() {
		remove_action( 'wp_enqueue_scripts', array( 'Torro_Init', 'enqueue_frontend_styles' ) );
	}

	public function register_template_location( $locations ) {
		$locations[90] = $this->get_path( 'templates/' );

		return $locations;
	}

	public function add_bootstrap_form_classes( $classes, $form ) {
		if ( $this->is_form_horizontal( $form->id ) ) {
			$classes[] = 'form-horizontal';
		}

		return $classes;
	}

	public function add_bootstrap_element_classes( $classes, $element ) {
		$classes[] = 'form-group';

		$key = array_search( 'error', $classes, true );
		if ( false !== $key ) {
			$classes[ $key ] = 'has-error';
		} elseif ( ! is_null( $element->response ) ) {
			$classes[] = 'has-success';
		}

		return $classes;
	}

	public function add_bootstrap_input_classes( $classes, $element_type ) {
		if ( ! in_array( $element_type->name, array( 'onechoice', 'multiplechoice' ) ) ) {
			$classes[] = 'form-control';
		}

		return $classes;
	}

	public function is_form_horizontal( $form_id = null ) {
		if ( ! $form_id ) {
			$post = get_post();
			if ( 'torro_form' !== $post->post_type ) {
				return false;
			}
			$form_id = $post->ID;
		}

		return (bool) get_post_meta( $form_id, 'tfbs3_is_form_horizontal', true );
	}

	public function is_group_inline() {
		if ( ! defined( 'TFBS3_INLINE_GROUPS' ) ) {
			return false;
		}

		return TFBS3_INLINE_GROUPS;
	}

	public function print_form_horizontal_field() {
		?>
		<h4><?php _e( 'Bootstrap Settings', 'torro-forms-bootstrap-markup' ); ?></h4>
		<div class="flex-options" role="group">
			<label for="tfbs3_is_form_horizontal"><?php _e( 'Form Layout', 'torro-forms-bootstrap-markup' ); ?></label>
			<div>
				<input type="checkbox" id="tfbs3_is_form_horizontal" name="tfbs3_is_form_horizontal" value="1" aria-describedby="tfbs3_is_form_horizontal_desc" <?php checked( true, $this->is_form_horizontal() ); ?> />
				<div id="tfbs3_is_form_horizontal_desc"><?php _e( 'Render this as a horizontal form in the frontend?', 'torro-forms-bootstrap-markup' ); ?></div>
			</div>
		</div>
		<?php
	}

	public function save_form_horizontal_meta( $form_id ) {
		if ( isset( $_POST['tfbs3_is_form_horizontal'] ) && $_POST['tfbs3_is_form_horizontal'] ) {
			update_post_meta( $form_id, 'tfbs3_is_form_horizontal', '1' );
		} else {
			delete_post_meta( $form_id, 'tfbs3_is_form_horizontal' );
		}
	}
}

torro()->extensions()->register( 'Torro_Forms_Bootstrap_Markup' );
