<div class="bankAccounts view">
<h2><?php echo __('Bank Account'); ?></h2>
	<dl>
		<dt><?php echo __('Account Number'); ?></dt>
		<dd>
			<?php echo h($bankAccount['BankAccount']['account_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bankAccount['Customer']['id'], array('controller' => 'customers', 'action' => 'view', $bankAccount['Customer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iban'); ?></dt>
		<dd>
			<?php echo h($bankAccount['BankAccount']['iban']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Name'); ?></dt>
		<dd>
			<?php echo h($bankAccount['BankAccount']['bank_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bank Address'); ?></dt>
		<dd>
			<?php echo h($bankAccount['BankAccount']['bank_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Balance'); ?></dt>
		<dd>
			<?php echo h($bankAccount['BankAccount']['balance']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bank Account'), array('action' => 'edit', $bankAccount['BankAccount']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bank Account'), array('action' => 'delete', $bankAccount['BankAccount']['id']), array(), __('Are you sure you want to delete # %s?', $bankAccount['BankAccount']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Account'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
