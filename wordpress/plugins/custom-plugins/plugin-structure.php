
<?php

// functions based

defined( 'ABSPATH' ) OR exit;
/**
 * Plugin Name: (WCM) Activate/Deactivate/Uninstall - Functions
 * Description: Example Plugin to show activation/deactivation/uninstall callbacks for plain functions.
 */

function WCM_Setup_Demo_on_activation()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    check_admin_referer( "activate-plugin_{$plugin}" );

    # Uncomment the following line to see the function in action
    # exit( var_dump( $_GET ) );
}

function WCM_Setup_Demo_on_deactivation()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
    check_admin_referer( "deactivate-plugin_{$plugin}" );

    # Uncomment the following line to see the function in action
    # exit( var_dump( $_GET ) );
}

function WCM_Setup_Demo_on_uninstall()
{
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
    check_admin_referer( 'bulk-plugins' );

    // Important: Check if the file is the one
    // that was registered during the uninstall hook.
    if ( __FILE__ != WP_UNINSTALL_PLUGIN )
        return;

    # Uncomment the following line to see the function in action
    # exit( var_dump( $_GET ) );
}

register_activation_hook(   __FILE__, 'WCM_Setup_Demo_on_activation' );
register_deactivation_hook( __FILE__, 'WCM_Setup_Demo_on_deactivation' );
register_uninstall_hook(    __FILE__, 'WCM_Setup_Demo_on_uninstall' );

?>


<?php

// class based

defined( 'ABSPATH' ) OR exit;
/**
 * Plugin Name: (WCM) Activate/Deactivate/Uninstall - CLASS
 * Description: Example Plugin to show activation/deactivation/uninstall callbacks for classes/objects.
 */

register_activation_hook(   __FILE__, array( 'WCM_Setup_Demo_Class', 'on_activation' ) );
register_deactivation_hook( __FILE__, array( 'WCM_Setup_Demo_Class', 'on_deactivation' ) );
register_uninstall_hook(    __FILE__, array( 'WCM_Setup_Demo_Class', 'on_uninstall' ) );

add_action( 'plugins_loaded', array( 'WCM_Setup_Demo_Class', 'init' ) );
class WCM_Setup_Demo_Class
{
    protected static $instance;

    public static function init()
    {
        is_null( self::$instance ) AND self::$instance = new self;
        return self::$instance;
    }

    public static function on_activation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "activate-plugin_{$plugin}" );

        # Uncomment the following line to see the function in action
        # exit( var_dump( $_GET ) );
    }

    public static function on_deactivation()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "deactivate-plugin_{$plugin}" );

        # Uncomment the following line to see the function in action
        # exit( var_dump( $_GET ) );
    }

    public static function on_uninstall()
    {
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
        check_admin_referer( 'bulk-plugins' );

        // Important: Check if the file is the one
        // that was registered during the uninstall hook.
        if ( __FILE__ != WP_UNINSTALL_PLUGIN )
            return;

        # Uncomment the following line to see the function in action
        # exit( var_dump( $_GET ) );
    }

    public function __construct()
    {
        # INIT the plugin: Hook your callbacks
    }
}

?>