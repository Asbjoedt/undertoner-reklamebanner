<?php

/**
 * Plugin Name: Undertoner reklamebanner
 * Plugin URI: https://youtu.be/boIKuEl6l0Y
 * Description: Tilføjer funktion til opsætning af reklamebanner under "Indstillinger".
 * Author: Asbjørn Skødt
 **/
 
// Laver menu i backend
add_action( 'admin_menu', 'undertoner_reklamebanner_menu' );

function undertoner_reklamebanner_menu(){
  $page_title = 'Undertoner reklamebanner';
  $menu_title = 'Undertoner reklamebanner';
  $capability = 'manage_options';
  $menu_slug  = 'undertoner-reklamebanner';
  $function   = 'undertoner_reklamebanner_backendside';
  $position   = 4;

  add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $menu_slug, $function, $position );
  
  add_action( 'admin_init', 'undertoner_reklamebanner_opdater_indstillinger' );
}

// Laver inputfelter til indstillinger i backend
function undertoner_reklamebanner_backendside(){
?>  
  <h1>Konfigurer reklamebanner</h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'undertoner_reklamebanner_indstillinger' ); ?>
    <?php do_settings_sections( 'undertoner_reklamebanner_indstillinger' ); ?>
    
	<table class="form-table">
	<tr valign="top">
	<th scope="row">Angiv URL til destination:</th>
	<td>
	<input type="text" name="undertoner_reklamebanner_hjemmeside" value="<?php echo get_option( 'undertoner_reklamebanner_hjemmeside' ); ?>"/>
	</td>
	</tr>
	<tr valign="top">
	<th scope="row">Angiv URL til billede:</th>
	<td>
	<input type="text" name="undertoner_reklamebanner_reklamebillede" value="<?php echo get_option( 'undertoner_reklamebanner_reklamebillede' ); ?>"/>
	</td>
   	</tr>
	<tr valign="top">
	<th scope="row">Reklamebanner synlig</th>
	<td>
	<input name="undertoner_reklamebanner_boolean" type="checkbox" value="1" <?php checked( '1', get_option( 'undertoner_reklamebanner_boolean' ) ); ?> />
	</td>
    </tr>
    </table>
	
    <?php submit_button(); ?>
  </form>
<?php
}

function undertoner_reklamebanner_opdater_indstillinger() {
  register_setting( 'undertoner_reklamebanner_indstillinger', 'undertoner_reklamebanner_hjemmeside' );
  register_setting( 'undertoner_reklamebanner_indstillinger', 'undertoner_reklamebanner_reklamebillede' );
  register_setting( 'undertoner_reklamebanner_indstillinger', 'undertoner_reklamebanner_boolean' );
}

// Viser reklamebanner i header
function vis_undertoner_reklamebanner() {
    if ( get_option( 'undertoner_reklamebanner_boolean' ) === '1' ) {
        echo '<div class="reklamebanner">
                <a href="' . get_option( 'undertoner_reklamebanner_hjemmeside' ). '" target="_blank">
                    <img src="' . get_option( 'undertoner_reklamebanner_reklamebillede' ). '" />
                </a>
            </div>';
    }
}

// Forbinder plugin CSS-fil til Undertoners design
function undertoner_reklamebanner_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_enqueue_style( 'undertoner_reklamebanner_style', $plugin_url . '/undertoner-reklamebanner.css' );
}
add_action( 'wp_enqueue_scripts', 'undertoner_reklamebanner_css' );

?>
