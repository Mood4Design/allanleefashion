<?php
namespace allanlee\controller\security;

class ChangeDetails extends \allanlee\controller\SignedInController{
   

    public function __construct() {
        parent::__construct();
        
        
        $this->model = new \allanlee\model\security\ChangeDetails();
      
    }

    public function getTitle() {
        return "Change Details";
    }

    public function viewAction() {
        $view = new \allanlee\view\security\ChangeDetails($this);
        $view->page();
    }
   
    
    
}

?>
