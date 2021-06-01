<?php
namespace allanlee\view;

class StaticPage extends View{
    
    protected function section($model) {

        require_once STATIC_PAGES . $this->controller->getStaticPageName() . ".php";  
        
    }
}

?>
