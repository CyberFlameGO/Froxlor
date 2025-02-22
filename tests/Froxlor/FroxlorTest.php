<?php

use PHPUnit\Framework\TestCase;

use Froxlor\Api\Commands\Froxlor;

/**
 *
 * @covers \Froxlor\Api\ApiCommand
 * @covers \Froxlor\Api\ApiParameter
 * @covers \Froxlor\Froxlor
 */
class FroxlorTest extends TestCase
{

	public function testFroxlorcheckUpdate()
	{
		global $admin_userdata;

		$json_result = Froxlor::getLocal($admin_userdata)->checkUpdate();
		$result = json_decode($json_result, true)['data'];
		$this->assertEquals(0, $result['isnewerversion']);
		if (defined('DEV_FROXLOR') && DEV_FROXLOR == 1) {
			$this->assertEquals("You already have the latest testing version of Froxlor installed.", $result['additional_info']);
		} else {
			$this->assertEquals("You already have the latest version of Froxlor installed.", $result['additional_info']);
		}
	}
}
