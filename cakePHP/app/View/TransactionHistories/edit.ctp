<div class="transactionHistories form">
<?php echo $this->Form->create('TransactionHistory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transaction History'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('customer_id');
		echo $this->Form->input('date_of_trans');
		echo $this->Form->input('account_num');
		echo $this->Form->input('faid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TransactionHistory.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('TransactionHistory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transaction Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
