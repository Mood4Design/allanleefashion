<?php
namespace allanlee\controller;

class StaticPage extends Controller{
   
    private $staticPage = '';
    
    public function __construct($url) {
        
     $this->staticPage  = $url[0];
        
    }

    public function getTitle() {
        return "Home";
    }

    public function viewAction() {
        $view = new \allanlee\view\StaticPage($this);
        $view->page();
    }

    public function getStaticPageName()
    {
        return  $this->staticPage;
    }

   
    
    
}

?>
