<div class="easyazon-popup-state"  data-bind="visible: infoBlockActive, with: infoBlock">
	<h3><?php _e('Info Block Options', 'easyazon'); ?></h3>

	<?php do_action('easyazon_info_block_form_before'); ?>

	<table class="form-table">
		<tbody>
			<?php do_action('easyazon_info_block_fields_before'); ?>

			<tr data-bind="with: product">
				<th scope="row"><?php _e('Product', 'easyazon'); ?></th>
				<td>
					<a href="#" target="_blank" data-bind="attr: { href: url }, text: title"></a>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-key"><?php _e('Template', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-key" data-bind="value: key">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<?php foreach(easyazon_get_info_block_templates() as $key => $template) { ?>
						<option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($template['name']); ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-align"><?php _e('Alignment', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-align" data-bind="value: align">
						<option value="none"><?php _e('None', 'easyazon'); ?></option>
						<option value="left"><?php _e('Left', 'easyazon'); ?></option>
						<option value="center"><?php _e('Center', 'easyazon'); ?></option>
						<option value="right"><?php _e('Right', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-nw"><?php _e('New Window', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-nw" data-bind="value: nw">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-nf"><?php _e('No Follow', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-nf" data-bind="value: nf">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-tag"><?php _e('Tracking ID', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-tag" data-bind="options: $root.tags, optionsText: 'name', optionsValue: 'value', value: tag"></select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-cart"><?php _e('Add to Cart', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-cart" data-bind="value: cart">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-cloak"><?php _e('Cloak', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-cloak" data-bind="value: cloak">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-info-block-localize"><?php _e('Localization', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-info-block-localize" data-bind="value: localize">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<?php do_action('easyazon_info_block_fields_after'); ?>
		</tbody>
	</table>

	<?php do_action('easyazon_info_block_buttons_before'); ?>

	<p class="submit">
		<button class="button button-primary" data-bind="click: insert"><?php _e('Insert', 'easyazon'); ?></button>

		<button class="button button-secondary" data-bind="click: insertRaw"><?php _e('Insert Markup', 'easyazon'); ?></button>

		<?php do_action('easyazon_info_block_buttons'); ?>

		<button class="button button-secondary" data-bind="click: cancel"><?php _e('Cancel', 'easyazon'); ?></button>
	</p>

	<?php do_action('easyazon_info_block_buttons_after'); ?>

	<?php do_action('easyazon_info_block_form_after'); ?>
</div>
