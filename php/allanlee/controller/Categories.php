<?php
namespace allanlee\controller;

class Categories extends Controller{
   
     
    public function __construct() {
        
        $this->model = new \allanlee\model\Categories();     
    }
    
    public function viewAction() 
    {
        $view = new \allanlee\view\Categories($this);
        // execute page() within view
        $view->page();
    }
    
     
    public function getTitle() {
        return "Camping Equipment";
    }

  
}

?>
