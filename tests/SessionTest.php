<?php

session_start();
ob_start();

require '../../../autoload.php';

use Pagerange\Session\Session;
use Pagerange\Session\Flash;

if(!isset($_SESSION)) $_SESSION = [];

class SessionTest extends PHPUnit_Framework_TestCase
{

    private static $session;
    private static $flash;

    public function setUp()
    {
       static::$session = new Session;
       static::$flash = new Flash(static::$session);
        static::$session->set('test', 3);
        static::$session->set('test2', 4);
    }

    public function testSessionExists()
    {
       $this->assertequals(true, isset(static::$session));
    }

    public function testSettingSessionVar()
    {
        static::$session->set('test3', 9);
        $this->assertequals(3, static::$session->count());
    }

    public function testGettingSessionVar()
    {
        $this->assertequals(3, static::$session->get('test'));
    }

    public function testRemovingSessionVar()
    {
        static::$session->remove('test2');
        $this->assertequals(1, static::$session->count());
    }

    public function testEnsureVarWasRemovedByCheckingCount()
    {
        static::$session->remove('test2');
        $this->assertequals(1, static::$session->count());
    }

    public function testDestroyingSession()
    {
        static::$session->destroy();
        $this->assertequals(0, static::$session->count());
    }


}
