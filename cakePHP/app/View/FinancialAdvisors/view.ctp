<div class="financialAdvisors view">
<h2><?php echo __('Financial Advisor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($financialAdvisor['FinancialAdvisor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fa First Name'); ?></dt>
		<dd>
			<?php echo h($financialAdvisor['FinancialAdvisor']['fa_first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fa Last Name'); ?></dt>
		<dd>
			<?php echo h($financialAdvisor['FinancialAdvisor']['fa_last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fa Phone No'); ?></dt>
		<dd>
			<?php echo h($financialAdvisor['FinancialAdvisor']['fa_phone_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fa Address'); ?></dt>
		<dd>
			<?php echo h($financialAdvisor['FinancialAdvisor']['fa_address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Financial Advisor'), array('action' => 'edit', $financialAdvisor['FinancialAdvisor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Financial Advisor'), array('action' => 'delete', $financialAdvisor['FinancialAdvisor']['id']), array(), __('Are you sure you want to delete # %s?', $financialAdvisor['FinancialAdvisor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Financial Advisors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Financial Advisor'), array('action' => 'add')); ?> </li>
	</ul>
</div>
