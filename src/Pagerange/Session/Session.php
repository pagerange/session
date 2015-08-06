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

    /**
     * Construct our session
     * @param bool|false $testing Should session be in testing mode?
     * @throws SessionException
     */
    public function __construct($testing = false)
    {

        if (session_status() !== PHP_SESSION_ACTIVE) {
            throw new SessionException('Session is not active');
        }
        /*
         * Required for unit testing.   Cannot regenerate
         * session_id in the midst of unit testing output.
         */
        $this->testing = $testing;

        /*
         * We can have as many instances of Session() as we like...
         * They will all use the same php $_SESSION.
         */
        $this->session = &$_SESSION;

    }

    /**
     * Get the value of a session var
     * @param $key
     * @return bool|mixed false if $key does not exist in session, or the value
     */
    public function get($key)
    {
        if ($this->check($key)) {
            return $this->session[$key];
        } else {
            return false;
        }
    }

    /**
     * Set the value of a session var
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->session[$key] = $value;
    }

    /**
     * Check to see if a session var is set
     * @param $key
     * @return bool
     */
    public function check($key)
    {
        if (isset($this->session[$key])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove/delete a session var
     * @param $key
     * @return bool
     */
    public function remove($key)
    {
        if ($this->check($key)) {
            unset($this->session[$key]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Destroy the session
     * @return bool if successful
     * @throws SessionException
     */
    public function destroy()
    {
        // Extra step for security... and testing.
        foreach ($this->session as $key => $value) {
            $this->remove($key);
        }
        if(!session_destroy()) {
            throw new SessionException('Could not destroy session');
        };
        return true;
    }

    /**
     * @return int a count of the session vars
     */
    public function count()
    {
        return count($this->session);
    }


    /**
     * Regenerate the session id
     * @return bool
     */
    public function regenerate()
    {
        /*
         * Test environment will not allow regeneration of session ID.
         * pass true if running unit tests
         */
        if(!$this->testing) {
            session_regenerate_id(true);
            return true;
        }
        return false;
    }

    /**
     * Get the current session id
     * @return bool|string
     */
    public function getSessionId()
    {
        if(!$this->testing) {
            return session_id();
        }
        return false;

    }

// end of class
}
