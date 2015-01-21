<div class="meetings form">
<?php echo $this->Form->create('Meeting'); ?>
	<fieldset>
		<legend><?php echo __('Add Meeting'); ?></legend>
	<?php
		echo $this->Form->input('meeting_date_time');
		echo $this->Form->input('meeting_description');
		echo $this->Form->input('meeting_customer');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?></li>
	</ul>
</div>
