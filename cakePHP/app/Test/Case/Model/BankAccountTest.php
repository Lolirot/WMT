<?php
App::uses('BankAccount', 'Model');

/**
 * BankAccount Test Case
 *
 */
class BankAccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bank_account',
		'app.customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BankAccount = ClassRegistry::init('BankAccount');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BankAccount);

		parent::tearDown();
	}

}
