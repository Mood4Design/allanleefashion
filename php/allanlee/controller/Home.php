<?php
namespace allanlee\controller;

class Home extends Controller{
   
   public function __construct() {
        
           
    }

    public function getTitle() {
      return "home"; 
    }

    public function viewAction() {
       $view = new \allanlee\view\Home($this);
        // execute page() within view
        $view->page(); 
    }
}

?>
