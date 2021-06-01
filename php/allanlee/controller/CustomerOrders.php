<?php
namespace allanlee\controller;

class CustomerOrders extends Controller{
   
   public function __construct() {
        
           
    }

    public function getTitle() {
      return "customer-orders"; 
    }

    public function viewAction() {
       $view = new \allanlee\view\CustomerOrders($this);
        // execute page() within view
        $view->page(); 
    }
}

?>
