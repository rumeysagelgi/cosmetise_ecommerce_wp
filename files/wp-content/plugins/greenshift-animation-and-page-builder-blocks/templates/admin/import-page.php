<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

?>
<div class="wrap gspb_welcome_div_container">
    <style>
        #wpcontent {
            background: #f8fafc;
            padding: 0;
        }

        .wrap {
            margin: 0 auto;
        }

        .wrap .notice:not(.notice-priority),
        .wrap .error:not(.notice-priority) {
            display: none
        }

        .wrap h2 {
            font-size: 1.4em;
            margin-bottom: 1.5em;
            margin-top: 0;
            font-weight: bold;
        }

        .greenshift_form {
            padding: 15px 25px 25px 25px;
            background: #fff;
            margin-top: 15px;
            box-shadow: 0 0 3px 0 rgb(0 0 0 / 10%), 0 1px 2px -1px rgb(0 0 0 / 10%);
            overflow: hidden;
        }

        .greenshift_form .form-table {
            margin-top: 0
        }

        .gs-introtext {
            font-size: 14px;
            line-height: 22.4px;
            color: rgb(100 116 139);
            margin-bottom: 30px;
        }

        .gs-intro-video iframe {
            box-shadow: 10px 10px 20px rgb(0 0 0 / 15%);
        }

        .gs-intro-video {
            margin-bottom: 40px
        }

        .wrap h1 {
            text-align: left;
            padding: 15px 20px;
            margin: -1px -1px 60px -1px;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            box-shadow: 0 3px 8px rgb(0 0 0 / 5%);
        }

        .gs-padd {
            padding: 25px;
            text-align: left;
            margin: 1.5em auto;
            max-width: 900px;
        }

        .rtl .gs-padd {
            text-align: right
        }

        .wp-core-ui .button-primary {
            background-color: #2184f9
        }

        .nav-tab {
            font-size: 16px;
            border: none;
            padding: 10px 16px;
            background: none;
            border-bottom: 2px solid transparent;
        }

        .nav-tab-active,
        .nav-tab-active:focus,
        .nav-tab-active:focus:active,
        .nav-tab:hover {
            border-bottom: 2px solid #2184f9;
            background: #fff;
            color: #2184f9;
        }

        .nav-tab-wrapper {
            padding-left: 20px;
            background: white;
            border-bottom: 1px solid #edeff5;
        }

        .nav-tab-wrapper>div {
            margin: 0 auto;
            max-width: 950px
        }

        .wrap .fs-notice {
            margin: 0 25px 35px 25px !important
        }

        .wrap .fs-plugin-title {
            display: none !important
        }

        .gs_main_text {
            font-size: 15px;
            margin-bottom: 12px;
        }

        .gs_main_text a {
            color: #2184f9
        }

        .mb30 {
            margin-bottom: 30px
        }



        .wp-admin .wrap.design-import input[type="file"] {
            font-weight: 600;
            background-color: rgba(255, 255, 255, 0.5);
            border: 1px dashed rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            padding: 8px;
            display: block;
            margin-top: 1em;
        }

        .wrap.design-import .has-2-columns {
            margin-top: 1em;
            width: calc(100% - 8px);
            display: grid;
            grid-template-columns: 49% 49%;
            grid-column-gap: 2%;
        }

        .is-column-upload {
            padding-right: 20px;
            border-right: 1px solid #f1f1f1;
        }

        .is-column-download {
            padding-left: 15px
        }

        .wrap.design-import h2 {
            font-size: 1.6em;
            font-weight: 400;
            margin: 0;
            padding: 9px 0 4px;
            line-height: 1.3;
        }

        .wrap.design-import form.download-form fieldset,
        .wrap.design-import ul.updated-posts {
            background-color: rgba(255, 255, 255, 0.5);
            margin-top: 1em;
            border-radius: 6px;
        }

        .wrap.design-import .is-font-size-larger {
            font-size: 1.2em;
        }

        .wrap.design-import .is-font-weight-400 {
            font-weight: 400;
        }

        .wrap.design-import .is-font-weight-600 {
            font-weight: 600;
        }

        .wrap.design-import .is-export-designs-group {
            display: grid;
        }

        .wrap.design-import .is-design-theme-group.is-current-theme {
            grid-row: 1;
        }

        .wrap.design-import .is-design-theme-group {
            margin: 1em 0;
            border: 1px dashed rgba(0, 0, 0, 0.2);
            border-radius: 6px;
        }

        .wrap.design-import .is-design-theme-name {
            margin-top: 1em;
            margin-left: 1em;
        }

        .wrap.design-import .is-design-option {
            margin-left: 2em;
        }

        .wrap.design-import .notice.is-designs-not-available {
            padding: 0.5em 1em;
        }

        .wrap.design-import ul.updated-posts li.updated .dashicons-saved,
        .wrap.design-import ul.updated-posts li.updated a {
            color: #2271b1;
        }

        .wrap.design-import .is-theme-active,
        .wrap.design-import ul.updated-posts li.imported .dashicons-saved,
        .wrap.design-import ul.updated-posts li.imported a {
            color: #2ab122;
        }

        @media (max-width: 1120px) {
            .wrap.design-import .has-2-columns {
                grid-template-columns: 100%;
                grid-column-gap: 0;
                grid-row-gap: 2em;
            }
        }

        .gspb_admin_tabs {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .gspb_admin_tabs a {
            background: #fff;
            border: 1px solid #dadde2;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            color: #111;
            font-size: 1.1em;
            line-height: 1.5;
            padding: 7px 16px;
            text-decoration: none;

        }

        .gspb_admin_tabs a.active {
            background: #2184f9;
            color: #fff;
            border-color: #2184f9
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            $('#design-import-posts-all').on('click', function() {
                if (this.checked) {
                    $('.design_import_posts').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.design_import_posts').each(function() {
                        this.checked = false;
                    });
                }
            });
            $('.design_import_posts').on('click', function() {
                if ($('.design_import_posts:checked').length == $('.design_import_posts').length) {
                    $('#design-import-posts-all').prop('checked', true);
                } else {
                    $('#design-import-posts-all').prop('checked', false);
                }
            });
        });
    </script>
    <nav class="nav-tab-wrapper">
        <div>
            <a href="?page=greenshift_import" class="nav-tab  nav-tab-active">
                <?php esc_html_e("Import/Export", 'greenshift-animation-and-page-builder-blocks'); ?>
            </a>
            <a href="?page=greenshift_demo" class="nav-tab">
                <?php esc_html_e("Demo Import", 'greenshift-animation-and-page-builder-blocks'); ?>
            </a>
            <a href="?page=greenshift_upgrade" class="nav-tab">
                <?php esc_html_e("Upgrade", 'greenshift-animation-and-page-builder-blocks'); ?>
            </a>
        </div>
    </nav>

    <div class="gs-padd">
        <h2><?php esc_html_e("Import/Export", 'greenshift-animation-and-page-builder-blocks'); ?></h2>
        <div class="gspb_admin_tabs">
            <?php $tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'fse'; ?>
            <a href="?page=greenshift_import&tab=fse" class="<?php echo ($tab == 'fse') ? 'active' : ''; ?>"><?php esc_html_e('FSE Templates', 'greenshift-animation-and-page-builder-blocks'); ?></a>
            <a href="?page=greenshift_import&tab=reusable" class="<?php echo ($tab == 'reusable') ? 'active' : ''; ?>"><?php esc_html_e('Reusable Templates', 'greenshift-animation-and-page-builder-blocks'); ?></a>
            <a href="?page=greenshift_import&tab=global" class="<?php echo ($tab == 'global') ? 'active' : ''; ?>"><?php esc_html_e('Greenshift Global', 'greenshift-animation-and-page-builder-blocks'); ?></a>
        </div>
        <?php
        if (!current_user_can('export') || !current_user_can('import')) {
            wp_die('<div class="notice notice-warning notice-priority"><p>' . esc_html__('Please ask your site administrator to enable import and export capabilities for your user account.', 'greenshift-animation-and-page-builder-blocks') . '</p></div>');
        }

        if (!wp_is_block_theme() && $tab == 'fse') {
            wp_die('<div class="notice notice-warning notice-priority"><p>' . sprintf(
                /* translators: %1$s: opening <a> tag with themes.php admin link, %2$s: closing </a> tag */
                __('This site does not have Full Site Editing enabled. Please install and activate a %1$sblock theme%2$s. Recommended theme - %3$sGreenshift%2$s', 'greenshift-animation-and-page-builder-blocks'),
                '<a href="' . admin_url('themes.php') . '">',
                '</a>',
                '<a href="https://wordpress.org/themes/greenshift/" target="_blank">',
            ) . '</p></div>');
        }
        ?>
        <div class="greenshift_form">
            <div class="wrap design-import">
                <div class="has-2-columns">

                    <?php if ($tab == 'fse') : ?>

                        <div class="column is-column-upload">
                            <h2><span class="dashicons-before dashicons-upload"></span> <?php esc_html_e('Import your FSE templates.', 'greenshift-animation-and-page-builder-blocks'); ?></h2>
                            <?php
                            if (isset($_GET['design_import']) && is_admin() && current_user_can('import') && isset($_GET["_wpnonce"])) {
                                check_admin_referer('import-upload', '_wpnonce');
                                greenshift_design_importer();
                            } else {
                            ?>
                                <p class="is-font-size-larger"><?php esc_html_e('Before using the importer, it is recommended to save and back up your current design using the Export function.', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                                <?php wp_import_upload_form('admin.php?page=greenshift_import&amp;design_import=1'); ?>
                                <p></p>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="column is-column-download">
                            <h2><span class="dashicons-before dashicons-download"></span> <?php esc_html_e('Export your Full Site Editing design.', 'greenshift-animation-and-page-builder-blocks'); ?></h2>
                            <p><?php esc_html_e('Click the button below to generate XML file', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                            <p><?php esc_html_e('Once you&#8217;ve saved the download file, you can use the Import option in another site to import the design from this site.', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                            <?php
                            $args = array(
                                'numberposts' => -1,
                                'orderby' => 'post_type',
                                'post_status' => 'publish',
                                'post_type' => array('wp_template', 'wp_template_part', 'wp_global_styles'),
                            );
                            $export_posts = get_posts($args);

                            if (!empty($export_posts)) {
                                $nonce = wp_create_nonce('greenshift_import_download');
                            ?>

                                <form method="get" class="download-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <fieldset>
                                        <input type="hidden" name="action" value="greenshift_export">
                                        <input type="hidden" name="page" value="greenshift_import" />
                                        <input type="hidden" name="greenshift_import_download" value="templates" />
                                        <input type="hidden" name="greenshift_import_nonce" value="<?php echo esc_attr($nonce); ?>" />
                                        <p class="is-font-weight-600"><label for="design-import-posts-all">
                                                <input type="checkbox" id="design-import-posts-all" class="design-import-posts-all" value="all" />
                                                <span><?php esc_html_e('Select all', 'greenshift-animation-and-page-builder-blocks'); ?></span>
                                            </label></p>
                                        <div class="is-export-designs-group">
                                            <?php

                                            // start - display all saved templates, parts, and global styles
                                            $current_theme = wp_get_theme()->get_stylesheet();
                                            $themes_designs = array();

                                            foreach ($export_posts as $post) {
                                                $post_terms = wp_get_post_terms($post->ID, 'wp_theme');

                                                if ($post_terms) {
                                                    foreach ($post_terms as $post_term) {
                                                        $themecurrentname = $post_term->name;
                                                        if($themecurrentname == 'woocommerce/woocommerce' && $current_theme == 'greenshift'){
                                                            $themecurrentname = 'greenshift';
                                                        }
                                                        $themes_designs[] = array(
                                                            'id' => $post->ID,
                                                            'title' => $post->post_title,
                                                            'type' => $post->post_type,
                                                            'theme' => $themecurrentname
                                                        );
                                                    }
                                                } else {
                                                    $themes_designs[] = array(
                                                        'id' => $post->ID,
                                                        'title' => $post->post_title,
                                                        'type' => $post->post_type,
                                                        'theme' => 'Undefinedtheme'
                                                    );
                                                }
                                            }

                                            // group by theme
                                            $themes_designs_group_by = greenshift_design_import_group_by('theme', $themes_designs);
                                            ksort($themes_designs_group_by);

                                            foreach ($themes_designs_group_by as $theme_name => $theme_posts) {

                                                // only want to list data from block themes
                                                if (wp_get_theme($theme_name)->is_block_theme()) {
                                                    $theme_active_div_class = '';
                                                    $theme_active_span = '';
                                                    if ($current_theme === $theme_name) {
                                                        $theme_active_div_class = ' is-current-theme';
                                                        $theme_active_span = '<span class="is-theme-active is-font-weight-400">' . esc_html__(' (active theme)', 'greenshift-animation-and-page-builder-blocks') . '</span>';
                                                    }

                                                    echo '<div class="is-design-theme-group' . $theme_active_div_class . '">';
                                                    if ($theme_name === '' || $theme_name === 'Undefinedtheme') {
                                                        echo '<p class="is-design-theme-name is-font-weight-600"><em>' . esc_html__('Unknown theme', 'greenshift-animation-and-page-builder-blocks') . '</em></p>';
                                                    } else {
                                                        echo '<p class="is-design-theme-name is-font-weight-600">' . esc_html(wp_get_theme($theme_name)) . $theme_active_span . '</p>';
                                                    }
                                                    foreach ($theme_posts as $theme_post) {
                                                        if ($theme_post['type'] === 'wp_template') {
                                                            $type_name = esc_html__(' (template)', 'greenshift-animation-and-page-builder-blocks');
                                                        } elseif ($theme_post['type'] === 'wp_template_part') {
                                                            $type_name = esc_html__(' (template part)', 'greenshift-animation-and-page-builder-blocks');
                                                        } else {
                                                            $type_name = '';
                                                        }
                                                        echo '<p class="is-design-option"><label for="design_import_posts">
                                                <input type="checkbox" name="design_import_posts[]" class="design_import_posts" value="' . $theme_post['id'] . '" />
                                                <span class="is-font-weight-600">' . $theme_post['title'] . '</span>' . $type_name . '
                                            </label></p>
                                            ';
                                                    }
                                                    echo '</div>';
                                                }
                                            }
                                            // end - display all saved templates, parts, and global styles
                                            ?>
                                        </div>
                                    </fieldset>
                                    <?php submit_button(esc_html__('Download Export File', 'greenshift-animation-and-page-builder-blocks')); ?>
                                </form>
                            <?php
                            } else {
                            ?>
                                <p class="notice is-designs-not-available"><em><?php esc_html_e('You currently do not have any customized Templates, Template Parts, or Custom Styles saved in the WordPress database.', 'greenshift-animation-and-page-builder-blocks'); ?></em></p>
                            <?php submit_button(esc_html__('Download Export File', 'greenshift-animation-and-page-builder-blocks'), 'primary', 'submit', true, array('disabled' => true));
                            }
                            ?>
                        </div>

                    <?php elseif ($tab === 'reusable') : ?>
                        <div class="column is-column-upload">
                            <h2><span class="dashicons-before dashicons-upload"></span> <?php esc_html_e('Import your reusable templates.', 'greenshift-animation-and-page-builder-blocks'); ?></h2>
                            <?php
                            if (isset($_GET['design_import']) && is_admin() && current_user_can('import') && isset($_GET["_wpnonce"])) {
                                check_admin_referer('import-upload', '_wpnonce');
                                greenshift_design_importer();
                            } else {
                            ?>
                                <p class="is-font-size-larger"><?php esc_html_e('Before using the importer, it is recommended to save and back up your current design using the Export function.', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                                <?php wp_import_upload_form('admin.php?page=greenshift_import&amp;design_import=1'); ?>
                                <p></p>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="column is-column-download">
                            <h2><span class="dashicons-before dashicons-download"></span> <?php esc_html_e('Export your reusable templates.', 'greenshift-animation-and-page-builder-blocks'); ?></h2>
                            <p><?php esc_html_e('Click the button below to generate XML file', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                            <p><?php esc_html_e('Once you&#8217;ve saved the download file, you can use the Import option in another site to import the design from this site.', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                            <?php
                            $args = array(
                                'numberposts' => -1,
                                'orderby' => 'post_type',
                                'post_status' => 'publish',
                                'post_type' => array('wp_block'),
                            );
                            $export_posts = get_posts($args);

                            if (!empty($export_posts)) {
                                $nonce = wp_create_nonce('greenshift_import_download');
                            ?>

                                <form method="get" class="download-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <fieldset>
                                        <input type="hidden" name="action" value="greenshift_export">
                                        <input type="hidden" name="page" value="greenshift_import" />
                                        <input type="hidden" name="greenshift_import_download" value="templates" />
                                        <input type="hidden" name="greenshift_import_nonce" value="<?php echo esc_attr($nonce); ?>" />
                                        <p class="is-font-weight-600"><label for="design-import-posts-all">
                                                <input type="checkbox" id="design-import-posts-all" class="design-import-posts-all" value="all" />
                                                <span><?php esc_html_e('Select all', 'greenshift-animation-and-page-builder-blocks'); ?></span>
                                            </label></p>
                                        <div class="is-export-designs-group">
                                            <?php

                                            // start - display all saved templates, parts, and global styles
                                            $reusableblocks = array();

                                            foreach ($export_posts as $post) {
                                                $reusableblocks[] = array(
                                                    'id' => $post->ID,
                                                    'title' => $post->post_title,
                                                );
                                            }

                                            if (!empty($reusableblocks)) {
                                                foreach ($reusableblocks as $index => $block) {
                                                    echo '<p class="is-design-option"><label for="design_import_posts">
                                                    <input type="checkbox" name="design_import_posts[]" class="design_import_posts" value="' . $block['id'] . '" />
                                                    <span class="is-font-weight-600">' . $block['title'] . '</span></label></p>';
                                                }
                                            } else {
                                                echo '<p class="is-design-option">
                                                <span class="is-font-weight-600">' . esc_html__('No reusable blocks found.', 'greenshift-animation-and-page-builder-blocks') . '</p>';
                                            }

                                            ?>
                                        </div>
                                    </fieldset>
                                    <?php submit_button(esc_html__('Download Export File', 'greenshift-animation-and-page-builder-blocks')); ?>
                                </form>
                            <?php
                            } else {
                            ?>
                                <p class="notice is-designs-not-available"><em><?php esc_html_e('You currently do not have any customized Templates, Template Parts, or Custom Styles saved in the WordPress database.', 'greenshift-animation-and-page-builder-blocks'); ?></em></p>
                            <?php submit_button(esc_html__('Download Export File', 'greenshift-animation-and-page-builder-blocks'), 'primary', 'submit', true, array('disabled' => true));
                            }
                            ?>
                        </div>
                    <?php elseif ($tab === 'global') : ?>
                        <div class="column is-column-upload">
                            <h2><span class="dashicons-before dashicons-upload"></span> <?php esc_html_e('Import your Greenshift global settings', 'greenshift-animation-and-page-builder-blocks'); ?></h2>
                            <?php 
                                if ( isset( $_POST['importaction'] ) && $_POST['importaction'] === 'greenshift_import_settings' ) {
                                    if ( ! isset( $_FILES['import_file'] ) ) {
                                        echo '<p style="color:red">'.esc_html__('Please select a JSON file to import.', 'greenshift-animation-and-page-builder-blocks').'</p>';
                                    } else {

                                        check_admin_referer('greenshift_import_settings', 'greenshift_import_settings_nonce');
                                        $json_file_name = $_FILES['import_file']['name'];
                                        $json_file_path = $_FILES['import_file']['tmp_name'];
                                
                                        // Read JSON file
                                        $json_data = file_get_contents( $json_file_path );
                                        $data = json_decode( $json_data, true );
                                        $data = greenshift_sanitize_multi_array($data);
                                        $default_settings = get_option('gspb_global_settings');
                                        $newargs = wp_parse_args($data, $default_settings);

                                        update_option('gspb_global_settings', $newargs);
                                
                                
                                        echo '<p style="color:green">'.esc_html__('Data imported successfully from', 'greenshift-animation-and-page-builder-blocks').' ' . $json_file_name . '</p>';
                                    }
                                }else {
                                    ?>
                                        <?php $nonceimport = wp_create_nonce('greenshift_import_settings'); ?>
                                        <p class="is-font-size-larger"><?php esc_html_e('Before using the importer, it is recommended to save and back up your site', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="file" name="import_file">
                                            <input type="hidden" name="importaction" value="greenshift_import_settings">
                                            <input type="hidden" name="greenshift_import_settings_nonce" value="<?php echo esc_attr($nonceimport); ?>" />
                                            <?php submit_button(esc_html__('Import Data', 'greenshift-animation-and-page-builder-blocks')); ?>
                                        </form>
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="column is-column-download">
                            <h2><span class="dashicons-before dashicons-download"></span> <?php esc_html_e('Export your Greenshift global settings', 'greenshift-animation-and-page-builder-blocks'); ?></h2>
                            <p><?php esc_html_e('Click the button below to generate json file', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                            <p><?php esc_html_e('Once you&#8217;ve saved the download file, you can use the Import option in another site to import the design from this site.', 'greenshift-animation-and-page-builder-blocks'); ?></p>
                            <?php
                                $export_posts = get_option('gspb_global_settings');

                            if (!empty($export_posts)) {
                                $nonce = wp_create_nonce('greenshift_import_download');
                            ?>

                                <form method="get" class="download-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <fieldset>
                                    <input type="hidden" name="action" value="greenshift_export">
                                        <input type="hidden" name="page" value="greenshift_import" />
                                        <input type="hidden" name="greenshift_import_download" value="settings" />
                                        <input type="hidden" name="greenshift_import_nonce" value="<?php echo esc_attr($nonce); ?>" />
                                        <p class="is-font-weight-600"><label for="design-import-posts-all">
                                                <input type="checkbox" id="design-import-posts-all" class="design-import-posts-all" value="all" />
                                                <span><?php esc_html_e('Select all', 'greenshift-animation-and-page-builder-blocks'); ?></span>
                                            </label></p>
                                        <div class="is-export-designs-group">
                                            <?php

                                            // start - display all saved templates, parts, and global styles
                                            $reusableblocks = array();

                                            foreach ($export_posts as $key=>$post) {
                                                $name = 'option';
                                                if($key == 'jsdelay'){
                                                    $name = esc_html__('Script Management', 'greenshift-animation-and-page-builder-blocks');;
                                                }else if($key == 'breakpoints'){
                                                    $name = esc_html__('Breakpoints', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == '_locale'){
                                                    $name = esc_html__('Localization', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == 'reusablestyles'){
                                                    $name = esc_html__('Reusable Styles', 'greenshift-animation-and-page-builder-blocks');
                                                }
                                                else if($key == 'presets'){
                                                    $name = esc_html__('Presets', 'greenshift-animation-and-page-builder-blocks');
                                                }
                                                else if($key == 'localfont'){
                                                    $name = esc_html__('Local fonts', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == 'localfontcss'){
                                                    $name = esc_html__('Local font styles', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == 'colours'){
                                                    $name = esc_html__('Greenshift global colors', 'greenshift-animation-and-page-builder-blocks');
                                                }
                                                else if($key == 'typography'){
                                                    $name = esc_html__('Greenshift typography', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == 'globalcss'){
                                                    $name = esc_html__('Greenshift global styles', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == 'sitesettings'){
                                                    $name = esc_html__('Greenshift Site settings', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == 'googleapi'){
                                                    $name = esc_html__('Google API Key', 'greenshift-animation-and-page-builder-blocks');
                                                }else if($key == 'default_attributes'){
                                                    $name = esc_html__('Custom Default attributes', 'greenshift-animation-and-page-builder-blocks');
                                                }
                                                $reusableblocks[] = array(
                                                    'id' => $key,
                                                    'title' => $name,
                                                );
                                            }

                                            if (!empty($reusableblocks)) {
                                                foreach ($reusableblocks as $index => $block) {
                                                    echo '<p class="is-design-option"><label for="design_import_posts">
                                                    <input type="checkbox" name="design_import_posts[]" class="design_import_posts" value="' . $block['id'] . '" />
                                                    <span class="is-font-weight-600">' . $block['title'] . '</span></label></p>';
                                                }
                                            } else {
                                                echo '<p class="is-design-option">
                                                <span class="is-font-weight-600">' . esc_html__('No reusable blocks found.', 'greenshift-animation-and-page-builder-blocks') . '</p>';
                                            }

                                            ?>
                                        </div>
                                    </fieldset>
                                    <?php submit_button(esc_html__('Download Export File', 'greenshift-animation-and-page-builder-blocks')); ?>
                                </form>
                            <?php
                            } else {
                            ?>
                                <p class="notice is-designs-not-available"><em><?php esc_html_e('You currently do not have any customized Templates, Template Parts, or Custom Styles saved in the WordPress database.', 'greenshift-animation-and-page-builder-blocks'); ?></em></p>
                            <?php submit_button(esc_html__('Download Export File', 'greenshift-animation-and-page-builder-blocks'), 'primary', 'submit', true, array('disabled' => true));
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            ?>
        </div>
    </div>
</div>