<?php

require '../vendor/autoload.php';

use Pagerange\Session\Session;

class SessionTest extends PHPUnit_Framework_TestCase
{

    private $session;

    public function setUp()
    {
	$session = array();
        $this->session = new Session($session);
        $this->session->set('test', 3);
        $this->session->set('test2', 4);
    }

    public function testSettingSessionVar()
    {
        $this->session->set('test3', 9);
        $this->assertEquals(3, $this->session->count(), 'Count of session vars should now be 3');
    }

    public function testGettingSessionVar()
    {
        $this->assertEquals(3, $this->session->get('test'), 'The value of the $session->test should be 3');
    }

    public function testRemovingSessionVar()
    {
        $this->session->remove('test2');
        $this->assertFalse($this->session->get('test2'), 'Var should not exist after being removed');
    }

    public function testEnsureVarWasRemovedByCheckingCount()
    {
        $this->session->remove('test2');
        $this->assertEquals(1, $this->session->count(), 'Count of vars should be 1 after removing one');
    }

// end test class
}
