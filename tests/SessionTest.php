<?php

if(session_status() !=  PHP_SESSION_ACTIVE) {
    session_start();
    ob_start();
}

require '../../../autoload.php';

use Pagerange\Session\Session;
use Pagerange\Session\Flash;

class SessionTest extends PHPUnit_Framework_TestCase
{

    private static $session;
    private static $flash;

    public static function setUpBeforeClass()
    {
        // Pass bool true to Session constructor if testing
        static::$session = new Session(true);
        static::$flash = new Flash(static::$session);
        static::$session->set('test', 3);
        static::$session->set('test2', 4);
    }

    public function testSessionExists()
    {
       $this->assertTrue(isset(static::$session), 'Session should exist after instantiation');
    }

    public function testSettingSessionVar()
    {
        static::$session->set('test3', 9);
        $this->assertEquals(3, static::$session->count(), 'Count of session vars should now be 3');
    }

    public function testGettingSessionVar()
    {
        $this->assertEquals(3, static::$session->get('test'), 'The value of the $session->test should be 3');
    }

    public function testRemovingSessionVar()
    {
        static::$session->remove('test2');
        $this->assertFalse(static::$session->get('test2'), 'Var should not exist after being removed');
    }

    public function testEnsureVarWasRemovedByCheckingCount()
    {
        static::$session->remove('test2');
        $this->assertEquals(1, static::$session->count(), 'Count of vars should be 1 after removing one');
    }

    public function testDestroyingSession()
    {
        static::$session->destroy();
        $this->assertEquals(0, static::$session->count(), 'Count of vars should be 0 after session destroyed');
    }


// end test class
}
