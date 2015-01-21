<div class="meetings view">
<h2><?php echo __('Meeting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meeting Date Time'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['meeting_date_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meeting Description'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['meeting_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meeting Customer'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['meeting_customer']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meeting'), array('action' => 'edit', $meeting['Meeting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meeting'), array('action' => 'delete', $meeting['Meeting']['id']), array(), __('Are you sure you want to delete # %s?', $meeting['Meeting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('action' => 'add')); ?> </li>
	</ul>
</div>
