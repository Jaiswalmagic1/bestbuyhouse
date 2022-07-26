<div class="easyazon-popup-state"  data-bind="visible: linkActive, with: link">
	<h3><?php _e('Link Options', 'easyazon'); ?></h3>

	<?php do_action('easyazon_link_form_before'); ?>

	<table class="form-table">
		<tbody>
			<?php do_action('easyazon_link_fields_before'); ?>

			<tr data-bind="with: product">
				<th scope="row"><?php _e('Product', 'easyazon'); ?></th>
				<td>
					<a href="#" target="_blank" data-bind="attr: { href: url }, text: title"></a>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-link-text"><?php _e('Link Text', 'easyazon'); ?></label></th>
				<td>
					<input type="text" class="large-text" id="easyazon-link-text" data-bind="value: text" />
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-link-nw"><?php _e('New Window', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-link-nw" data-bind="value: nw">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-link-nf"><?php _e('No Follow', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-link-nf" data-bind="value: nf">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-link-tag"><?php _e('Tracking ID', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-link-tag" data-bind="options: $root.tags, optionsText: 'name', optionsValue: 'value', value: tag"></select>
				</td>
			</tr>

			<?php do_action('easyazon_link_fields_after'); ?>
		</tbody>
	</table>

	<?php do_action('easyazon_link_buttons_before'); ?>

	<p>
		<button class="button button-primary" data-bind="click: insert"><?php _e('Insert', 'easyazon'); ?></button>

		<?php do_action('easyazon_link_buttons'); ?>

		<button class="button button-secondary" data-bind="click: cancel"><?php _e('Cancel', 'easyazon'); ?></button>
	</p>

	<?php do_action('easyazon_link_buttons_after'); ?>

	<?php do_action('easyazon_link_form_after'); ?>
</div>