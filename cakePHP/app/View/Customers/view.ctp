<div class="customers view">
<h2><?php echo __('Customer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['phone_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faid'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['faid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Customer'), array('action' => 'edit', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customer'), array('action' => 'delete', $customer['Customer']['id']), array(), __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Accounts'), array('controller' => 'bank_accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Account'), array('controller' => 'bank_accounts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customer Stocks'), array('controller' => 'customer_stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer Stock'), array('controller' => 'customer_stocks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Histories'), array('controller' => 'transaction_histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction History'), array('controller' => 'transaction_histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Bank Accounts'); ?></h3>
	<?php if (!empty($customer['BankAccount'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Account Number'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Iban'); ?></th>
		<th><?php echo __('Bank Name'); ?></th>
		<th><?php echo __('Bank Address'); ?></th>
		<th><?php echo __('Balance'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($customer['BankAccount'] as $bankAccount): ?>
		<tr>
			<td><?php echo $bankAccount['account_number']; ?></td>
			<td><?php echo $bankAccount['customer_id']; ?></td>
			<td><?php echo $bankAccount['iban']; ?></td>
			<td><?php echo $bankAccount['bank_name']; ?></td>
			<td><?php echo $bankAccount['bank_address']; ?></td>
			<td><?php echo $bankAccount['balance']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bank_accounts', 'action' => 'view', $bankAccount['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bank_accounts', 'action' => 'edit', $bankAccount['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bank_accounts', 'action' => 'delete', $bankAccount['id']), array(), __('Are you sure you want to delete # %s?', $bankAccount['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bank Account'), array('controller' => 'bank_accounts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Customer Stocks'); ?></h3>
	<?php if (!empty($customer['CustomerStock'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Company'); ?></th>
		<th><?php echo __('Shares No'); ?></th>
		<th><?php echo __('History Ref'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($customer['CustomerStock'] as $customerStock): ?>
		<tr>
			<td><?php echo $customerStock['id']; ?></td>
			<td><?php echo $customerStock['customer_id']; ?></td>
			<td><?php echo $customerStock['company']; ?></td>
			<td><?php echo $customerStock['shares_no']; ?></td>
			<td><?php echo $customerStock['history_ref']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'customer_stocks', 'action' => 'view', $customerStock['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'customer_stocks', 'action' => 'edit', $customerStock['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'customer_stocks', 'action' => 'delete', $customerStock['id']), array(), __('Are you sure you want to delete # %s?', $customerStock['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Customer Stock'), array('controller' => 'customer_stocks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transaction Histories'); ?></h3>
	<?php if (!empty($customer['TransactionHistory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Date Of Trans'); ?></th>
		<th><?php echo __('Account Num'); ?></th>
		<th><?php echo __('Faid'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($customer['TransactionHistory'] as $transactionHistory): ?>
		<tr>
			<td><?php echo $transactionHistory['id']; ?></td>
			<td><?php echo $transactionHistory['customer_id']; ?></td>
			<td><?php echo $transactionHistory['date_of_trans']; ?></td>
			<td><?php echo $transactionHistory['account_num']; ?></td>
			<td><?php echo $transactionHistory['faid']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transaction_histories', 'action' => 'view', $transactionHistory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transaction_histories', 'action' => 'edit', $transactionHistory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transaction_histories', 'action' => 'delete', $transactionHistory['id']), array(), __('Are you sure you want to delete # %s?', $transactionHistory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaction History'), array('controller' => 'transaction_histories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
