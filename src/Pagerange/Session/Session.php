<?php

/**
 *
 * Simple session class
 * @author Steve George <steve@glort.com>
 * @version 1.0
 * @license MIT
 * @updated 2015-08-05
 */

namespace Pagerange\Session;

class Session implements \Pagerange\Session\ISession
{

    private $session;
    private $testing;

    public function __construct($testing = false)
    {

        if (session_status() !== PHP_SESSION_ACTIVE) {
            throw new SessionException('Session is not active');
        }
        /*
         * Required for unit testing.   Cannot regenerate session_id in
         * midst of unit testing output.
         */
        $this->testing = $testing;
        $this->session = &$_SESSION;

    }

    public function get($key)
    {
        if ($this->check($key)) {
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
        if (isset($this->session[$key])) {
            return true;
        } else {
            return false;
        }
    }

    public function remove($key)
    {
        if ($this->check($key)) {
            unset($this->session[$key]);
            return true;
        } else {
            return false;
        }
    }

    public function destroy()
    {
        // Extra step for security... and testing.
        foreach ($this->session as $key => $value) {
            $this->remove($key);
        }
        session_destroy();
    }

    public function count()
    {
        return count($this->session);
    }

    /* Follow Functions Can't be Tested by PHP CLI... no session exists */

    public function regenerate()
    {
        /*
         * Test environment will not allow regeneration of session ID.
         * pass true if running unit tests
         */
        if(!$this->testing) {
            session_regenerate_id(true);
        }
    }

    public function getSessionId()
    {
        return session_id();
    }

// end of class
}
