<div class="customerStocks view">
<h2><?php echo __('Customer Stock'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($customerStock['CustomerStock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customerStock['Customer']['id'], array('controller' => 'customers', 'action' => 'view', $customerStock['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($customerStock['CustomerStock']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shares No'); ?></dt>
		<dd>
			<?php echo h($customerStock['CustomerStock']['shares_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('History Ref'); ?></dt>
		<dd>
			<?php echo h($customerStock['CustomerStock']['history_ref']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Customer Stock'), array('action' => 'edit', $customerStock['CustomerStock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customer Stock'), array('action' => 'delete', $customerStock['CustomerStock']['id']), array(), __('Are you sure you want to delete # %s?', $customerStock['CustomerStock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customer Stocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer Stock'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
