<?php

require '../../../autoload.php';

use Pagerange\Session\Session;
use Pagerange\Session\Flash;

if(!isset($_SESSION)) $_SESSION = [];

class FlashTest extends PHPUnit_Framework_TestCase
{

    private static $session;
    private static $flash;

    public function setUp()
    {
       static::$session = new Session;
       static::$flash = new Flash(static::$session);
       static::$flash->message('The message has been set', ['alert-success']);
    }

    public function testFlashMessagelExists()
    {
       $this->assertequals(true, static::$flash->check());
    }

    public function testGetMessage()
    {
        $this->assertequals(true, is_array(static::$flash->getMessage()));
    }

    public function testMessageContent()
    {
        $flash = static::$flash->getMessage();
        $this->assertequals('The message has been set', $flash['message']);
    }

    public function testClassesContent()
    {
        $flash = static::$flash->getMessage();
        $this->assertequals('alert-success', $flash['classes'][0]);
    }

    public function testFlashMessageRemovedAfterDisplay()
    {
        static::$flash->flash();
        $this->assertequals(false, static::$flash->check());
    }





}
