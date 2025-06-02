<?php
/**
 * page d'administration option du thème
 *
 * @package WordPress
 * @subpackage theme
 * @since theme 1.0
 * @author : sissi
 */

global $theme_options_settings, $theme_options;

if ( ! isset( $_REQUEST['settings-updated'] ) )
  $_REQUEST['settings-updated'] = false;

?>
<div class="theme-themes">
  <form method="post" action="options.php" id="form-option" class="theme_option_ft">
    <div class="theme-header">
      <div class="logo">
        <img src="<?php echo get_template_directory_uri();?>/theme-options/images/logo.png" alt="theme theme options" />
        <h1>theme theme options</h1>
      </div>
      <div class="header-right">
        <h1> <?php _e( 'Theme Options', 'theme' ) ?> </h1>
        <div class='btn-save'>
          <input type='submit' class='button-primary' value='<?php _e('Enregistrer','theme') ?>' />
        </div>
      </div>
    </div>

    <div class="theme-details">
      <div class="theme-options">

        <div class="right-box">
          <div class="nav-tab-wrapper">
            <ul>
              <?php foreach ( $theme_options_settings as $tab => $fields ) :?>
              <li><a id="options-group-<?php echo sanitize_title($tab); ?>-tab" class="nav-tab" title="<?php echo $tab; ?>" href="#options-group-<?php echo sanitize_title($tab); ?>"><?php echo $tab; ?></a></li>
              <?php endforeach;?>
            </ul>
          </div>
        </div>
        <div class="right-box-bg"></div>

        <div class="postbox left-box">
          <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
          <?php settings_fields( 'theme_options' );?>

          <?php foreach ( $theme_options_settings as $tab => $fields ) :?>
            <div id="options-group-<?php echo sanitize_title($tab); ?>" class="group theme-inner-tabs">
              <h3><?php echo $tab; ?></h3>
              <?php foreach ( $fields as $name => $field ):?>
                <div class="section theme-tabs">
                  <a class="heading theme-inner-tab" href="javascript:void(0)"><?php echo $field['label']; ?></a>
                  <div class="theme-inner-tab-group">
                    <div class="ft-control">
                      <?php
                      switch ( $field['type'] ){
                        case 'image' :
                          ?>
                          <input id="<?php echo sanitize_title($field['label']); ?>" class="upload" type="text" name="theme_theme_options[<?php echo $name; ?>]"
                                 value="<?php if(!empty($theme_options[$name])) { echo esc_url($theme_options[$name]); } ?>" placeholder="<?php _e('Aucun fichier','theme'); ?>" />
                          <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload','theme'); ?>" />
                          <div class="screenshot" id="<?php echo $name; ?>-image">
                            <?php if(!empty($theme_options[$name])) { echo "<img src='".esc_url($theme_options[$name])."' />
                          <a class='remove-image'></a>"; } ?>
                          </div>
                          <?php
                          break;
                        case 'text' :
                          ?>
                          <div class="explain"><?php echo $field['description']; ?></div>
                          <input size="36" type="text" id="<?php echo $name;?>-text" class="of-input" name="theme_theme_options[<?php echo $name;?>]"  value="<?php if(!empty($theme_options[$name])) { echo esc_attr($theme_options[$name]); } ?>">
                          <?php
                          break;
                        case 'textarea':
                          ?>
                          <div class="explain"><?php echo $field['description']; ?></div>
                          <textarea name="theme_theme_options[<?php echo $name;?>]" rows="6" id="<?php echo $name;?>-text" class="of-input"><?php if(!empty($theme_options[$name])) { echo esc_attr($theme_options[$name]); } ?></textarea>
                          <?php
                          break;
                        case 'date':
                          break;
                        case 'select':
                          ?>
                          <div class="explain"><?php echo $field['description']; ?></div>
                          <select name="theme_theme_options[<?php echo $name;?>]" id="<?php echo $name;?>-select">
                            <option>Séléctionnez</option>
                            <?php foreach( $field['options'] as $value => $label):?>
                              <option value="<?php echo $value; ?>" <?php if ( $theme_options[$name] == $value ) echo 'selected=selected'?>><?php echo $label; ?></option>
                            <?php endforeach;?>
                          </select>
                          <?php
                          break;
                        case 'url':
                          ?>
                          <div class="explain"><?php echo $field['description']; ?></div>
                          <input size="36" id="<?php echo $name;?>-text" class="of-input" name="theme_theme_options[<?php echo $name;?>]" type="text" value="<?php if(!empty($theme_options[$name])) { echo esc_url($theme_options[$name]); } ?>" />
                          <?php
                          break;
                        default:
                      }
                      ?>


                    </div>
                  </div>
                </div>

              <?php endforeach;?>
            </div>
          <?php endforeach;?>

        <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================-->
        </div>
      </div>
    </div>

    <div class="theme-footer">
      <ul>
        <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Enregistrer','theme'); ?>" /></li>
      </ul>
    </div>

  </form>
</div>
<div class="save-options"><h2><?php _e('Options sauvegardés avec succés.','theme'); ?></h2></div>