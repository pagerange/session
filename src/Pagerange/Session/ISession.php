<?php
/**
 * Created by PhpStorm.
 * User: sgeorge
 * Date: 15-08-05
 * Time: 2:26 PM
 */

namespace Pagerange\Session;


interface ISession
{

    public function get($key);

    public function set($key, $value);

    public function check($key);

    public function remove($key);

    public function destroy();

    public function regenerate();


}