<?php 
    $args = new stdClass();
    $args->settings = $params;
    $args->key = isset( $_GET['tab'] ) ? $_GET['tab'] : 'rpadv_settings';
    $args->tabs = $args->settings->getTabs();
    $args->fieldSet = $args->settings->getFieldSet();
    $args->data = $args->settings->getSettings($args->key);
    $args->fields = $args->settings->getFields($args->key);
    $title = !empty($args->settings->getConfig()->admin->options->title) ? $args->settings->getConfig()->admin->options->title : '';
?>
<?php if (!empty($title)) :?>
<div style="width: 100%; padding: 20px 0 0;">
    <table>
        <tr style="vertical-align: middle;">
            <td style="padding: 0 20px 0 0;">                                                                                               
                <img src="<?php echo RPAdv()->getAssetUrl( 'images/icons/icon-128x128.png' ); ?>" width="100" height="100" />    
            </td>
            <td>
                <h1 style="margin: 0px; padding: 0 0 10px;"><?php echo $title;?></h1>
                <p style="margin: 0px; padding: 0;">More information about the plugin you can find on the <a href="https://wordpress.org/plugins/wp-visual-adverts/" target="_blank" title="wordpress.org">plugin page</a> in the <a href="https://wordpress.org/plugins/wp-visual-adverts/faq/" target="_blank" title="FAQ">FAQ</a> and <a href="https://wordpress.org/plugins/wp-visual-adverts/screenshots/" target="_blank" title="Screenshots">Screenshots</a> sections. <strong>Live demo</strong> you can find on <a href="http://wpdemo.webcodin.com/wordpress-plugin-wcp-visual-adverts/" target="_blank" title="Live Demo">our site</a>.</p> 
            </td>
        </tr>
    </table>
</div>
<?php endif;?>

<div class="wrap">
    <?php 
        screen_icon();
        settings_errors();
        
        echo $args->settings->getParentModule()->getTemplate('admin/options/render-tabs', $args);
    ?>
    <form method="post" action="options.php">
        <?php wp_nonce_field( 'update-options' ); ?>
        <?php settings_fields( $args->key ); ?>
        
        <?php echo $args->settings->getParentModule()->getTemplate('admin/options/render-page', $args); ?>
        
        <p class="submit">
            <input id="submit" class="button button-primary" type="submit" value="Save Changes" name="submit">
            <a class="button button-primary" href="?page=<?php echo $args->settings->getPage();?>&tab=<?php echo $args->key;?>&reset-settings=true" >Reset to Default</a>
        </p>
    </form>
</div>