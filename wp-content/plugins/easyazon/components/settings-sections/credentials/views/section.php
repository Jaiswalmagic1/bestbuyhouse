<?php if(false === empty($messages)) { ?>

	<?php foreach($messages as $message) { ?>
		<div class="error"><?php echo $message; ?></div>
	<?php } ?>

<?php } ?>

<p><?php printf(__('<a href="%s" target="_blank">Watch this video</a> showing how to set up your Access Key ID and Secret Access Key from Amazon. If you\'ve already watched the video, please visit your <a href="%s" target="_blank">AWS Account Management page</a> to retrieve your keys. These keys are required in order to send requests to Amazon and retrieve data about products and listings.', 'easyazon'), 'https://easyazon.com/how-to/', 'https://console.aws.amazon.com/iam/home?#security_credential'); ?></p>

<p><?php printf('<strong>%s:</strong> %s', __('Important', 'easyazon'), __('With the new version of the Amazon Product Advertising API, you must ensure that you have a valid Amazon Tracking ID for each locale that you wish to make requests to.', 'easyazon')); ?></p>
