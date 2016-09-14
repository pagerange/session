<?php

/**
 *
 * Simple session wrapper class
 * @author Steve George <steve@glort.com>
 * @version 1.0
 * @license MIT
 * @updated 2016-09-13
 */

namespace Pagerange\Session;

class Session implements \Pagerange\Session\ISession
{

    private $session;

    /**
     * Construct our session
     * @param session the $_SESSION
     * @throws SessionException
     */
    public function __construct($session)
    {
        if (!is_array($session)) {
            throw new SessionException('Session is not active');
        }

        $this->session = $session;

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
     * Unset a session var
     * @param $key
     */
    public function remove($key)
    {
        if ($this->check($key)) {
            unset($this->session[$key]);
        } 
    }


    /**
     * @return int a count of the session vars
     */
    public function count()
    {
        return count($this->session);
    }

// end of class
}
