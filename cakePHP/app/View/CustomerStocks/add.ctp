<div class="customerStocks form">
<?php echo $this->Form->create('CustomerStock'); ?>
	<fieldset>
		<legend><?php echo __('Add Customer Stock'); ?></legend>
	<?php
		echo $this->Form->input('customer_id');
		echo $this->Form->input('company');
		echo $this->Form->input('shares_no');
		echo $this->Form->input('history_ref');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customer Stocks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
