# Flash Messenger
Flash messenger is a plugin for Zend Framework to allow you to quickly and efficiently set up the FlashMessenger action helper with minimal effort!

#How To Use

## Copy and Register the Plugin

1.	Clone/Download this git repo

2.	Copy "FlashMessenger.php" to /path/to/your/app/application/plugins/

3.	Add this to application.ini to register the plugin

	resources.frontController.plugins.FlashMessenger = "Application_Plugin_FlashMessenger"
	
## Setting Flash Messages

Setting a flash message is easy, simply call the following in your controller.

	$this->_helper->FlashMessenger('my flash message');
		
		
## Getting Flash Messages

Getting flash messages couldn't be simpler, simply add the following to your layout.phtml or view script

	<?php if(!empty($this->flashMessages)):?>
	<div class="flashmessages">
		<ul>
		<?php foreach($this->flashMessages as $message): ?>
			<li><?php echo $message; ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
		
Or if you would like all of the messages on one line simply use

	<?php if(!empty($this->flashMessages)):?>
	<div class="flashmessages">
		<?php implode(',', $this->flashMessages); ?>
	</div>
	<?php endif; ?>