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
            padding: 35px;
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

        .wrap.design-import {
            display: flex;
            gap: 35px
        }

        .demo_import_btns {
            display: flex;
            gap: 20px;
        }

        .wrap.design-import>div {
            max-width: 50%;
        }

        .wrap.design-import>div img {
            max-width: 100%;
        }

        .wrap.design-import .button {
            padding: 0 15px;
            font-size: 15px
        }


        .wrap.design-import h2 {
            font-size: 2em;
            font-weight: 400;
            margin: 0;
            padding: 0 0 10px 0;
            line-height: 1.3;
        }

        .demo_content p {
            font-size: 17px;
            line-height: 28px
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

        .addon_active {
            font-size: 0.9em;
            color: green;
        }

        .addon_required a {
            font-size: 0.9em;
            color: red;
        }

        .import_progress, .hideimport {
            display: none;
        }

        .import_progress.active, .hideimport.active {
            display: block;
        }

        .demo_content .import_progress_loading {
            display: flex;
            gap: 15px;
            font-size: 15px;
            line-height: 20px;
            color: #2171b1;
            padding: 20px;
            background: #f5f7f7;
        }

        .demo_content .import_progress_loading svg {
            min-width: 20px;
            width: 20px;
        }
        .hideimportbutton{
            display:inline-block;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.button').click(function(event) {
                    event.preventDefault(); //Prevents form submission
                    $('.import_progress').addClass('active'); //Adds class 'active' to element '.import-process'
                    $(this).closest('form').submit(); //Submits the form after adding the class 'active'
                });

                $('.hideimportbutton').click(function(event) {
                    $('.hideimport').toggleClass('active');
                });
            });
        });
    </script>

    <nav class="nav-tab-wrapper">
        <div>
            <a href="?page=greenshift_import" class="nav-tab">
                <?php esc_html_e("Import/Export", 'greenshift-animation-and-page-builder-blocks'); ?>
            </a>
            <a href="?page=greenshift_demo" class="nav-tab  nav-tab-active">
                <?php esc_html_e("Demo Import", 'greenshift-animation-and-page-builder-blocks'); ?>
            </a>
            <a href="?page=greenshift_upgrade" class="nav-tab">
                <?php esc_html_e("Upgrade", 'greenshift-animation-and-page-builder-blocks'); ?>
            </a>
        </div>
    </nav>

    <?php $licenses = greenshift_edd_check_all_licenses(); ?>
    <?php $is_allinone = false; ?>
    <?php if (!empty($licenses['all_in_one']) && $licenses['all_in_one'] == 'valid') {
        $licensesfull = get_option('gspb_edd_licenses');
        if (!empty($licensesfull['all_in_one']['expires'] && $licensesfull['all_in_one']['expires'] == 'lifetime') && isset($licensesfull['all_in_one']['license_limit']) && $licensesfull['all_in_one']['license_limit'] === 0) {
            $is_allinone = true;
        }
    }
    ?>

    <?php $is_woo_license = ((!empty($licenses['all_in_one']) && $licenses['all_in_one'] == 'valid') || (!empty($licenses['woocommerce_addon']) && $licenses['woocommerce_addon'] == 'valid') || (!empty($licenses['all_in_one_woo']) && $licenses['all_in_one_woo'] == 'valid')) ? true : false; ?>
    <?php $is_woo_active = ($is_woo_license && defined('GREENSHIFTWOO_DIR_URL')) ? true : false; ?>

    <?php $is_query_license = ((!empty($licenses['all_in_one']) && $licenses['all_in_one'] == 'valid') || (!empty($licenses['query_addon']) && $licenses['query_addon'] == 'valid') || (!empty($licenses['all_in_one_woo']) && $licenses['all_in_one_woo'] == 'valid')) ? true : false; ?>
    <?php $is_query_active = ($is_query_license && defined('GREENSHIFTQUERY_DIR_URL')) ? true : false; ?>

    <div class="gs-padd">
        <h2><?php esc_html_e("Demo Import", 'greenshift-animation-and-page-builder-blocks'); ?></h2>
        <?php
        if (!current_user_can('export') || !current_user_can('import')) {
            wp_die('<div class="notice notice-warning notice-priority"><p>' . esc_html__('Please ask your site administrator to enable import and export capabilities for your user account.', 'greenshift-animation-and-page-builder-blocks') . '</p></div>');
        }

        $theme = wp_get_theme();
        if ($theme->parent_theme) {
            $template_dir =  basename(get_template_directory());
            $theme = wp_get_theme($template_dir);
        }
        $themename = $theme->get('TextDomain');

        if ($themename != 'greenshift') {
            wp_die('<div class="notice notice-warning notice-priority"><p>' . sprintf(
                /* translators: %1$s: opening <a> tag with themes.php admin link, %2$s: closing </a> tag */
                __('Please install and activate a %1$sGreenshift theme%2$s to use demo sites.', 'greenshift-animation-and-page-builder-blocks'),
                '<a href="https://wordpress.org/themes/greenshift/" target="_blank">',
                '</a>',
            ) . '</p></div>');
        }
        ?>
        <div class="greenshift_form">
            <div class="wrap design-import">
                <div class="demo_image">
                    <img src="<?php echo GREENSHIFT_DIR_URL . 'templates/admin/img/demo1.jpg'; ?>" alt="demo-import">
                </div>
                <div class="demo_content">
                    <h2>Woocommerce Demo shop</h2>
                    <p><?php esc_html_e("WooCommerce Full Site Editing Theme offers an unparalleled level of customization control.  So if you're ready to take your ecommerce business to the next level, consider using the WooCommerce Full Site Editing Theme as your starting point.", 'greenshift-animation-and-page-builder-blocks'); ?></p>
                    <p class="addon_require">

                        <?php if ($is_woo_active) { ?>
                            <span class="addon_active"><?php esc_html_e("Woocommerce addon is active.", 'greenshift-animation-and-page-builder-blocks'); ?></span><br />
                        <?php } else { ?>
                            <span class="addon_required"><a href="<?php echo admin_url('admin.php?page=greenshift_upgrade'); ?>"><?php esc_html_e("Woocommerce addon is required", 'greenshift-animation-and-page-builder-blocks'); ?></a></span><br />
                        <?php } ?>
                        <?php if ($is_query_active) { ?>
                            <span class="addon_active"><?php esc_html_e("Query addon is active.", 'greenshift-animation-and-page-builder-blocks'); ?></span><br />
                        <?php } else { ?>
                            <span class="addon_required"><a href="<?php echo admin_url('admin.php?page=greenshift_upgrade'); ?>"><?php esc_html_e("Query addon is required", 'greenshift-animation-and-page-builder-blocks'); ?></a></span><br />
                        <?php } ?>

                    </p>
                    <div class="demo_import_btns">
                        <form class="importform" method="post" action="<?php echo esc_url(wp_nonce_url('admin.php?page=greenshift_demo&amp;design_import=1', 'import-upload')); ?>">
                            <p>
                                <input type="hidden" name="importfile" value="https://shop.greenshiftwp.com/demo/woodemo.xml" />
                            </p>
                            <input type="submit" class="button button-primary" value="<?php esc_html_e("Import Demo", 'greenshift-animation-and-page-builder-blocks'); ?>" <?php echo (!$is_woo_active || !$is_query_active) ? "disabled" : ""; ?>>
                        </form>
                        <form class="importform" method="post" action="<?php echo esc_url(wp_nonce_url('admin.php?page=greenshift_demo&amp;design_import=1', 'import-upload')); ?>">
                            <p>
                                <input type="hidden" name="importfile" value="https://shop.greenshiftwp.com/demo/wootemplates.xml" />
                            </p>
                            <input type="submit" class="button button-secondary" value="<?php esc_html_e("Import Only FSE templates", 'greenshift-animation-and-page-builder-blocks'); ?>" <?php echo (!$is_woo_active || !$is_query_active) ? "disabled" : ""; ?>>
                        </form>
                    </div>
                    <div style="margin-bottom:15px"></div>
                    <?php
                    echo '                    
                        <div class="import_progress">
                        <p class="import_progress_loading">
                            <svg stroke="#2171b1" version="1.1" id="L2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                <circle fill="none" stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="48"></circle>
                                <line fill="none" stroke-linecap="round" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="85" y2="50.5">
                                    <animateTransform attributeName="transform" dur="2s" type="rotate" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform>
                                </line>
                                <line fill="none" stroke-linecap="round" stroke-width="4" stroke-miterlimit="10" x1="50" y1="50" x2="49.5" y2="74">
                                    <animateTransform attributeName="transform" dur="15s" type="rotate" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform>
                                </line>
                            </svg>
                            ' . esc_html__("Import is in progress. Do not close this page until you get message about import results", "greenshift-animation-and-page-builder-blocks") . '
                        </p>
                    </div>'; ?>
                    <?php
                    if (isset($_GET['design_import']) && isset($_POST['importfile']) && current_user_can('import') && isset($_GET["_wpnonce"])) {
                        check_admin_referer('import-upload', '_wpnonce');
                        echo '<div class="hideimportbutton">'.esc_html__("Show details", "greenshift-animation-and-page-builder-blocks").' +</div>';
                        @greenshift_design_importer($_POST['importfile']);
                    }
                    ?>
                </div>

            </div>
            <?php
            ?>
        </div>
    </div>
</div>