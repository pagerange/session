<?php

require '../../../autoload.php';

use Pagerange\Session\Session;

if(!isset($_SESSION)) $_SESSION = [];

class SessionTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
    }

    public function testSessionExists()
    {
       $this->assertequals(true, isset($_SESSION));  
    }



}
