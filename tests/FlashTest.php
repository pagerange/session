<?php


require '../../../autoload.php';

use Pagerange\Session\Session;
use Pagerange\Session\Flash;

class FlashTest extends PHPUnit_Framework_TestCase
{

    private static $session;
    private static $flash;

    public static function setUpBeforeClass()
    {
        if(session_status() !=  PHP_SESSION_ACTIVE) {
            @session_start();
            @ob_start();
        }
       static::$session = new Session;
       static::$flash = new Flash(static::$session);
       static::$flash->message('The message has been set', ['alert-success']);
    }

    public static function tearDownAfterClass()
    {
        session_destroy();
    }

    public function testFlashMessagelExists()
    {
       $this->assertTrue(static::$flash->check(), 'A flash message should exist at this point');
    }

    public function testGetMessage()
    {
        $this->assertTrue(is_array(static::$flash->getMessage()), 'The flash message should be an array');
    }

    public function testMessageContent()
    {
        $flash = static::$flash->getMessage();
        $this->assertEquals('The message has been set', $flash['message'], 'Message text should be correct');
    }

    public function testClassesContent()
    {
        $flash = static::$flash->getMessage();
        $this->assertEquals('alert-success', $flash['classes'][0], 'Classes text should be correct');
    }

    public function testFlashMessageRemovedAfterDisplay()
    {
        static::$flash->flash();
        $this->assertFalse(static::$flash->check(), 'No flash message should exist after being displayed once.');
    }





}
