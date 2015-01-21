<?php
/**
 * BankAccountFixture
 *
 */
class BankAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'account_number' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'iban' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 34, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bank_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bank_address' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 225, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'balance' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'account_number', 'unique' => 1),
			'customer_id' => array('column' => 'customer_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'account_number' => 1,
			'customer_id' => 1,
			'iban' => 'Lorem ipsum dolor sit amet',
			'bank_name' => 'Lorem ipsum dolor sit a',
			'bank_address' => 'Lorem ipsum dolor sit amet',
			'balance' => 1
		),
	);

}
