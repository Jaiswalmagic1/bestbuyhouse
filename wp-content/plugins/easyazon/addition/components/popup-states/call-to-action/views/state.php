<div class="easyazon-popup-state"  data-bind="visible: ctaActive, with: cta">
	<h3><?php _e('Call to Action Options', 'easyazon'); ?></h3>

	<?php do_action('easyazon_cta_form_before'); ?>

	<table class="form-table">
		<tbody>
			<?php do_action('easyazon_cta_fields_before'); ?>

			<tr data-bind="with: product">
				<th scope="row"><?php _e('Product', 'easyazon'); ?></th>
				<td>
					<a href="#" target="_blank" data-bind="attr: { href: url }, text: title"></a>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-key"><?php _e('Button', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-key" data-bind="options: $root.ctaButtons, optionsText: 'name', optionsValue: 'key', value: key"></select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-align"><?php _e('Alignment', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-align" data-bind="value: align">
						<option value="none"><?php _e('None', 'easyazon'); ?></option>
						<option value="left"><?php _e('Left', 'easyazon'); ?></option>
						<option value="center"><?php _e('Center', 'easyazon'); ?></option>
						<option value="right"><?php _e('Right', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-nw"><?php _e('New Window', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-nw" data-bind="value: nw">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-nf"><?php _e('No Follow', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-nf" data-bind="value: nf">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-tag"><?php _e('Tracking ID', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-tag" data-bind="options: $root.tags, optionsText: 'name', optionsValue: 'value', value: tag"></select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-cart"><?php _e('Add to Cart', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-cart" data-bind="value: cart">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-cloak"><?php _e('Cloak', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-cloak" data-bind="value: cloak">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-cta-localize"><?php _e('Localization', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-cta-localize" data-bind="value: localize">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<?php do_action('easyazon_cta_fields_after'); ?>
		</tbody>
	</table>

	<?php do_action('easyazon_cta_buttons_before'); ?>

	<p class="submit">
		<button class="button button-primary" data-bind="click: insert"><?php _e('Insert', 'easyazon'); ?></button>

		<button class="button button-secondary" data-bind="click: insertRaw"><?php _e('Insert Markup', 'easyazon'); ?></button>

		<?php do_action('easyazon_cta_buttons'); ?>

		<button class="button button-secondary" data-bind="click: cancel"><?php _e('Cancel', 'easyazon'); ?></button>
	</p>

	<?php do_action('easyazon_cta_buttons_after'); ?>

	<?php do_action('easyazon_cta_form_after'); ?>
</div>
