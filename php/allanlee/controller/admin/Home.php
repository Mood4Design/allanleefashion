<?php
namespace allanlee\controller\admin;

class Home extends AdminController{
   
    public function __construct() {
  
    }

    public function getTitle() {
        return "Home";
    }

    public function viewAction() {
        $view = new \allanlee\view\admin\Home($this);
        $view->page();
    }
  
}

?>
