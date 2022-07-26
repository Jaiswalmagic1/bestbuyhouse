<div class="wrap">
	<form action="<?php echo esc_attr(esc_url(add_query_arg('id', $data['id'], $page_url))); ?>" method="post">
		<h2>
			<?php _e('Localize Product', 'easyazon'); ?>
			<a class="add-new-h2" href="<?php echo esc_attr(esc_url($page_url)); ?>"><?php _e('Manage Localizations', 'easyazon'); ?></a>
		</h2>

		<?php settings_errors(); ?>

		<p><?php _e('For each locale listed below, enter the identifier for the product you would like to use for that locale.', 'easyazon'); ?></p>

		<p><?php _e('You can also copy and paste a URL as long as a part of the URL looks like <code>/dp/IDENTIFIER/</code>.', 'easyazon'); ?></p>

		<p><?php _e('The mapping you are performing is omnidirectional. If you localize a product from the US locale to the UK locale, that product will also be localized in reverse.', 'easyazon'); ?></p>

		<p><strong><?php _e('Please note:', 'easyazon'); ?></strong> <?php _e('If you have previously localized a product, the earliest localization will be used when that product is being mapped.', 'easyazon'); ?></p>

		<table class="form-table">
			<tbody>
				<?php foreach($locales as $locale_key => $locale_name) { ?>
				<tr>
					<th scope="row"><label for="easyazon-addition-localization-<?php echo esc_attr($locale_key); ?>"><?php echo esc_html($locale_name); ?></label></th>
					<td>
						<input type="text" class="code regular-text easyazon-addition-localization-field" id="easyazon-addition-localization-<?php echo esc_attr($locale_key); ?>" name="easyazon-addition-localization[<?php echo esc_attr($locale_key); ?>]" value="<?php echo esc_attr($localization[$locale_key]); ?>" data-locale="<?php echo esc_attr($locale_key); ?>" />
						<small><a class="select-easyazon" href="#" data-locale="<?php echo esc_attr($locale_key); ?>"><?php _e('Search for Product', 'easyazon'); ?></a></small>

						<?php
						if(!empty($localization[$locale_key]) && ($item = easyazon_get_item($localization[$locale_key], $locale_key))) {
							printf('<p class="description"><a href="%s" target="_blank" title="%s">%s</a></p>', esc_attr(esc_url($item['url'])), esc_attr($item['title']), esc_html($item['title']));
						}
						?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<p class="submit">
			<?php wp_nonce_field('easyazon-addition-localization-save', 'easyazon-addition-localization-save-nonce'); ?>

			<input type="hidden" name="easyazon-addition-localization[ID]" value="<?php echo esc_attr($localization['ID']); ?>" />
			<input type="submit" class="button button-primary" value="<?php _e('Save Localization', 'easyazon'); ?>" />
		</p>
	</form>
</div>
