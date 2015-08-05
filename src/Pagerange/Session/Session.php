<?php
/**
 * Created by PhpStorm.
 * User: sgeorge
 * Date: 15-08-05
 * Time: 2:29 PM
 */

namespace Pagerange\Session;

class Session implements \Pagerange\Session\ISession
{

    private $session;

    public function __construct()
    {
       /* if(session_status() !== PHP_SESSION_ACTIVE) {
            throw new SessionException('Session is not active');
        }
       */
        $this->session = &$_SESSION;

    }

    public function get($key)
    {
        if($this->check($key)) {
            return $this->session[$key];
        } else {
            return false;
        }
    }

    public function set($key, $value)
    {
        $this->session[$key] = $value;
    }

    public function check($key)
    {
        if(isset($this->session[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public function remove($key)
    {
        if($this->check($key)) {
            unset($this->session[$key]);
            return true;
        } else {
            return false;
        }
    }

    public function destroy()
    {
        session_destroy();
    }

    public function regenerate()
    {
        session_regenerate_id(true);
    }

}