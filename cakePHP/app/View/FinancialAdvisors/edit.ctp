<div class="financialAdvisors form">
<?php echo $this->Form->create('FinancialAdvisor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Financial Advisor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fa_first_name');
		echo $this->Form->input('fa_last_name');
		echo $this->Form->input('fa_phone_no');
		echo $this->Form->input('fa_address');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FinancialAdvisor.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('FinancialAdvisor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Financial Advisors'), array('action' => 'index')); ?></li>
	</ul>
</div>
