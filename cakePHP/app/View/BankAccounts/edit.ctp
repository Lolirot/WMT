<div class="bankAccounts form">
<?php echo $this->Form->create('BankAccount'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bank Account'); ?></legend>
	<?php
		echo $this->Form->input('account_number');
		echo $this->Form->input('customer_id');
		echo $this->Form->input('iban');
		echo $this->Form->input('bank_name');
		echo $this->Form->input('bank_address');
		echo $this->Form->input('balance');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BankAccount.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('BankAccount.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bank Accounts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
