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
        $flash = [
            'message' => $message,
            'classes' => $classes
        ];
        $this->session->set('flash', $flash);
    }

    public function flash()
    {
        if($this->check()) {
            $flash = $this->session->get('flash');
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

    public function getMessage() {
        if($this->check()) {
            return $this->session->get('flash');
        } else {
            return false;
        }
    }

    private function getClasses($flash)
    {
        $classes = '';

        if(count($flash['classes'])) {
            foreach($flash['classes'] as $value) {
                $classes .= "$value ";
            }  // end foreach
        } // end if
        trim($classes);
        return $classes;
    }


    private function create($flash)
    {
        $classes = $this->getClasses($flash);
        return require( __DIR__ . '/views/message.php');
    }


}