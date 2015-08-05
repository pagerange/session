<?php
/**
 * Created by PhpStorm.
 * User: sgeorge
 * Date: 15-08-05
 * Time: 2:45 PM
 */

namespace Pagerange\Session;

class Flash
{
    private $session;

    public function __construct(Session &$session)
    {
        $this->session = $session;
    }

    public function message($message, $classes = [])
    {
        $this->session['flash']['message'] = $message;
        $this->session['flash']['classes'] = $classes;
    }

    public function flash()
    {
        if($this->check()) {
            $flash = $this->session->get['flash'];
            $this->session->remove('flash');
            return $this->create($flash);
        } else {
            return false;
        }
    }

    public function check()
    {
        return ($this->session->check('flash')) ? true : false;
    }

    private function create($flash)
    {
        $classes = $this->getClasses($flash);
        $html = "<div class=\"flash $classes\">{PHP_EOL}
                {$flash['message']}{PHP_EOL}
                </div>";
        return $html;
    }

    private function getClasses($flash)
    {
        $classes = '';

        if(count($flash['classes'])) {
            foreach($flash['classes'] as $value) {
                $classes .= "$value ";
                trim($classes);
            }  // end foreach
        } // end if
        return $classes;
    }


}