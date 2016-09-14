<?php

/**
 *
 * Session Interface
 * @author Steve George <steve@glort.com>
 * @version 1.0
 * @license MIT
 * @updated 2015-08-05
 */

namespace Pagerange\Session;


interface ISession
{

    public function get($key);

    public function set($key, $value);

    public function check($key);

    public function remove($key);

// end of Interface
}
