<div class="customers form">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset>
		<legend><?php echo __('Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('address');
		echo $this->Form->input('faid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bank Accounts'), array('controller' => 'bank_accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Account'), array('controller' => 'bank_accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customer Stocks'), array('controller' => 'customer_stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer Stock'), array('controller' => 'customer_stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Histories'), array('controller' => 'transaction_histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction History'), array('controller' => 'transaction_histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
