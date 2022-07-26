<div class="easyazon-popup-state"  data-bind="visible: imageActive, with: image">
	<h3><?php _e('Image Options', 'easyazon'); ?></h3>

	<?php do_action('easyazon_image_form_before'); ?>

	<table class="form-table">
		<tbody>
			<?php do_action('easyazon_image_fields_before'); ?>

			<tr data-bind="with: product">
				<th scope="row"><?php _e('Product', 'easyazon'); ?></th>
				<td>
					<a href="#" target="_blank" data-bind="attr: { href: url }, text: title"></a>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e('Image', 'easyazon'); ?></th>
				<td>
					<ul class="wp-tab-bar">
						<li data-bind="css: { 'wp-tab-active': imageTabAmazonSelected }"><a href="#" data-bind="click: imageTabAmazonSelect"><?php _e('Amazon Images', 'easyazon'); ?></a></li>
					</ul>

					<div class="wp-tab-panel" data-bind="visible: imageTabAmazonSelected">
						<div class="easyazon-popup-state-image-choices-container" data-bind="template: { name: 'template-image-choice', foreach: product().images }"></div>
					</div>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-image-align"><?php _e('Alignment', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-image-align" data-bind="value: align">
						<option value="none"><?php _e('None', 'easyazon'); ?></option>
						<option value="left"><?php _e('Left', 'easyazon'); ?></option>
						<option value="center"><?php _e('Center', 'easyazon'); ?></option>
						<option value="right"><?php _e('Right', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-image-nw"><?php _e('New Window', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-image-nw" data-bind="value: nw">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-image-nf"><?php _e('No Follow', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-image-nf" data-bind="value: nf">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-image-tag"><?php _e('Tracking ID', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-image-tag" data-bind="options: $root.tags, optionsText: 'name', optionsValue: 'value', value: tag"></select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-image-cart"><?php _e('Add to Cart', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-image-cart" data-bind="value: cart">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-image-cloak"><?php _e('Cloak', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-image-cloak" data-bind="value: cloak">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<tr>
				<th scope="row"><label for="easyazon-image-localize"><?php _e('Localization', 'easyazon'); ?></label></th>
				<td>
					<select id="easyazon-image-localize" data-bind="value: localize">
						<option value=""><?php _e('Default', 'easyazon'); ?></option>
						<option value="y"><?php _e('Yes', 'easyazon'); ?></option>
						<option value="n"><?php _e('No', 'easyazon'); ?></option>
					</select>
				</td>
			</tr>

			<?php do_action('easyazon_image_fields_after'); ?>
		</tbody>
	</table>

	<?php do_action('easyazon_image_buttons_before'); ?>

	<p class="submit">
		<button class="button button-primary" data-bind="click: insert"><?php _e('Insert', 'easyazon'); ?></button>

		<button class="button button-secondary" data-bind="click: insertRaw"><?php _e('Insert Markup', 'easyazon'); ?></button>

		<?php do_action('easyazon_image_buttons'); ?>

		<button class="button button-secondary" data-bind="click: cancel"><?php _e('Cancel', 'easyazon'); ?></button>
	</p>

	<?php do_action('easyazon_image_buttons_after'); ?>

	<?php do_action('easyazon_image_form_after'); ?>
</div>

<script type="text/html" id="template-image-choice">
<label class="easyazon-popup-state-image-choices-choice">
	<input type="radio" class="easyazon-popup-state-image-choices-choice-selector" data-bind="checked: $parent.image, value: $data" />
	<span class="easyazon-popup-state-image-choices-choice-frame"></span>

	<span class="easyazon-popup-state-image-choices-choice-image-sizer">
		<img alt="" class="easyazon-popup-state-image-choices-choice-image" data-bind="attr: { height: height, src: url, width: width }" />
	</span>

	<span class="easyazon-popup-state-image-choices-choice-dimensions">
		<span data-bind="text: width"></span> x <span data-bind="text: height"></span>
	</span>
</label>
</script>