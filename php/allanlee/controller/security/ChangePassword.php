<?php
namespace allanlee\controller\security;

class ChangePassword extends \allanlee\controller\SignedInController{
   

    public function __construct() {
        parent::__construct();
        
      
    }

    public function getTitle() {
        return "Change Details";
    }

    public function viewAction() {
        $view = new \allanlee\view\security\ChangePassword($this);
        $view->page();
    }
   
    
    
}

?>
