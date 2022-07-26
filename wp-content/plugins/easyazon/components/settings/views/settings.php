<div class="wrap" id="easyazon-settings-wrap">
	<h1><span class="easyazon-title-wrapper"><?php _e('EasyAzon', 'easyazon'); ?></span></h1>

	<?php settings_errors(); ?>

	<div id="post-body" class="metabox-holder columns-2">
	    <div id="post-body-content">
	        <div class="meta-box-sortables ui-sortable">
	            <form action="options.php" method="post">
	            	<div id="main-card-holder" class="card">
						<div class="notice notice-info"><p><strong><?php printf(__('Having trouble using EasyAzon? <a href="%s" target="_blank">Watch step-by-step video tutorials.</a>', 'easyazon'), 'https://easyazon.com/how-to/'); ?></strong></p></div>

						<?php do_action('easyazon_settings_before_sections'); ?>

						<?php do_settings_sections(EASYAZON_SETTINGS_PAGE); ?>

						<?php do_action('easyazon_settings_after_sections'); ?>

						<?php do_action('easyazon_settings_before_save_button'); ?>

						<p class="submit submit-easyazon-settings">
							<?php settings_fields(EASYAZON_SETTINGS_PAGE); ?>
							<input type="submit" class="button button-primary" value="<?php _e('Save Changes'); ?>" />
						</p>

						<?php do_action('easyazon_settings_after_save_button'); ?>
	            	</div>
				</form>
	        </div>

	    </div>
	    <div id="postbox-container-1" class="postbox-container">
            <div class="meta-box-sortables">
                <!-- Review -->
                <?php /*
                <div class="card">
                    <h3><span><span class="dashicons dashicons-star-filled"></span>&nbsp;<?php esc_html_e( 'Do You Enjoy our Plugin?', 'easyazon' ); ?></span></h3>
                    <div class="inside">
                        <p><?php _e( 'It would be great if you <strong>do us a big favor and give us a review</strong> for our plugin.', 'easyazon' ); ?></p>
                        <p><?php esc_html_e( 'This will help us to make others aware of our plugin and we can continue to provide it with great features in long term.', 'easyazon' ); ?></p>
                        <p>
                            <a class="easyazon-settings-button easyazon-settings-button--secondary easyazon-settings-button--block button button-primary" target="_blank" href="<?php echo esc_url( 'https://wordpress.org/support/plugin/easyazon/reviews/?filter=5#new-post' ); ?>" rel="nofollow"><?php _e('Submit a review', 'easyazon'); ?></a>
                        </p>
                    </div>
                </div>
                */ ?>

                <?php if ( ! function_exists( 'aawp' ) ) { ?>

                    <style type="text/css">
                        .easyazon-upgrade-card {
                            background-color: #3c3c3c;
                            border-color: #3c3c3c;

                            color: #fff;
                        }
                        .easyazon-upgrade-card h3 {
                            color: #fff;
                        }
                        .easyazon-upgrade-card h3 .dashicons {
                            margin-right: 10px;
                        }
                        a.easyazon-upgrade-button {
                            display: block;
                            padding: 10px 20px;

                            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                            background-color: #f2490e;
                            border-color: #f2490e;
                            border-radius: 3px;
                            color: #fff;
                            font-size: 14px;
                            font-weight: 700;
                            text-align: center;
                            text-decoration: none;
                            text-transform: uppercase;
                            transition: all .5s ease-in-out;

                        a.easyazon-upgrade-button:visited {
                            color: #fff;
                        }
                        a.easyazon-upgrade-button:hover,
                        a.easyazon-upgrade-button:focus,
                        a.easyazon-upgrade-button:active {
                            background-color: #f2490e;
                            border-color: #f2490e;
                            color: #222;
                            text-decoration: none;
                        }
                        }
                        .easyazon-upgrade-star {
                            color: #f2490e;
                            vertical-align: -21%;
                        }
                    </style>

                    <div class="card easyazon-upgrade-card">
                        <h3><span><span class="dashicons dashicons-megaphone"></span><?php esc_html_e( 'Want more features?', 'easyazon' ); ?></span></h3>
                        <div class="inside">

                            <p><?php _e('Want more features for your affiliate website? How does the following sound to you:', 'easyazon'); ?></p>

                            <ul>
                                <li><span class="dashicons dashicons-star-filled easyazon-upgrade-star"></span> <strong><?php _e('Well-Designed Product Boxes', 'easyazon'); ?></strong></li>
                                <li><span class="dashicons dashicons-star-filled easyazon-upgrade-star"></span> <strong><?php _e('Automated Bestseller Lists', 'easyazon'); ?></strong></li>
                                <li><span class="dashicons dashicons-star-filled easyazon-upgrade-star"></span> <strong><?php _e('Comparison Tables', 'easyazon'); ?></strong></li>
                                <li><span class="dashicons dashicons-star-filled easyazon-upgrade-star"></span> <strong><?php _e('Conversion Optimized', 'easyazon'); ?></strong></li>
                                <li><span class="dashicons dashicons-star-filled easyazon-upgrade-star"></span> <strong><?php _e('Bypassing Ad Blockers', 'easyazon'); ?></strong></li>
                                <li><span class="dashicons dashicons-star-filled easyazon-upgrade-star"></span> <strong><?php _e('Sorting & Filtering of Products', 'easyazon'); ?></strong></li>
                            </ul>

                            <p>
                                <?php _e('You like it? Then you definitely need to check out AAWP and take your affiliate website to the next level!', 'easyazon'); ?>
                            </p>

                            <p>
                                <?php
                                $upgrade_link = add_query_arg( array(
                                    'utm_source' => sanitize_text_field( get_bloginfo( 'name' ) ),
                                    'utm_medium' => 'Free WP Plugin',
                                    'utm_campaign' => 'EasyAzon Upgrade',
                                    'utm_term' => 'Settings Sidebar'
                                ), 'https://getaawp.com/easyazon-upgrade/' );
                                ?>
                                <a class="easyazon-upgrade-button" target="_blank" href="<?php echo $upgrade_link; ?>" rel="nofollow"><?php _e('More details', 'easyazon'); ?></a>
                            </p>
                            
                        </div>
                    </div>
                <?php } ?>

            </div>
            <!-- /.meta-box-sortables -->
        </div>
	</div>
</div>
