<div class="transactionHistories view">
<h2><?php echo __('Transaction History'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transactionHistory['TransactionHistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transactionHistory['Customer']['id'], array('controller' => 'customers', 'action' => 'view', $transactionHistory['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Trans'); ?></dt>
		<dd>
			<?php echo h($transactionHistory['TransactionHistory']['date_of_trans']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Num'); ?></dt>
		<dd>
			<?php echo h($transactionHistory['TransactionHistory']['account_num']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faid'); ?></dt>
		<dd>
			<?php echo h($transactionHistory['TransactionHistory']['faid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction History'), array('action' => 'edit', $transactionHistory['TransactionHistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction History'), array('action' => 'delete', $transactionHistory['TransactionHistory']['id']), array(), __('Are you sure you want to delete # %s?', $transactionHistory['TransactionHistory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
